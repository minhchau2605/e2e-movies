<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Show admin index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAdminIndex(){
        return view('admin.pages.index');
    }

    public function showLogin(){
        if (Auth::check()) {
            //return redirect()->route('admin');
            return view('admin.layouts.master');
        } else {
            return view('admin.pages.login');
        }
    }

    /**
     * Handle Login
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function loginHandle(LoginRequest $request)
    {
        $login = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
        if (Auth::attempt($login)) {
            return redirect()->route('show.admin.index');
        } else {
            return redirect()->back()->with('status', 'Username or Password is incorrect');
        }
    }

    /**
     * Logout
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
