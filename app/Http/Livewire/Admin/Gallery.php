<?php

namespace App\Http\Livewire\Admin;

use App\Models\Picture;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Gallery extends Component
{
    use WithPagination;
    use WithFileUploads;
    use LivewireAlert;

    public $products = [], $product_id = null;

    public $pictures = null, $url_imageProduct = null, $pictureId = null;
    protected $listeners = ['confirmed', 'cancelled'];
    protected $section = 'Imagen';
    public $position = 1;
    public function render()
    {
        $this->products = Product::orderBy('name','asc')->where('status',1)->get();

        if($this->product_id != null ){
            $product = Product::find($this->product_id);
            $this->pictures = $product->pictures;
        }

        return view('livewire.admin.gallery');
    }

    public function storeProduct(){
        //  dd('hola');
        $product = Product::find($this->product_id);

        $path = 'images/placeholder.jpg';
        if ($this->url_imageProduct != '') {
            $this->validate(['url_imageProduct' => 'image'], ['url_imageProduct.image' => 'La portada debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->url_imageProduct->getClientOriginalExtension();
            $path = 'images/products/' . $this->url_imageProduct->storeAs('/', $name, 'products');
        }
        $imageUpload = new Picture([
            'urlImage' => $path
        ]);
        $product->pictures()->save($imageUpload);

        $this->alert('success','Imagen agregada');
    }


    public function delete($id)
    {
        $this->pictureId = $id;
        $this->confirm('¿Seguro que desea eliminar la '.$this->section.'?', [
            'toast' => false,
            'position' => 'center',
            'confirmButtonText' => 'Sí, Eliminar',
            'cancelButtonText' => 'No, Cancelar',
            'showConfirmButton' => true,
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled'
        ]);
    }

    public function confirmed()
    {
        $picture = Picture::find($this->pictureId);
        Storage::delete($picture->urlImage);
        $picture->delete();
        $this->alert('success', 'Imagen eliminada');
    }

    public function cancelled()
    {
        $this->pictureId = null;
        $this->alert('info', 'No se eliminó.');
    }

    public function resetInputFields(){
        $this->product_id = null;
        $this->url_imageProduct = null;

    }
    public function setPosition($position){
        $this->position = $position;
        $this->resetInputFields();
    }
}

