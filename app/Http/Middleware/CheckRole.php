<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

       if (Auth::check()){
           if (Auth::user()->role->name == "subcriber" ){
               return redirect('tin-tuc');
//               return redirect()->intended();

           }

       }else{
           return redirect('tin-tuc');
       }
        return $next($request);
    }
}
