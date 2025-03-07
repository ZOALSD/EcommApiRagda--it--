<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

//SellerNotify.php
class SellerNotify implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $Seller;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($Seller)
    {
        $this->Seller = $Seller;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return ['seller-notify'];
    }

    public function broadcastAs()
    {
        return 'notfy-seller';
    }
}
