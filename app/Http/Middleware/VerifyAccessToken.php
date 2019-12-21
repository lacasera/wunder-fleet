<?php

namespace App\Http\Middleware;

use App\AccessToken;
use Closure;
use Illuminate\Http\Response;

class VerifyAccessToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $header = $request->header('X-ACCESS-TOKEN');

        if (!$header) {
            return sendError('missing access token', Response::HTTP_UNAUTHORIZED);
        }

        $accessToken =  AccessToken::where('token', '=', $header)->first();

        if(!$accessToken || $accessToken->has_expired) {
            return sendError('invalid or expired access token', Response::HTTP_UNAUTHORIZED);
        }

        auth()->loginUsingId($accessToken->user->id);

        return $next($request);
    }
}
