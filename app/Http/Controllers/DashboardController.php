<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Welcome Page',
            'tabs' => 'dashboard'
        ];
        return view('pages.dashboard', $data);
    }
}
