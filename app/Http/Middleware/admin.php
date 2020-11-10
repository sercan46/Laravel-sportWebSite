<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class admin
{

    public function handle($request, Closure $next)
    {
    	if(Auth::check() && Auth::user()->yetki()=="admin") {
		    return $next($request);
	    }else {

		   return redirect('/');

	    }
    }
}
