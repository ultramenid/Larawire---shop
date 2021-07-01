<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $isCreating , $isUpdate , $deleter , $isDelete ;
    public $photo, $name, $price, $quantity, $category, $discount= 0 ;
    public $uphoto, $uName, $uPrice, $uQuantity, $uCategory, $uId, $uDiscount;
    public $deleteName, $deleteID, $deletePhoto;
    public $search = '' ;
    public $readyToLoad = true;
    public $dataField = 'name';
    public $dataOrder= 'asc' ;
    public $paginate = 5;

    //sorting filed function
    public function sortingField($field){
        $this->dataField = $field;
        $this->dataOrder = $this->dataOrder == 'asc' ? 'desc' : 'asc';
    }


    //realtime validation upload
    public function updatedPhoto($photo)
    {
        $extension = pathinfo($photo->getFilename(), PATHINFO_EXTENSION);
        if (!in_array($extension, ['png', 'jpeg', 'bmp', 'gif','jpg'])) {
            $this->reset('photo');
        }
        $this->validate([
            'photo' => 'image|max:2048', // 2MB Max
        ]);
    }


    //redirect on create new category
    public function updatedcategory()
    {
        if($this->category == 'creating'){
             redirect()->to('/productscategory');
        }
    }

    //initialload
    public function loadPosts()
    {
        $this->categoryData();
        $this->productsData();
        $this->readyToLoad = false;
    }

    // modal create
    public function create(){
        $this->isCreating = !$this->isCreating;
        $this->clearField();
    }



    public function update(){
        $this->isUpdate = true;
    }


    public function closeUpdate(){
        $this->isUpdate = false;
        $this->photo ='';
    }

    //clearfield
    public function clearField(){
        $this->name ='';
        $this->price='';
        $this->quantity='';
        $this->photo='';
        $this->category='';
        $this->discount=0;

    }

    public function edit($id){
        $data = DB::table('products')->where('id', $id)->first();
        $this->uName = $data->name;
        $this->uId = $data->id;
        $this->uPrice = $data->price;
        $this->uQuantity = $data->quantity;
        $this->uphoto = $data->photo ;
        $this->uCategory = $data->category_id;
        $this->uDiscount = $data->discount;
        $this->update();
    }

    //store data to db
    public function store(){
        $this->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'photo' => 'required',
            'category' => 'required'
        ]);

        $potoimg = $this->photo->store('images', 'public');

        DB::table('products')->insert([
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'photo' =>  $potoimg,
            'discount' => $this->discount,
            'category_id' => $this->category,
            'created_at' => Carbon::now()
            ]
        );
        //passing to toast
        $message = 'Successfully adding product';
        $type = 'success'; //error, success
        $this->emit('toast',$message, $type);
        $this->create();
    }

    public function storeUpdate($id){
        $this->validate([
            'uName' => 'required',
            'uPrice' => 'required|numeric',
            'uQuantity' => 'required|numeric',
            'uCategory' => 'required'
        ]);

        if(!$this->photo){
            $potoimg = $this->uphoto;
        }else{
            try {
                 unlink(storage_path('app/public/'.$this->uphoto));
                 $potoimg = $this->photo->store('images', 'public');
            } catch (\Throwable $th) {
                $potoimg = $this->photo->store('images', 'public');
            }
        }
        DB::table('products')
            ->where('id', $id)
            ->update([
            'name' => $this->uName,
            'price' => $this->uPrice,
            'quantity' => $this->uQuantity,
            'category_id' => $this->uCategory,
            'discount' => $this->uDiscount,
            'photo' => $potoimg,
            'updated_at' => Carbon::now()
            ]);

        //passing to toast
        $message = 'Successfully updating product';
        $type = 'success'; //error, success
        $this->emit('toast',$message, $type);
        $this->closeUpdate();

        DB::table('carts')->where('product_id', $id)->delete();
    }


    public function delete($id){

        //load data to delete function
        $dataDelete = DB::table('products')->where('id', $id)->first();
        $this->deleteName = $dataDelete->name;
        $this->deleteID = $dataDelete->id;
        $this->deletePhoto = $dataDelete->photo;

        $this->deleter = true;
    }

    public function closeDelete(){
        $this->deleter = false;
    }

    public function deleting($deleteID){
        //delete product from cart
        DB::table('carts')->where('product_id', $deleteID)->delete();

        //validating on delete product and image
        try {
            unlink(storage_path('app/public/'.$this->deletePhoto));
            DB::table('products')->where('id', $deleteID)->delete();
       } catch (\Throwable $th) {
            DB::table('products')->where('id', $deleteID)->delete();
       }


        //passing to toast
        $message = 'Successfully deleting product';
        $type = 'success'; //error, success
        $this->emit('toast',$message, $type);
        $this->closeDelete();
    }


    public function productsData(){
        $sc = '%' . $this->search . '%';
        try {
           return DB::table('products')
                ->where('name', 'like', $sc)
                ->orderBy($this->dataField, $this->dataOrder)
                ->paginate($this->paginate);
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function categoryData(){
        return DB::table('products_category')->get();
    }

    public function render(){

        $data= [
            'categories' =>  $this->categoryData()  ,
            'products' => $this->productsData()
        ];
        return view('livewire.product-list', $data);
    }
}
