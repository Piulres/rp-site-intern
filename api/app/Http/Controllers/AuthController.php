<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;
use Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        // Get only email and password from request
        $credentials = $request->only('email', 'password');

        // Get user by email
        $company = Company::where('email', $credentials['email'])->first();

        echo '1';

        // Validate Company
        if(!$company) {
            return response()->json([
                'error' => 'Invalid credentials'
            ], 401);
        }

        echo '2';

        // Validate Password
        if (!Hash::check($credentials['password'], $company->password)) {
            return response()->json([
                'error' => 'Invalid credentials'
            ], 401);
        }

        echo '3';

        // Generate Token
        $token = JWTAuth::fromUser($company);

        echo '4';

        // Get expiration time
        $objectToken = JWTAuth::setToken($token);
        $expiration = JWTAuth::decode($objectToken->getToken())->get('exp');

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::decode()->get('exp')
        ]);

        // try {
        //     // attempt to verify the credentials and create a token for the user
        //     if (! $token = JWTAuth::attempt($credentials)) {
        //         return response()->json(['error' => 'invalid_credentials'], 401);
        //     }
        // } catch (JWTException $e) {
        //     // something went wrong whilst attempting to encode the token
        //     return response()->json(['error' => 'could_not_create_token'], 500);
        // }

        // all good so return the token
        // return response()->json(compact('token'));
    }
}
