<?php

namespace App\Http\Controllers;

class UserSettingController extends Controller
{
    public function index()
    {
        $user = request()->user();
        return view('user-setting.index', [
            'app_support_languages' => config('app.support_languages'),
            'first_language' => $user->first_language,
            'study_language' => $user->study_language,
        ]);
    }

    public function store()
    {
        $user = request()->user();

        request()->validate([
            'first_language' => 'required',
            'study_language' => 'required',
        ]);

        $user->first_language = request('first_language');
        $user->study_language = request('study_language');
        $user->save();

        return redirect('/settings')->with('success', 'Updated!');
    }
}
