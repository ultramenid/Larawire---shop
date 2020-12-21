<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListTrans extends Component
{

    public $no = 1;
    public function render()
    {
        $data=[
            'lists' => DB::table('history_checkout')
                ->join('users', 'history_checkout.user_id', '=' , 'users.id')
                ->select('products.*','products_category.name as category_name')
                ->select('history_checkout.*','users.name as user_name')
                ->orderBy('id', 'desc')->paginate(10)
        ];
        return view('livewire.list-trans',$data);
    }
}
