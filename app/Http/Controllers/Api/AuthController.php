<?php

namespace App\Http\Controllers\Api;

use App\Data\Model\Reader;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ChangePasswordRequest;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Resources\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{

    public function postLogin(Request $request)
    {
        Log::error($request);
        $email    = $request->input('email');
        $password = $request->input('password');
        
        if ($email == '' || $password == '') {
            $response               = new \stdClass();
            $response->code         = 422;
            $response->app_message  = "Incomplete Request. Email and Password required";
            $response->user_message = 'Incomplete Request. Email and Password required';
            $response->context      = 'login';
            return response()->json($response, 422);
        }

        $user = Reader::where('email', '=', $email)->first();

        if ($user == null || !(Hash::check($password, $user->password))) {
            $response               = new \stdClass();
            $response->code         = 403;
            $response->app_message  = 'login unsuccessful, credentials mismatch-match';
            $response->user_message = 'Credentials didn\'t validate.';
            $response->context      = 'login';

            return response()->json($response, 403);
        }


        $user->api_token = bcrypt(time());
        $user->save();

        $response               = new \stdClass();
        $response->code         = 200;
        $response->app_message  = "login success, credentials match, {$user->email}, {$user->token_issued_at}";
        $response->user_message = 'Log In Successful';
        $response->context      = 'login';
        $response->access_token = $user->api_token;
        $response->user         = new User($user);

        return response()->json($response, 200);

    }

    public
    function postChangePassword(ChangePasswordRequest $request)
    {
        $user = auth('api')->user();

        $oldPassword = $request->input('old_password', null);
        $password    = $request->input('new_password', null);

        $user = Reader::find($user->id);

        $match = Hash::check($oldPassword, $user->password);

        if ($match) {
            $user->password  = bcrypt($password);
            $user->api_token = null;
            $user->save();

            $response               = new \stdClass();
            $response->code         = 200;
            $response->app_message  = "password change successful, {$user->username}";
            $response->user_message = 'Password changed successfully';
            $response->context      = 'change_password';

            return response()->json($response, 200);
        } else {
            $response               = new \stdClass();
            $response->code         = 403;
            $response->app_message  = "password change unsuccessful, old password didn't match, {$user->username}";
            $response->user_message = 'Old password didn\'t match. Password change unsuccessful.';
            $response->context      = 'change_password';

            return response()->json($response, 403);
        }

    }

}
