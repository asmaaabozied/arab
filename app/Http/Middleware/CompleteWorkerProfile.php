<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompleteWorkerProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $worker = $request->user();
        if (

            $worker->address == null
            or
            $worker->gender == null
            or
            $worker->zip_code == null
            or
            $worker->paypal_account == null
            or
            $worker->country_id == null
            or
            $worker->city_id == null
            or
            $worker->phone == null

        )
        {
            alert()->toast(trans('worker::worker.YouMustCompeteYourProfileFirst'), 'warning');
            return redirect()->route('worker.show.edit.my.profile.form');
        }
        return $next($request);
    }
}
