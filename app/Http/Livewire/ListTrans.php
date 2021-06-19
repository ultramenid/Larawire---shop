<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ListTrans extends Component
{
    use WithPagination;
    public $no = 1;
    public $readyToLoad= false;

    public function loadPosts(){
        $this->readyToLoad= true;
    }
    public function render()
    {
        $data=[
            'lists' => $this->readyToLoad ? DB::table('history_checkout')
                ->join('users', 'history_checkout.user_id', '=' , 'users.id')
                ->select('products.*','products_category.name as category_name')
                ->select('history_checkout.*','users.name as user_name')
                ->orderBy('id', 'desc')->paginate(10)
                : []
        ];
        return view('livewire.list-trans',$data);
    }
}
