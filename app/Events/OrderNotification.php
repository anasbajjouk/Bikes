<?php

namespace App\Events;

use App\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //return new Channel('order-notification.' . $this->order->id);
        return ['private-order-notification.' .$this->order->id, 'order-notification'];
    }

    public function broadcastWith()
    {
        $delivered = $this->order->delivered == 0? "Waiting" : "Yes";
        $extra = [
            'status_percent' => $this->order->status,
            'delivered' => $this->order->delivered
        ];

        return array_merge($this->order->toArray(), $extra);
    }
}
