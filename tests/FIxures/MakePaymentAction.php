<?php

namespace Tests\Fixtures;

use Illuminate\Support\Str;
use App\Actions\Interfaces\MakePaymentInterface;

class MakePaymentAction implements MakePaymentInterface
{
    public function execute($userId, $owner, $iban)
    {
        $paymentData = Str::random(96);

        event(new PaymentMade($userId, $paymentData));

        return "{'paymentDataId': $paymentData}";
    }
}