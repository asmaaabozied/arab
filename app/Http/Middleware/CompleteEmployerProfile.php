<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompleteEmployerProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $employer = $request->user();
        if (

            $employer->address == null
            or
            $employer->gender == null
            or
            $employer->zip_code == null
            or
            $employer->country_id == null
            or
            $employer->city_id == null
            or
            $employer->phone == null

        )
        {
            alert()->toast(trans('employer::employer.YouMustCompeteYourProfileFirst'), 'warning');
            return redirect()->route('employer.show.edit.my.profile.form');
        }
        return $next($request);
    }

}
