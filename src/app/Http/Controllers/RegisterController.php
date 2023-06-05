<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function show()
    {
        return view('register');
    }

    public function insert()
    {
        return view('register');
    }

    public function register(Request $req)
    {

        $rules = [
            'name' => 'required|string|min:3|max:255|regex:/^[0-9A-Za-ząęłńśćźżó_-]{3,25}$/',
            'email' => 'required|string|email|max:255|regex:/^[0-9a-zA-Z]+@[a-z]+\.[a-z]{2,3}$/',
            'password' => 'required|string|min:8|max:255'
        ];
        $this->validate($req, $rules);
        try {
            $user = new User;
            $user->name = $req->input('name');
            $user->email = $req->input('email');
            // $user->password = Crypt::encrypt($req->input('password'));
            $user->password = Hash::make($req->input('password'));
            $user->save();
            $req->session()->put('user', $req->input('name'));
            return redirect(route('login'))->with('status', "Registered successfully");
        } catch (Exception $e) {
            return redirect(route('register'))->with('failed', "operation failed {{$e->getMessage()}}");
        }
    }
}
