<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsEmployerVerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->email_verified_at == null) {
            alert()->toast(trans('employer::employer.You are not authorized to do this action, first activate your email'), 'info');
            return redirect()->route('employer.show.my.profile');
        }
        return $next($request);
    }
}
