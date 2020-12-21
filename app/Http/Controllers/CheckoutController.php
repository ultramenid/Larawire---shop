<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Checkout Page',
            'tabs' => 'none'
        ];
        return view('pages.checkout', $data);
    }
}
