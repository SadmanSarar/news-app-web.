<?php

namespace App\Http\Controllers\Api;

use App\Data\Model\News;
use App\Data\Model\Settings;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Resources\NewsResource;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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

        return response()->json($values);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile(Request $request)
    {
        $reader = auth('api')->user();


        return response()->json($reader);
    }
}
