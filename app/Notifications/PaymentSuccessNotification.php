<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentSuccessNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $order;
    public $transaction;

    /**
     * Create a new notification instance.
     */
    public function __construct($order, $transaction)
    {
        $this->order = $order;
        $this->transaction = $transaction;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Payment Successful - Order #' . $this->order->id)
            ->greeting('Hello ' . $notifiable->name)
            ->line('We have received your payment for order #' . $this->order->id)
            ->line('Transaction ID: ' . $this->transaction->transaction_id)
            ->line('Amount: ' . $this->transaction->amount . ' ' . config('app.currency', 'USD'))
            ->action('View Order Details', url('/orders/' . $this->order->id))
            ->line('Thank you for your purchase!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'order_id' => $this->order->id,
            'transaction_id' => $this->transaction->transaction_id,
            'amount' => $this->transaction->amount,
            'message' => 'Payment for order #' . $this->order->id . ' was successful.',
            'url' => url('/orders/' . $this->order->id),
        ];
    }
}
