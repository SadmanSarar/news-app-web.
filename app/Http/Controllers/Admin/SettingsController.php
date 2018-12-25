<?php

namespace App\Http\Controllers\Admin;

use App\Data\Model\Settings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //
    public function index(Request $request)
    {
        $settings = Settings::whereIn('key', [
            'app_fcm_key',
            'app_api_key',
            'privacy_policy',
        ])->get();

        $values = [];

        foreach ($settings as $setting) {
            $values[$setting->key] = $setting->value;
        }

        return view('admin.settings.index',compact('values'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $fcm = Settings::where('key', '=', 'app_fcm_key')->first();
        if ($fcm == null) {
            $fcm = new Settings();
        }
        $fcm->key   = 'app_fcm_key';
        $fcm->value = $data['app_fcm_key'];

        $fcm->save();

        $fcm = Settings::where('key', '=', 'app_api_key')->first();
        if ($fcm == null) {
            $fcm = new Settings();
        }
        $fcm->key   = 'app_api_key';
        $fcm->value = $data['app_api_key'];

        $fcm->save();

        $fcm = Settings::where('key', '=', 'privacy_policy')->first();
        if ($fcm == null) {
            $fcm = new Settings();
        }
        $fcm->key   = 'privacy_policy';
        $fcm->value = $data['privacy_policy'];

        $fcm->save();

        return redirect()->route('settings.index');
    }

}
