<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Products Category',
            'tabs' => 'products',
            'sub_tabs' => 'category'
        ];

        return view('pages.categoryproduct',$data);
    }
}
