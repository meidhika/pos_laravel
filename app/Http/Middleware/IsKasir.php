<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class IsKasir
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       $user = Auth::user();

       if(!$user){
        return redirect()->to('/');
       }
        
        if(!$user->id_level != 3){

            Alert::warning('Sorry', 'Anda tidak memiliki akses ke menu tersebut');
            return redirect("/dashboard");
        }
        return $next($request);
    }
}
