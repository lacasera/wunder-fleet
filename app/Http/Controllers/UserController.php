<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\MakePayment;
use App\Actions\StoreUserAction;
use App\Actions\Interfaces\MakePaymentInterface;

class UserController extends Controller
{
    protected $makePaymentAction;

    public function __construct(MakePaymentInterface $makePaymentAction)
    {
        $this->makePaymentAction = $makePaymentAction;
    }

    /**
     * @param  \Illuminate\Http\Request $request
     * @param StoreUserAction $storeUserAction
     * @return void
     */
    public function __invoke(Request $request, StoreUserAction $storeUserAction)
    {
        $user  = $storeUserAction->execute($request->all());

        if ($user) {
           $paymentResponse = $this->makePaymentAction->execute(
               $user->id,
               $request->account_owner,
               $request->iban
           );
           $paymentDataId = $paymentResponse->paymentDataId;
        }

        return sendSuccess(compact('user', 'paymentDataId'), 201);
    }

}
