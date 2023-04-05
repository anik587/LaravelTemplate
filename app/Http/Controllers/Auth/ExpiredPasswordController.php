<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpiredPasswordController extends Controller
{
    public function expired() {
        return view('auth.passwords.expired');
    }

    public function postExpired(Request $request) {
        dd($request->except(['method', '_token']));
    }
}
