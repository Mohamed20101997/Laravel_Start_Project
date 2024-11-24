<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AuthInterface;

class AuthRepository implements AuthInterface
{

    public function getLogin()
    {
        return view('dashboard.auth.login');
    }

    public function login($request)
    {
        $remember_token = $request->has('remember_token') ? true : false ;

        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_token)) {
            return redirect()->route('welcome');
        }

        return \Redirect::back()->withErrors(['msg' => 'Invalid email or password.']);

    }

    public function logout()
    {
        $guard  = $this->getGuard();
        $guard->logout();
        return redirect()->route('login');
    }

    private function getGuard(){
        return auth('admin');
    }


}
