<?php

namespace App\Http\Controllers;

use App\Actions\GetAction;
use App\Actions\IssueTokenAction;
use App\Actions\StoreAction;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function _construct()
    {
        $this->middleware('protected')
            ->except(['storeDetails']);
    }


    /**
     * registers a new user.
     *
     * @param  \Illuminate\Http\Request $request
     * @param StoreAction $storeAction
     * @param IssueTokenAction $issueTokenAction
     * @return void
     */
    public function storeDetails(Request $request, StoreAction $storeAction, IssueTokenAction $issueTokenAction)
    {
        $results  = $storeAction->execute($request->all());

        $results['token'] = $issueTokenAction->execute($results['user']);

        return sendSuccess($results, 201);
    }

    /**
     * @param Request $request
     * @param GetAction $getAction
     */
    public function getDetails(Request $request, GetAction $getAction)
    {
        
    }
}
