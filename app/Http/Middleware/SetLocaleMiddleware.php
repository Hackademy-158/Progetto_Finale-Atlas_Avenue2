<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleMiddleware
{   
    
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {  
        // Supported locales
        $supportedLocales = ['it', 'en', 'de'];

        // Get locale from session, default to 'it'
        $localeLanguage = session('locale', 'it');

        // Validate locale
        if (!in_array($localeLanguage, $supportedLocales)) {
            $localeLanguage = 'it';
        }

        // Set application locale
        App::setLocale($localeLanguage); 

        return $next($request);
    }
}
