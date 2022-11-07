<?php

namespace App\Http\Livewire\Admin;

use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Banners extends Component
{
    use WithPagination;
    use WithFileUploads;
    use LivewireAlert;

    protected $paginationTheme = 'bootstrap';
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];
    protected $listeners = ['confirmed', 'cancelled'];
    protected $section = 'Banner';

    public $perPage = '10';
    public $search = '';
    public $action = 'STORE';
    public $temporaryUrl = true;

    public $bannerId, $urlImage, $status = 1;

    public function render()
    {
        $data_banner = Banner::paginate($this->perPage);
        return view('livewire.admin.banners', compact('data_banner'));
    }

    public function store(){
        $this->validate([
            'urlImage' => 'image|required'
        ],[
            'urlImage.required' => 'Suba una imagen.',
            'urlImage.image' => 'La portada debe ser de formato: .jpg,.jpeg ó .png'
        ]);
        //save image
        $name = "file-" . time() . '.' . $this->urlImage->getClientOriginalExtension();
        $path = 'images/banners/' . $this->urlImage->storeAs('/', $name, ['disk' => 'banners']);

        $data = [
            'urlImage' => $path,
            'status' => $this->status
        ];

        $banner = Banner::create($data);
        $this->alert('success','Banner registrado con exito');
        $this->resetInputFields();
    }

    public function edit($id){
        $this->action = 'UPDATE';
        $this->temporaryUrl = false;

        $banner = Banner::find($id);
        $this->bannerId = $banner->id;
        $this->urlImage = $banner->urlImage;
        $this->status = $banner->status;
    }

    public function update(){
        $banner = Banner::find($this->bannerId);

        if ($this->urlImage != $banner->urlImage) {
            $this->validate(['urlImage' => 'image'], ['urlImage.image' => 'La portada debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->urlImage->getClientOriginalExtension();
            $path = 'images/banners/'  . $this->urlImage->storePubliclyAs('/', $name, 'banners');
        } else {
            $path = $banner->urlImage;
        }

        $data = [
            'urlImage' => $path,
            'status' => $this->status
        ];

        $banner->update($data);

        if ($banner) {
            $this->alert('success', 'Banner actualizado con exito.');
            $this->resetInputFields();
        } else {
            $this->alert('danger', 'Error al actualizar el registro.');
        }
    }

    public function delete($id)
    {
        $this->bannerId = $id;
        $this->confirm('¿Seguro que desea eliminar el '.$this->section.'?', [
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
        $banner = Banner::find($this->bannerId);
        if($banner->urlImage != 'images/placeholder.jpg'){
            Storage::delete($banner->urlImage);
        }
        $banner->delete();
        $this->alert('success', 'Banner eliminado con exito.');
    }

    public function cancelled()
    {
        $this->bannerId = null;
        $this->alert('info', 'No se eliminó.');
    }

    public function resetInputFields(){
        $this->action = 'STORE';
        $this->temporaryUrl = true;
        $this->urlImage = '';
        $this->status = 1;
    }
    public function tempUrl()
    {
        $this->urlImage = null;
        $this->temporaryUrl = true;
    }
}
