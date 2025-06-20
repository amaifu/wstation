<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRegisterTokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function saveRegisterToken(Request $request) {
        $email = $request->input('email');
        $token = $request->input('token');
        
        $tokenModel = new UserRegisterTokens();
        
        if($tokenModel->query()->where('email', '=', $email)->update(['token' => $token])) {   
        } else {
            $tokenModel->email = $email;
            $tokenModel->token = $token;
            
            $tokenModel->save();
        }

       
    }
    function getRegisterToken(Request $request) {
        $tokenModel = new UserRegisterTokens();
        $token = $tokenModel->query()->where('email', '=', $request->input('email'))->get();

        return response()->json($token, 200);
    }
    
    function register(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirmPassword' => 'required|min:8',
        ]);

        if(!$validated) {
            $data = [
                'message' => 'Validatation Failed!',
            ];
            return response()->json($data, 401);
        }

        $email = $request->input('email');
        $password = $request->input('password');
        $confirmPassword = $request->input('confirmPassword');
        $name = substr($email, 0, strpos($email, '@'));


        $user = new User();
        $user->name = $name;
        $user->email = $email;
        
        if($password == $confirmPassword) {
            $user->password = bcrypt($password);;
            $user->save();

            $request->session()->put('user', $name);
            $request->session()->put('login', true);

            return redirect('/');
        } else {
            $data = [
                'message' => 'Password Mismatch!',
            ];
            return response()->json($data, 400);
        }
    }

    function login(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!$validated) {
            $data = [
                'message' => 'Validation Failed!',
            ];
            return response()->json($data, 401);
        }

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::query()->where('email', '=', $email)->get()[0];

        if(!$user) {
            $data = [
                'message' => 'User not found!',
            ];
            return response()->json($data, 404);
        }

        if(Hash::check($password, $user->password)) {
            $request->session()->put('user', $user->name);
            $request->session()->put('login', true);

            $data = [
                'message' => 'Login Succesfully!',
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Invalid Password!',
            ];
            return response()->json($data, 401);
        }

    }

    function logout() {
        session()->forget('user');
        session()->forget('login');

        return redirect('/');
    }

}
