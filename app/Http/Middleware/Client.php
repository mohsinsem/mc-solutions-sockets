<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Cache;
class Client
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
        if(\Schema::hasTable('migrations'))
        {
            if(!Auth::guard('client')->check())
            {
                return redirect()->route('client.login');
            }

            //add online
            Cache::put('user-'.auth()->guard('client')->user()['id'],'online',now()->addMinutes(2));

            //share settings
            $info=setting('info');
            $whatsapp=setting('whatsapp');
            $email=setting('emails');
            $api_keys=setting('api_keys');

            view()->share([
                'info'=>$info,
                'whatsapp'=>$whatsapp,
                'api_keys'=>$api_keys,
                'email'=>$email
            ]);
        }

        return $next($request);
    }
}
