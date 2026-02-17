<?php
namespace App\Services;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Throwable;
use Exception;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Admin;
use App\Models\Invoice;
use App\Models\Transaction;
use App\Notifications\OrderPlacedNotification;
use App\Notifications\PaymentSuccessNotification;
use App\Jobs\GenerateInvoiceJob;


class OrderService
{
    
    public function createOrder($data)
    {
        try {

            
            DB::beginTransaction();

            $items = $data['order_items'] ?? [];
            unset($data['order_items']);

            // Calculate total if not provided or if we want to be sure
            if (!isset($data['total_amount'])) {
                $total = 0;
                foreach ($items as $item) {
                    $product = Product::find($item['product_id']);
                    $total += $product->price * $item['quantity'];
                }
                $data['total_amount'] = $total;
            }

            $order = Order::create($data);

            foreach ($items as $item) {
                $product = Product::find($item['product_id']);
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $product->price, // Current price
                ]);
            }

            $latest = Invoice::latest()->first();
            
            $invoiceNumber = 'INV' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);

            $invoice = Invoice::create([
                'order_id' => $order->id,
                'invoice_number' => $invoiceNumber,
                'invoice_date' => now(),
                'amount' => $order->total_amount,
            ]);


            // Order Created
            // Event Fired
            // Queued Listener
            // Send Email (Background)
            /*if ($order->user) {
                $order->user->notify(new OrderPlacedNotification($order));
            }*/

            GenerateInvoiceJob::dispatch($order);


            DB::commit();

            return $order->load('items');

        } catch (Throwable $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }

    public function updateOrder($id, $data)
    {
        try {
            DB::beginTransaction();
            $order = Order::find($id);
            $order->update($data);
            DB::commit();
            return $order;
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }

    public function deleteOrder($id)
    {
        try {
            DB::beginTransaction();
            $order = Order::find($id);
            $order->delete();
            DB::commit();
            return $order;
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }

    public function getOrders()
    {
        try {
            DB::beginTransaction();
            $orders = Order::all();
            DB::commit();
            return $orders;
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }

    public function getOrderById($id)
    {
        try {
            DB::beginTransaction();
            $order = Order::find($id);
            DB::commit();
            return $order;
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }

    public function getPaginatedOrders($perPage = 10, $search = null, $status = null)
    {
        try {
            $query = Order::query()->latest();

            if ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('id', 'like', "%{$search}%")
                      ->orWhere('billing_first_name', 'like', "%{$search}%")
                      ->orWhere('billing_last_name', 'like', "%{$search}%")
                      ->orWhere('billing_email', 'like', "%{$search}%");
                });
            }

            if ($status) {
                $query->where('status', $status);
            }

            return $query->paginate($perPage);
            
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }

    public function handlePaymentSuccess($orderId, array $paymentData)
    {
        try {
            DB::beginTransaction();

            $order = Order::findOrFail($orderId);
            
            // Update order status
            $order->update(['status' => 'paid']);

            // Create or update transaction record
            $transaction = Transaction::updateOrCreate(
                ['order_id' => $order->id, 'transaction_id' => $paymentData['transaction_id']],
                [
                    'amount' => $paymentData['amount'] ?? $order->total_amount,
                    'payment_method' => $paymentData['payment_method'] ?? $order->payment_method,
                    'status' => 'completed'
                ]
            );

            // Send notification to user
            if ($order->user) {
                $order->user->notify(new PaymentSuccessNotification($order, $transaction));
            }

            DB::commit();
            return $order;
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
  
}