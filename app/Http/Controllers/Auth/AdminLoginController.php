<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    
    public function Login(Request $request)
    {
        $this->validade($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->passoword
        ]; 

        $authOk = Auth::guard('admin')->attempt($credentials, $request->remember);

        if($authOk){
            return redirect()->intended(route('admindashboard'));
        }
        return redirect()->back()->withInputs($request->only('email', 'remember'));
    }

    public function index()
    {
        return view("auth.admin-login");
    }
}
