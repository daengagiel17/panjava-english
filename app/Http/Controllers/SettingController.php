<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $setting = Setting::first();

        return view('setting.show', compact(['setting']));
    }

    public function edit()
    {
        $setting = Setting::first();
        
        return view('setting.edit', compact(['setting']));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();
        $setting->due = $request->due;
        $setting->save();
        
        return redirect()->route('setting.show');
    }

}
