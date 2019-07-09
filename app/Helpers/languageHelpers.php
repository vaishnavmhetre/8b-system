<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cookie;

if (!function_exists('getLocaleLanguageName')) {

    function getLocaleLanguageName($languageCode = null)
    {

        if ($languageCode)
            return Arr::has(config('language.language_names'), $languageCode) ?
                Arr::get(config('language.language_names'), $languageCode) : null;


        $locale = app()->getLocale();

        if (Arr::has(config('language.language_names'), $locale))
            return Arr::get(config('language.language_names'), $locale);

        else if (Arr::has(config('language.language_names'), config('app.fallback_locale')))
            return Arr::get(config('language.language_names'), config('app.fallback_locale'));

        return null;
    }
}

if (!function_exists('loadLanguageFromCookie')) {
    function loadLanguageFromCookie()
    {
        $language = Cookie::get(config('language.language_cookie_key'));
        $language = $language ? decrypt($language, false) : app()->getLocale();

        if (!array_search($language, config('language.acceptable_languages'), true)) {
            $language = config('app.fallback_locale');
        }

        app()->setLocale($language);

        return $language;
    }
}

if (!function_exists('loadLanguageToCookie')) {
    function loadLanguageToCookie($language)
    {
        Cookie::queue(config('language.language_cookie_key'), $language, config('language.language_key_expires_in'));
    }
}