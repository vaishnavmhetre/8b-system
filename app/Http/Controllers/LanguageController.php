<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request)
    {
        $request->validate([
            'languageCode' => 'required'
        ]);
        $languageCode = $request->languageCode;
        loadLanguageToCookie($languageCode);

        return redirect()->back();
    }
}
