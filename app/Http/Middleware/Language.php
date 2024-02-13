<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
//        if (Session::has('applocale') AND array_key_exists(Session::get('applocale'), Config::get('languages'))) {
//            App::setLocale(Session::get('applocale'));
//        }
//        else { // This is optional as Laravel will automatically set the fallback language if there is none specified
//            Session::put('applocale', 'ar');
////            App::setLocale(Config::get('app.locale'));
//        }
        return $next($request);
    }
}
