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
    public $readyToLoad = true;
    public $dataField = 'name';
    public $dataOrder= 'asc' ;
    public $paginate = 5;

    //shorting
    public function sortingField($field){
        $this->dataField = $field;
        $this->dataOrder = $this->dataOrder == 'asc' ? 'desc' : 'asc';
    }


    //initdata
    public function loadPosts(){
        $this->categoryData();
        $this->readyToLoad = false;
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
        $this->create();

        //passing to toast
        $message = 'Successfully adding category';
        $type = 'success'; //error, success
        $this->emit('toast',$message, $type);
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


        //passing to toast
        $message = 'Successfully updating category';
        $type = 'success'; //error, success
        $this->emit('toast',$message, $type);
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

    //delete category
    public function deleting($deleteID){

        try {
            DB::table('products_category')->where('id', $deleteID)->delete();
               //passing to toast
            $message = 'Successfully deleting category';
            $type = 'success'; //error, success
            $this->emit('toast',$message, $type);
        } catch (\Throwable $th) {
            //passing to toast
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
            return  DB::table('products_category')->orderBy($this->dataField, $this->dataOrder)->paginate($this->paginate);
        } catch (\Throwable $th) {
            return [];
        }
    }
    public function render()
    {
        $data = [
            'category' => $this->categoryData()
        ];
        return view('livewire.product-category',$data);
    }
}
