<?php

namespace App\Services\Payments;

use App\Services\Payments\Contracts\PaymentGatewayInterface;
use Illuminate\Support\Facades\Http;
use Exception;
use Illuminate\Support\Facades\Log;

class PaypalPaymentService implements PaymentGatewayInterface
{
    protected function getAccessToken()
    {
        $response = Http::asForm()->withBasicAuth(
            config('services.paypal.client_id'),
            config('services.paypal.secret')
        )->post(config('services.paypal.base_ur l') . '/v1/oauth2/token', [
            'grant_type' => 'client_credentials'
        ]);

        return $response->json()['access_token'];
    }

    public function createPayment(array $data)
    {
        // TODO: Implement createPayment method.

        $token = $this->getAccessToken();

        $response = Http::withToken($token)
            ->post(config('services.paypal.base_url') . '/v2/checkout/orders', [
                "intent" => "CAPTURE",
                "purchase_units" => [
                    [
                        "amount" => [
                            "currency_code" => $data['currency'] ?? "USD",
                            "value" => $data['amount']
                        ]
                    ]
                ],
                "application_context" => [
                    "return_url" => $data['return_url'],
                    "cancel_url" => $data['cancel_url']
                ]
            ]);

        return $response->json();

    }

    public function verifyPayment(array $data)
    {
        // TODO: Implement verifyPayment method.

        $token = $this->getAccessToken();

        $response = Http::withToken($token)
            ->post(config('services.paypal.base_url') . "/v2/checkout/orders/{$data['payment_id']}/capture");

        return $response->json();
    }


    public function verifyWebhook(array $data)
    {
        $token = $this->getAccessToken();
        
        $response = Http::withToken($token)->post(config('services.paypal.base_url') . '/v1/notifications/verify-webhook-signature', [
            "transmission_id" => $data['headers']['paypal-transmission-id'],
            "transmission_time" => $data['headers']['paypal-transmission-time'],
            "cert_url" => $data['headers']['paypal-cert-url'],
            "auth_algo" => $data['headers']['paypal-auth-algo'],
            "transmission_sig" => $data['headers']['paypal-transmission-sig'],
            "webhook_id" => config('services.paypal.webhook_id'),
            "webhook_event" => $data['body']
        ]);

        return $response->json();
    }

}