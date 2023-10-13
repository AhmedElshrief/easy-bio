<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function changeLang(Request $request)
    {
        $langArr = config('translatable.locales');
        if($request->has('lang')){
            if (in_array($request->get('lang'), $langArr)){
                Session::put('lang', $request->get('lang'));
                return redirect()->back();
            }
        }
        return redirect()->back();
    }

}
