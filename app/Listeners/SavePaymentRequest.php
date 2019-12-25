<?php

namespace App\Listeners;

use App\Events\PaymentMade;
use App\Payment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SavePaymentRequest
{
    private $paymentModel;

    /**
     * Create the event listener.
     *
     * @param Payment $paymentModel
     */
    public function __construct(Payment $paymentModel)
    {
        $this->paymentModel = $paymentModel;
    }

    /**
     * Handle the event.
     *
     * @param  PaymentMade  $event
     * @return void
     */
    public function handle(PaymentMade $event)
    {
        $this->paymentModel->create([
            'payment_data_id' => $event->paymentDataId,
            'user_id' => $event->userId
        ]);
    }
}
