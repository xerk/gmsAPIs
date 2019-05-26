<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Worker;
use App\Category;
use App\CategoryUser;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $http = new Client();
        try {
            $response = $http->post(config('services.passport.login_endpoint'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_secret'),
                    'username' => $request->username,
                    'password' => $request->password,
                ]
            ]);
            return $response->getBody();
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            if ($e->getCode() === 400) {
                return response()->json('Invalid Request. Please enter a username or a password.', $e->getCode());
            } else if ($e->getCode() === 401) {
                return response()->json('Your credentials are incorrect. Please try again', $e->getCode());
            }
            return response()->json('Something went wrong on the server.', $e->getCode());
        }
    }
    public function register(Request $request)
    {
        // dd($request->all());
        if ($request->job === 1) {
            $validate = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:16|unique:users',
                'job' => 'required',
                'password' => 'required|string|min:6',
                'age' => 'required',
            ]);
        } else {
            $validate = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:16|unique:users',
                'job' => 'required',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'age' => 'required',
            ]);
        }

        // Valid categoriy if exsist
        $validCategory = Category::where('id', $request->category_id)->first();
        
        if ($validate == true && $validCategory) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'job' => $request->job,
                'phone' => $request->phone,
                'city_id' => $request->city_id,
                'region_id' => $request->region_id,
                'age' => $request->age,
            ]);
            
            if ($request->job == 1) {
                Worker::create([
                    'user_id' => $user->id,
                    'price' => $request->price,
                    'category_id' => $request->category_id
                ]);
            }
        } else {
            return response()->json(['code' => '401', 'error_message' => 'Category is empty', 'status' => false], 200);
        }
        return response()->json(['code' => '200', 'success_message' => 'Register successfully', 'status' => true], 200);
    }
    public function logout()
    {
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return response()->json(['code' => '200', 'success_message' => 'Logged out successfully', 'status' => true], 200);
    }
}
