<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiRequest;

use App\Events\MakePayment;
use App\Actions\StoreUserAction;

class UserController extends Controller
{

    /**
     * @param ApiRequest $request
     * @param StoreUserAction $storeUserAction
     * @return void
     */
    public function __invoke(ApiRequest $request, StoreUserAction $storeUserAction)
    {
        $user  = $storeUserAction->execute($request->all());

        if ($user) {
            $paymentDataId = $user->makePayment($request->iban);
        }

        return sendSuccess(compact('user', 'paymentDataId'), 201);
    }

}
