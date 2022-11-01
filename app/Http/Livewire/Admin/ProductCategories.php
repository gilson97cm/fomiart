<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ProductCategories extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $perPage = '10';
    public $search = '';
    public $action = 'store';
    public $categoryId = null, $name = '', $shortDescription = '', $status = 1;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];
    protected $listeners = ['confirmed', 'cancelled'];
    protected $section = 'Categoría';

    public function render()
    {
        $dataCategory = ProductCategory::orWhere('name', 'LIKE', "%{$this->search}%")
            ->orderBy('name', 'asc')
            ->paginate($this->perPage);
        return view('livewire.admin.product-categories', compact('dataCategory'));
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|unique:product_categories,name',
        ], [
            'name.required' => 'Campo obligatorio.',
            'name.unique' => 'El Nombre de Categoría ya existe.',
        ]);

        $data = [
            'name' => $this->name,
            'shortDescription' => $this->shortDescription,
            'status' => $this->status
        ];

        $category = ProductCategory::create($data);

        if ($category) {
            $this->alert('success', 'Categoría agregado con exito.');
            $this->resetInputFields();
        } else {
            $this->alert('danger', 'Error al agregar el registro.');
        }

    }

    public function resetInputFields()
    {
        $this->action = 'store';
        $this->categoryId = null;
        $this->name = '';
        $this->shortDescription = '';
        $this->status = 1;
    }

    public function edit($id)
    {
        $this->action = 'update';

        $category = ProductCategory::find($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->shortDescription = $category->shortDescription;
        $this->status = $category->status;

    }

    public function update()
    {
        $this->validate([
            'name' => ['required', Rule::unique('product_categories')->ignore($this->categoryId)],
        ], [
            'name.required' => 'Campo obligatorio.',
            'name.unique' => 'El Nombre ya existe.',
        ]);

        $data = [
            'name' => $this->name,
            'shortDescription' => $this->shortDescription,
            'status' => $this->status
        ];

        $category = ProductCategory::find($this->categoryId);
        $category->update($data);

        if ($category) {
            $this->alert('success', 'Categoría actualizada con exito.');
            $this->resetInputFields();
        } else {
            $this->alert('danger', 'Error al actualizar el registro.');
        }
    }

    public function delete($id)
    {
        $this->categoryId = $id;
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
        $category = ProductCategory::find($this->categoryId);

        if (count($category->products) > 0) {
            $this->alert('error', 'No se puede eliminar la Categoría.', [
                'position' => 'center',
                'timer' => '5000',
                'toast' => true,
                'text' => '',
                'confirmButtonText' => 'Ok',
                'cancelButtonText' => 'Cancel',
                'showCancelButton' => false,
                'showConfirmButton' => true]);
        } else {
            $category->delete();
            $this->alert('success', $this->section.' eliminada con exito.');
        }

    }

    public function cancelled()
    {
        $this->categoryId = null;
        $this->alert('info', 'No se eliminó.');
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }
}
