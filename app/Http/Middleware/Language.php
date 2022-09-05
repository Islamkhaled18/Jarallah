<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class Language
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
        if(session()->has('lang')){
            if(session()->get('lang') == 'ar'){
                App::setlocale('ar');
            }else if(session()->get('lang') == 'en'){
                App::setlocale('en');
            }
        }else{
            App()->setlocale('en');
        }

       
        return $next($request);
    }
}
