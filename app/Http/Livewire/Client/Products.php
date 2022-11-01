<?php

namespace App\Http\Livewire\Client;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;

class Products extends Component
{
    public $category_id = '';
    public $perPage = '10';
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];

    public function render()
    {
        $productsList = Product::orderBy('name', 'asc')
            ->where(function ($query) {
                $query->when($this->category_id != '', function ($q) {
                    $q->where('categoryId', $this->category_id);
                });
            })->paginate($this->perPage);
        $categoriesList = ProductCategory::where('status', 1)->get();
        return view('livewire.client.products', compact('productsList', 'categoriesList'));
    }

    public function setCategoryId($id){
        $this->category_id = $id;
    }
}
