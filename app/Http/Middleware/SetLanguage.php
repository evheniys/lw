<?php namespace App\Http\Middleware;
use Closure;
use Auth;
use LaravelLocalization;
use Config;
use Redirect;
class SetLanguage
{
    public function handle($request, Closure $next)
    {

        $addrLocale = $request->segment(1);
        $locales = LaravelLocalization::getSupportedLocales();
        $locales = array_keys( $locales );
        $defaultLocale = Config::get('app.locale');
        if ( !Auth::guest() )
        {
            // ставим локаль из настроек пользователя, если она разрешена
            $userLocale = Auth::user()->locale;
            if ( in_array( $userLocale, $locales ) )
            {
                LaravelLocalization::setLocale($userLocale);
            }
        }
        else
        {
            // ставим локаль из адреса, если она разрешена

            if ( in_array( $addrLocale, $locales ) )
            {

                LaravelLocalization::setLocale($addrLocale);
            }
            else
            {
                // иначе отправляем на адрес с локалью по умолчанию
                return Redirect( '/'.$defaultLocale );
            }
        }
        return $next($request);
    }
}