<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;
use PDF;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateInvoiceJob implements ShouldQueue
{
    use Queueable, SerializesModels, InteractsWithQueue, Dispatchable;

    /**
     * Create a new job instance.
     */
    public $order;

    public function __construct($order)
    {
        //
        $this->order = $order;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    { 
        
        $order = $this->order;

        $data = [
            'order' => $order,
            'items' => $order->items,
            'total' => $order->total_amount,
            'date' => $order->created_at,
            'invoice_number' => $order->invoice->invoice_number ?? 'N/A',
            'customer' => $order->billing_first_name . ' ' . $order->billing_last_name,
        ];

        $pdf = PDF::loadView('pdf.order.invoice', $data);

        $pdfContent = $pdf->output(); // Convert to binary conten

        $invoiceNo = $order->invoice->invoice_number ?? $order->id;

        Storage::disk('public')->put("invoices/invoice-{$invoiceNo}.pdf", $pdfContent);


    }
}
