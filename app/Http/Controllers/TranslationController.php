<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TranslationController extends Controller
{
    /**
     * Change session locale
     * @param  Request $request
     * @return Response
     */
    public function changeLocale(Request $request)
    {
        $this->validate($request, ['locales' => 'required|in:kh,en']);

        \Session::put('locale', $request->locales);

        return redirect()->back();
    }

}
