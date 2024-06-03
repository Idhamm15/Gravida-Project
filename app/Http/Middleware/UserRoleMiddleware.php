<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        if ($user) {
            if ($user->role == 'USER' && $role != 'USER') {
                return response()->json(["message" => "You don't have permission to access this page"], 403);
            } else if ($user->role == 'ADMIN' && $role == 'SUPER ADMIN') {
                return response()->json(["message" => "You don't have permission to access this page"], 403);
            }
            } else {
                return redirect('/login'); // atau melakukan tindakan lainnya jika pengguna belum masuk
            }

            return $next($request);
    }
}