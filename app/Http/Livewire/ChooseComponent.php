<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ChooseComponent extends Component
{
    public $search;
    public $readyToLoad = false;

    public function addtocart($id, $category_id, $price, $discount){
        DB::table('carts')->insert([
            'product_id' => $id,
            'user_id' => session('id'),
            'quantity' => 1,
            'total'=> $price * 1 - (($discount / 100 * $price) * 1),
            'category_id' => $category_id,
            'created_at' => Carbon::now()
            ]
        );
        $this->emit('cartAdded');
    }
    public function removefromcart($id){
        DB::table('carts')
        ->where('product_id', $id)
        ->delete();

        $this->emit('cartAdded');
    }

    public function loadFirst(){
        if ($this->dataProducts()) {
           return $this->readyToLoad = true;
        }
        return $this->readyToLoad = false;
    }

    public function dataProducts(){
       return  DB::table('products')
        ->join('products_category', 'products.category_id', '=' , 'products_category.id')
        ->select('products.*','products_category.name as category_name')
        ->orderBy('id', 'desc')->paginate(10);
    }


    public function render()
    {
        $data= [
            'products' => $this->readyToLoad ? $this->dataProducts() : []
        ];
        return view('livewire.choose-component', $data);
    }
}
