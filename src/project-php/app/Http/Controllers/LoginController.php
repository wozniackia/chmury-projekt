<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function login(Request $req)
    {
        $rules = [
            'name' => 'required|string|min:3|max:255|regex:/^[0-9A-Za-ząęłńśćźżó_-]{2,25}$/',
            'password' => 'required|string|min:8|max:255'
        ];
        $this->validate($req, $rules);
        try {
            // $user = Auth::getProvider()->retrieveByCredentials($req->only('name', 'password'));

            if(Auth::attempt(['name' => $req->name, 'password' => $req->password])) {
                $req->session()->regenerate();
                return redirect(route('home'));
            }
            return back()->withErrors([
                '' => 'User does not exist.'
            ]);
            
        } catch (Exception $e) {
            return redirect(route('login'))->with('failed', "operation failed {{$e->getMessage()}}");
        }
    }
}
