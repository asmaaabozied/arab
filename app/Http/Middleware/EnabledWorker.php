<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnabledWorker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $worker = $request->user();
        if ( $worker->status == "disable" ){
            alert()->toast(trans('worker::worker.Your account is currently disabled and you cannot take this action'), 'error');
            return redirect()->route('worker.show.my.profile');
        }
        return $next($request);
    }
}
