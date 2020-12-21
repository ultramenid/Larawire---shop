<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Login Page'
        ];
        return view('pages.login', $data);
    }
    public function logout(){
        session()->flush();
        return redirect('/');
    }
}
