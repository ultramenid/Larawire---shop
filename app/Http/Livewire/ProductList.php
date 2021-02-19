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
    public $isCreating = false , $isUpdate = false, $deleter = false;
    public $photo, $name, $price, $quantity, $category, $discount= 0 ;
    public $uphoto, $uName, $uPrice, $uQuantity, $uCategory, $uId, $uDiscount;
    public $deleteName, $deleteID;
    public $search = '' ;
    public $readyToLoad = false;
     public function updatingSearch()
    {
        $this->resetPage();
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

    public function loadPosts()
    {
        $this->readyToLoad = true;
    }

    //open modal create
    public function create(){
        $this->isCreating = true;
    }
    public function update(){
        $this->isUpdate = true;
    }
    public function closeUpdate(){
        $this->isUpdate= false;
    }

    //close modal creae
    public function closeCreate(){
        $this->isCreating = false;
        $this->clearField();
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

        $name = $this->photo->store('images', 'public');

        DB::table('products')->insert([
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'photo' =>  $name,
            'discount' => $this->discount,
            'category_id' => $this->category,
            'created_at' => Carbon::now()
            ]
        );
        $this->closeCreate();
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
            $potoimg = $this->photo->store('images', 'public');
            Storage::delete($this->uphoto);
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
        $this->closeUpdate();

        DB::table('carts')->where('product_id', $id)->delete();
    }


    public function delete($id){
        $dataDelete = DB::table('products')->where('id', $id)->first();
        $this->deleteName = $dataDelete->name;
        $this->deleteID = $dataDelete->id;
        $this->deleter = true;
    }

    public function closeDelete(){
        $this->deleter = false;
    }

    public function deleting($deleteID){
        DB::table('products')->where('id', $deleteID)->delete();
        $this->closeDelete();
    }


    public function productsData(){
        $sc = '%' . $this->search . '%';
        try {
           return DB::table('products')
                ->where('name', 'like', $sc)
                ->orderBy('id', 'desc')->paginate(5);
        } catch (\Throwable $th) {
            return [];
        }
    }
    public function render()
    {

        $data= [
            'categories' => $this->readyToLoad ? DB::table('products_category')->get() : [],
            'products' => $this->readyToLoad ? $this->productsData() : []
        ];
        return view('livewire.product-list', $data);
    }
}
