<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ChooseComponent extends Component
{
    public $search;
    public $readyToLoad = true;
    public $paginate = 10;


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
        $this->dataProducts();
        $this->readyToLoad = false;
    }

    public function dataProducts(){
       try {
            return  DB::table('products')
            ->join('products_category', 'products.category_id', '=' , 'products_category.id')
            ->select('products.*','products_category.name as category_name')
            ->orderBy('id', 'desc')->paginate($this->paginate);
       } catch (\Throwable $th) {
            return [];
       }
    }


    public function render(){
        $data= [
            'products' =>  $this->dataProducts()
        ];
        return view('livewire.choose-component', $data);
    }
}
