<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

use function PHPSTORM_META\type;

class SuperAdminCheck
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
        if(session()->get('user')['user_type'] == "Superadmin"){
            return $next($request);
        }
        else{
            return Redirect('/');
        }
    }
}
