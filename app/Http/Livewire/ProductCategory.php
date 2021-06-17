<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\This;

class ProductCategory extends Component
{
    use WithPagination;
    public $isCreating = false, $isUpdate = false, $deleter= false;
    public $name, $uName, $uId;
    public $deleteName, $deleteID;
    public $no = 1;
    public $readyToLoad = false;



    public function loadPosts()
    {
        if($this->categoryData()){

            return $this->readyToLoad = true;
        }

        return $this->readyToLoad = false;
    }

    //modal insert
    public function create(){
        $this->isCreating = !$this->isCreating;
        $this->clearField();
    }

    //modal update
    public function update(){
        $this->isUpdate = true;

    }

    public function closeUpdate(){
        $this->isUpdate = false;
        $this->clearField();
    }

    //just clear the field
    public function clearField(){
        $this->name= '';
        $this->uName= '';

    }

    // store to db
    public function store(){
        $this->validate([
            'name' => 'required'
        ]);

        DB::table('products_category')->insert([
            'name' => $this->name,
            'created_at' => Carbon::now()
            ]
        );
        $this->clearField();
        $this->closeCreate();

    }

    //store update to db
    public function storeUpdate($id){
        $this->validate([
            'uName' => 'required'
        ]);
        DB::table('products_category')
              ->where('id', $id)
              ->update([
                'name' => $this->uName,
                'updated_at' => Carbon::now()
                ]);
        $this->closeUpdate();
        $this->clearField();
    }

    //passing data to modal edit
    public function edit($id){
        $data = DB::table('products_category')->where('id', $id)->first();
        $this->uName = $data->name;
        $this->uId = $data->id;
        $this->update();
    }

    // delete from db
    public function delete($id){
        $dataDelete = DB::table('products_category')->where('id', $id)->first();
        $this->deleteID = $dataDelete->id;
        $this->deleteName = $dataDelete->name;

        $this->deleter = true;
    }

    public function deleting($deleteID){

        try {
            DB::table('products_category')->where('id', $deleteID)->delete();
        } catch (\Throwable $th) {
            $message = 'Cannot delete, Category has product records';
            $type = 'error'; //error, success
           $this->emit('toast',$message, $type);
        }
        $this->closeDelete();
    }


    public function closeDelete(){
        $this->deleter = false;


    }
    public function categoryData(){
        try {
          return  DB::table('products_category')->orderBy('id', 'desc')->paginate(10);
        } catch (\Throwable $th) {
          return [];
        }
    }
    public function render()
    {
        $data = [
            'category' => $this->readyToLoad ? $this->categoryData()  : []
        ];
        return view('livewire.product-category',$data);
    }
}
