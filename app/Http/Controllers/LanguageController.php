<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;

class LanguageController extends Controller
{
    /**
     * store passed locale in cookie
     * 
     * @return \Illuminate\Http\Response
     */
    public function index($locale)
    {
        Cookie::queue('locale', $locale);
        return redirect()->back();
    }
}
