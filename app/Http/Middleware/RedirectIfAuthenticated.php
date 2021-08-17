<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
      // public function handle($request, Closure $next, $guard = null) {
      //   if (Auth::guard($guard)->check()) {
      //     $role = Auth::user()->role; 
      
      //     switch ($role) {
      //       case '0':
      //          return redirect('/');
      //          break;
      //       case '1':
      //          return redirect('admin/dashboard');
      //          break; 
      
      //       default:
      //          return redirect('/');
      //          break;
      //     }
      //   }
      //   return $next($request);
      // }
     
    
    public function handle (Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}