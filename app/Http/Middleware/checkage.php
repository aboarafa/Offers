<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class checkage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
      public function handle($request, Closure $next)
    {
        //login middleware
        
        $age =Auth::user() ;
        if($request -> $age > 15){
            return redirect() -> route('video')  ;
        }
        return $next($request);
    }

}
