<?php

namespace OceanProject\Http\Middleware;

use Closure;

class HasBot
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
        if (Session('onBotEdit') === null) {
            if ($request->path() != 'panel/bot/create') {
                return redirect()
                    ->route('panel')
                    ->withError('You have to create a bot first!');
            }
        }

        return $next($request);
    }
}
