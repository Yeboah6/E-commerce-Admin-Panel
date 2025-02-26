<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Display Sign Up Page Function
    public function signup() {
        return view('auth.signup');
    }

    // Stores Sign Up Data Function
    public function postSignup(Request $request) {

        $validateData = $request -> validate([
            'name' => 'required|unique:customers',
            'email' => 'required|email|unique:customers',
            'number' => 'required|string',
            'password' => 'required|min:8|max:12'
        ]);

        $customer = new Customer();

        $customer -> fill([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'number' => $validateData['number'],
            'password' => Hash::make($validateData['password'])
        ]);

       if ($customer -> save()) {
            session(['customer_id' => $customer->id]);
            return redirect('/login');
       } else {
            return redirect()->back()->with('fail', 'Account not Created');
       };
        
    }

    // Display Login Page Function
    public function login() {
        return view('auth.login');
    }

    // Login Function
    public function postLogin(Request $request) {
        $request -> validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:12'
        ]);

        $user = Customer::where('email', '=', $request -> email) -> first();
        if($user) {
            if(Hash::check($request -> password, $user -> password)) {
                $request -> session() -> put('loginId', $user -> id);
                return redirect('/');
            } else {
                return back() -> with('fail', 'Incorrect Credentials!!');
            } 
        } else {
            return back() -> with('fail', 'You do not access to this portal!!');
        }
    }

    // Logout Function
    public function logout() {
        if(Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('/login');
        }
    }
}
