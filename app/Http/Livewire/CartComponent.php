<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CartComponent extends Component
{

    protected $listeners = [
        'cartAdded' => '$refresh',
    ];
    public function render()
    {
        $data = [
            'countCart' => DB::table('carts')
            ->where('user_id', session('id'))
            ->sum('quantity')
        ];
        return view('livewire.cart-component', $data);
    }
}
