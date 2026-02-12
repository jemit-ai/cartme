<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class HandleOrderCreated
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
        //$this->order = $event->order;
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        //
        $order = $event->order;
        Log::info('Order created: ' . json_encode($order));

    }
}
