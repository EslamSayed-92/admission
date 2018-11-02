<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Illuminate\Http\Request;  
use App\Config\Config ;

class Language
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
        $lang = Config::where('name','lang')->value('value');
        App::setlocale($lang);
        return $next($request);
    }
}
