<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ExpiredPasswordController extends Controller
{
    public function expired() 
    {
        return view('auth.passwords.expired');
    }

    public function postExpired(Request $request) 
    {
        //dd('ok');
        if (!Hash::check($request->current_password, $request->user()->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is not correct']);
        }
        
        $request->user()->update([
            'password' => Hash::make($request->password),
            'password_expired_at' => Carbon::now()->addDays(config('auth.password_expiry_days'))->toDateTimeString(),
            'password_reset_at' => Carbon::now()->toDateTimeString()
        ]);

        $request->session()->regenerate();
        return redirect('/');
    }
}
