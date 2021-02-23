<?php

namespace App\Events;

//use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
//use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DeliveryNotifiaction implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $count;
    public $UserID;

    public function __construct($conut, $UserID)
    {
        $this->count = $count;
        $this->UserID = $UserID;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new PrivateChannel('delivery-notify');
        return ['delivery-notify'];
    }

    public function broadcastAs()
    {
        return 'delivery-notify';
    }
}
