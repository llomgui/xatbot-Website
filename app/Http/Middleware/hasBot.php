<?php

namespace OceanProject\Http\Middleware;

use Closure;

class hasBot
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
        if (Session('onBotEdit') === false) {
            return redirect()
                ->route('panel')
                ->withError('You have to create a bot first!');
        }


        return $next($request);
    }
}
