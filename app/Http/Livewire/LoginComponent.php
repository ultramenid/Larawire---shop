<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LoginComponent extends Component
{
    public $username, $password;

    public function login(){
        $this->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        //log in logic
        if($this->isValidUser()){
           session([
               'id' => $this->isValidUser()->id,
               'role_id'=> $this->isValidUser()->role_id
           ]);
           redirect('/dashboard');

        }else{
            session()->flash('message', 'Username & Password not valid.');
        }

    }

    //check user is registered
    public function isValidUser(){
       return DB::table('users')
        ->where('username', $this->username)
        ->where('password', $this->password)
        ->first();
    }
    public function render()
    {
        return view('livewire.login-component');
    }
}
