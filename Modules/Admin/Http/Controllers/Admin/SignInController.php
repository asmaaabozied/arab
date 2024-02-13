<?php

namespace Modules\Admin\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Mews\Captcha\Facades\Captcha;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Http\Requests\SignInRequest;

class SignInController extends Controller
{
    protected function guard()
    {
        return Auth::guard('admin');
    }
    public function showSignInPage(){
        $page_name = 'ArabWorkers |Admin - SignIn';
        return view('admin::layouts.sign-in',compact('page_name'));
    }

    public function refreshCaptcha(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'captcha' => Captcha::img()
        ]);
    }
    public function signingIn(SignInRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();
        if (auth()->guard('admin')->attempt(['email' => $validated['email'], 'password' =>$validated['password']])) {
            alert()->toast(trans('admin::signIn.You have been successfully logged in by e-mail'), 'success');
            return redirect()->route('admin.show.dashboard');
        }
        elseif (auth()->guard('admin')->attempt(['administrative_number' => $validated['email'], 'password' => $validated['password']])) {
            alert()->toast(trans('admin::signIn.You have been successfully logged in by administrative number'), 'success');
            return redirect()->route('admin.show.dashboard');
        }
        else {
            return redirect()->back()->with([trans('error') => trans('admin::admin.The email or administrative  number or password is incorrect')]);
        }
    }

}
