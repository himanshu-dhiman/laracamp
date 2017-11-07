<?php

namespace app\Http\Controllers;

use app\Http\Controllers\Controller;
use app\Models\Token;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request)
    {
        $validator = $this->validateLogin($request->all());

        if($validator->fails()) {
            $this->error = $validator->errors()->first();

            return $this->sendFailedResponse($request);
        }

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }


        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        } else {
            $this->error = "These credentials don't match our records";
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedResponse($request);
    }


    private function validateLogin($data) {
        return Validator::make($data, [
            'email' => 'required|email|max:255|',
            'password' => 'required'
        ]);
    }

    private function sendLoginResponse($request) {

        $tokenData = $this->generateToken($request);

        dd($tokenData);

        $data = Auth::user()->toArray();



        if(!$tokenData) {
            $this->error = 'error in token generation';
            return $this->sendFailedResponse($request);
        }

        return response()->json([
            'token' => $tokenData['access_token'],
            'user' => $data
        ], 200);
    }

    private function sendFailedResponse($request) {
        return response()->json([
            'error' => $this->error
        ], 401);

    }

    private function generateToken($request) {
        $http = new Client;
        
        $requestTokenData = [
            'grant_type' => 'password',
            'client_id' => 4,
            'client_secret' => 'baQTGSHIuSdkPtmGciAbJC43nTAgvOruXIAgCRJl',
            'username' => $request->input('email', ''),
            'password' => $request->input('password', ''),
            'scope' => '', 
        ];


        $response = $http->post(\URL::to('/').'/oauth/token', [
            'form_params' => $requestTokenData
        ]);
        return json_decode((string) $response->getBody(), true);
    }
}
