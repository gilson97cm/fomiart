<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    use WithFileUploads;
    use LivewireAlert;

    public $perPage = '10';
    public $search = '';
    public $action = 'STORE';
    public $temporaryUrl = true;
    public $productId = null, $name, $shortDescription, $longDescription, $discountRate, $price, $urlImage, $unit, $code, $status = 1;
    public $categories = [], $categoryId = null, $categoryFilter = null;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];

    protected $listeners = ['confirmed', 'cancelled'];
    protected $section = 'Producto';

    public function render()
    {
        if ($this->search != '') {
            $this->categoryFilter = null;
        }
        $this->categories = ProductCategory::where('status', 1)->get();

        $dataProduct = Product::orderBy('name', 'asc')
            ->where(function ($query) {
                $query->when($this->categoryFilter != null, function ($q) {
                    $q->where('categoryId', $this->categoryFilter);
                });
                $query->when($this->search != '', function ($q) {
                    $q->orWhere('name', 'LIKE', "%{$this->search}%");
                    $q->orWhere('code', 'LIKE', "%{$this->search}%");
                    $q->orWhere('shortDescription', 'LIKE', "%{$this->search}%");
                    $q->orWhere('longDescription', 'LIKE', "%{$this->search}%");
                    $q->orWhere('price', 'LIKE', "%{$this->search}%");
                });
            })
            ->paginate($this->perPage);
        return view('livewire.admin.products', compact('dataProduct'));
    }

    public function store()
    {
        dd(public_path(''));
        $this->validate([
            'categoryId' => 'required',
            'name' => 'required|unique:products,name',
            'shortDescription' => 'required',
            'longDescription' => 'required',
            'price' => ['required', 'regex:/^\d*(\.\d{2})?$/'],
            'discountRate' => ['numeric', 'regex:/^(0|[1-9][0-9]*)$/'],
            'code' => 'required|unique:products,code',
        ], [
            'categoryId.required' => 'Seleccione una categoría.',
            'name.required' => 'El campo Nombre es obligatorio.',
            'name.unique' => 'El Nombre de Producto ya existe.',
            'shortDescription.required' => 'El campo Descripción Corta es obligatorio.',
            'longDescription.required' => 'El campo Descripción Larga es obligatorio.',
            'price.required' => 'El campo Precio es obligatorio.',
            'price.regex' => 'El campo Precio tieene caracteres incorrectos.',
            'discountRate.numeric' => 'El campo Descuento tieene caracteres incorrectos.',
            'discountRate.regex' => 'El campo Descuento tieene caracteres incorrectos.',
            'code.required' => 'El campo Código es obligatorio.',
            'code.unique' => 'El Código de Producto ya existe.',
        ]);

        $path = 'images/placeholder.jpg';
        if ($this->urlImage != '') {
            $this->validate(['urlImage' => 'image'], ['urlImage.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->urlImage->getClientOriginalExtension();
            $path = 'images/products/' . $this->urlImage->storeAs('/', $name, 'products');
        }

        $data = [
            'categoryId' => $this->categoryId,
            'name' => $this->name,
            'shortDescription' => $this->shortDescription,
            'longDescription' => $this->longDescription,
            'discountRate' => $this->discountRate == "" ? 0 : $this->discountRate,
            'price' => number_format($this->price, 2),
            'urlImage' => $path,
            'unit' => $this->unit,
            'code' => $this->code,
            'status' => $this->status,
        ];

        $product = Product::create($data);
        $this->alert('success', 'Producto registrado con exito');
        $this->resetInputFields();
        $this->emit('store');

    }

    public function resetInputFields()
    {
        $this->action = 'STORE';
        $this->temporaryUrl = true;
        $this->productId = null;
        $this->categoryId = null;
        $this->name = '';
        $this->shortDescription = '';
        $this->longDescription = '';
        $this->discountRate = '';
        $this->price = '';
        $this->urlImage = null;
        $this->unit = '';
        $this->code = '';
        $this->status = 1;
    }

    public function edit($id)
    {
        $this->action = 'UPDATE';
        $this->temporaryUrl = false;

        $product = Product::find($id);
        $this->productId = $product->id;
        $this->categoryId = $product->categoryId;
        $this->name = $product->name;
        $this->shortDescription = $product->shortDescription;
        $this->longDescription = $product->longDescription;
        $this->discountRate = $product->discountRate;
        $this->price = $product->price;
        $this->urlImage = $product->urlImage;
        $this->unit = $product->unit;
        $this->code = $product->code;
        $this->status = $product->status;
    }

    public function update()
    {
        $this->validate([
            'categoryId' => 'required',
            'name' => ['required', Rule::unique('products')->ignore($this->productId)],
            'shortDescription' => 'required',
            'longDescription' => 'required',
            'price' => ['required', 'regex:/^\d*(\.\d{2})?$/'],
            'code' => ['required', Rule::unique('products')->ignore($this->productId)],
        ], [
            'categoryId.required' => 'Seleccione una categoría.',
            'name.required' => 'El campo Nombre es obligatorio.',
            'name.unique' => 'El Nombre de Producto ya existe.',
            'shortDescription.required' => 'El campo Descripción Corta es obligatorio.',
            'longDescription.required' => 'El campo Descripción Larga es obligatorio.',
            'price.required' => 'El campo Precio es obligatorio.',
            'price.regex' => 'El campo Precio tieene caracteres incorrectos.',
            'code.required' => 'El campo Código es obligatorio.',
            'code.unique' => 'El Código de Producto ya existe.',
        ]);

        $product = Product::find($this->productId);

        if ($this->urlImage != $product->urlImage) {
            $this->validate(['urlImage' => 'image'], ['urlImage.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->urlImage->getClientOriginalExtension();
            $path = 'images/products/' . $this->urlImage->storeAs('/', $name, 'products');
        } else {
            $path = $product->urlImage;
        }
        $data = [
            'categoryId' => $this->categoryId,
            'name' => $this->name,
            'shortDescription' => $this->shortDescription,
            'longDescription' => $this->longDescription,
            'discountRate' => $this->discountRate == "" ? 0 : $this->discountRate,
            'price' => number_format($this->price, 2),
            'urlImage' => $path,
            'unit' => $this->unit,
            'code' => $this->code,
            'status' => $this->status,
        ];

        $product->update($data);

        if ($product) {
            $this->alert('success', 'Producto actualizado con exito.');
            $this->resetInputFields();
        } else {
            $this->alert('danger', 'Error al actualizar el registro.');
        }
        $this->emit('store');

    }

    public function delete($id)
    {
        $this->productId = $id;
        $this->confirm('¿Seguro que desea eliminar el ' . $this->section . '?', [
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
        $product = Product::find($this->productId);

        if ($product->urlImage != 'images/placeholder.jpg') {
            Storage::delete($product->urlImage);
        }

        $product->delete();
        $this->alert('success', 'Producto eliminado con exito.');

    }

    public function cancelled()
    {
        $this->productId = null;
        $this->alert('info', 'No se eliminó.');
    }

    public function tempUrl()
    {
        $this->urlImage = null;
        $this->temporaryUrl = true;
    }

    public function clear()
    {
        $this->categoryFilter = null;
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }
}
