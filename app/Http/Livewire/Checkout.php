<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Checkout extends Component
{

    protected $listeners = [
        'removeItem' => '$refresh'
    ];

    public function ceckFout(){
        DB::table('history_checkout')->insert([
            'user_id' => session('id'),
            'total' => $this->grandTotal(),
            'created_at' => Carbon::now()
        ]);

        DB::table('carts')->where('user_id', session('id'))->delete();
        $this->emit('cartAdded');
        session()->flash('message', 'Order successfully submited.');

    }
    public function addQuantity($id, $category_id, $price, $discount, $quantity){
        $bquantity = $quantity + 1;
        $btotal = $price * $bquantity - (($discount / 100 * $price) * $bquantity);
        // dd($btotal);
         DB::table('carts')
        ->where('product_id', $id)
        ->where('user_id', session('id'))
        ->update([
            'quantity' => $bquantity,
            'total' => $btotal
        ]);
        $this->emit('cartAdded');
    }

    public function minQuantity($id, $category_id, $price, $discount, $quantity){
        if($quantity >= 1){
            $bquantity = $quantity - 1;
            $btotal = $price * $bquantity - (($discount / 100 * $price) * $bquantity);
            // dd($btotal);
             DB::table('carts')
            ->where('product_id', $id)
            ->where('user_id', session('id'))
            ->update([
                'quantity' => $bquantity,
                'total' => $btotal
            ]);
        }
        DB::table('carts')
        ->where('product_id', $id)
        ->delete();
        $this->emit('cartAdded');

    }
    public function grandTotal(){
        return DB::table('carts')
                ->where('user_id', session('id'))
                ->join('products_category', 'carts.category_id', '=', 'products_category.id')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->select('products.*', 'products_category.name as category_name', 'carts.quantity', 'carts.total')
                ->sum('carts.total');
    }

    public function removeItem($id){
        DB::table('carts')->where('id', $id )->delete();
        $this->emit('cartAdded');
        $this->emitSelf('removeItem');
    }

    public function render()
    {
        $data= [
            'carts' => DB::table('carts')
                ->where('user_id', session('id'))
                ->join('products_category', 'carts.category_id', '=', 'products_category.id')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->select('products.*', 'products_category.name as category_name', 'carts.quantity', 'carts.total', 'carts.id as cart_id')
                ->get(),
            'count' => DB::table('carts')
            ->where('user_id', session('id'))
            ->sum('quantity'),
            'sumTotal' => $this->grandTotal()

        ];
        return view('livewire.checkout', $data);
    }
}
