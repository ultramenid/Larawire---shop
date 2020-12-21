<?php

use Illuminate\Support\Facades\DB;

function cekCart($id){
    return DB::table('carts')
    ->where('product_id', $id)
    ->exists();
}
