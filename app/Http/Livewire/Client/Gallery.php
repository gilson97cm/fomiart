<?php

namespace App\Http\Livewire\Client;

use App\Models\Picture;
use App\Models\Product;
use Livewire\Component;

class Gallery extends Component
{
    public $productId = '';
    public $perPage = '18';
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];
//    public $picturesList = [];
    public function render()
    {
        $productList = Product::where('status', 1)->get();

        $picturesList = Picture::get();
        return view('livewire.client.gallery', compact('productList','picturesList'));
    }

    public function setProductId($id){
        $this->productId = $id;
    }
}
