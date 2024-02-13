<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnabledEmployer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $employer = $request->user();
        if ( $employer->status == "disable" ){
            alert()->toast(trans('employer::employer.Your account is currently disabled and you cannot take this action'), 'error');
            return redirect()->route('employer.show.my.profile');
        }
        return $next($request);
    }
}
