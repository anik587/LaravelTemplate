<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Password_expired
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $password_expired_at = new Carbon( $user->password_expired_at ? $user->password_expired_at : $user->created_at );
        if (Carbon::now() > $password_expired_at){
            return redirect()->route('password.expired');
        }
        return $next($request);
    }
}
