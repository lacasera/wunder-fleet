<?php
namespace App\Actions;

use App\AccessToken;
use App\User;

class IssueTokenAction
{
    public function execute(User $user)
    {
        $accessToken = $user->accessToken()->updateOrCreate([
            'user_id' => $user->id],
            factory(AccessToken::class)->raw(['user_id' => $user->id])
        );

       return $accessToken->token;
    }
}