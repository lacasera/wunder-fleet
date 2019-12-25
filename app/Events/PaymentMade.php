<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PaymentMade
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;

    public $paymentDataId;

    /**
     * Create a new event instance.
     *
     * @param int $userId
     * @param string $paymentDataId
     */
    public function __construct(int $userId,string  $paymentDataId)
    {
        $this->userId = $userId;

        $this->paymentDataId = $paymentDataId;
    }

}
