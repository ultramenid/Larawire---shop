<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Products Page',
            'tabs' => 'products',
            'sub_tabs' => 'list'
        ];
        return view('pages.products', $data);
    }
}
