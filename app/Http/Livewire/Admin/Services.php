<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Services extends Component
{
    use WithPagination;
    use WithFileUploads;
    use LivewireAlert;

    public $perPage = '10';
    public $search = '';
    public $action = 'STORE';
    public $temporaryUrl = true;
    public $serviceId = null, $name, $shortDescription, $longDescription, $urlImage, $status = 1;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];
    protected $listeners = ['confirmed', 'cancelled'];
    protected $section = 'Servicio';

    public  $PATH_ROOT = 'storage/images/services/';

    public function render()
    {

        $dataService = Service::orderBy('name', 'asc')
            ->where(function ($query) {
                $query->when($this->search != '', function ($q) {
                    $q->orWhere('name', 'LIKE', "%{$this->search}%");
                    $q->orWhere('shortDescription', 'LIKE', "%{$this->search}%");
                    $q->orWhere('longDescription', 'LIKE', "%{$this->search}%");
                });
            })
            ->paginate($this->perPage);
        return view('livewire.admin.services', compact('dataService'));
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|unique:services,name',
            'shortDescription' => 'required',
            'longDescription' => 'required',
        ], [
            'name.required' => 'El campo Nombre es obligatorio.',
            'name.unique' => 'El Nombre de Servicio ya existe.',
            'shortDescription.required' => 'El campo Descripción Corta es obligatorio.',
            'longDescription.required' => 'El campo Descripción Larga es obligatorio.',
        ]);

        $path = 'images/placeholder.jpg';
        if ($this->urlImage != '') {
            $this->validate(['urlImage' => 'image'], ['urlImage.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->urlImage->getClientOriginalExtension();
            $path = $this->PATH_ROOT .  $this->urlImage->storeAs('/', $name, 'services');
        }

        $data = [
            'name' => $this->name,
            'shortDescription' => $this->shortDescription,
            'longDescription' => $this->longDescription,
            'urlImage' => $path,
            'status' => $this->status,
        ];

        $service = Service::create($data);
        $this->alert('success', 'Servicio registrado con exito');
        $this->resetInputFields();
        $this->emit('store');
    }

    public function resetInputFields()
    {
        $this->action = 'STORE';
        $this->temporaryUrl = true;
        $this->serviceId = null;
        $this->name = '';
        $this->shortDescription = '';
        $this->longDescription = '';
        $this->urlImage = null;
        $this->status = 1;
    }

    public function edit($id)
    {
        $this->action = 'UPDATE';
        $this->temporaryUrl = false;

        $service = Service::find($id);
        $this->serviceId = $service->id;
        $this->name = $service->name;
        $this->shortDescription = $service->shortDescription;
        $this->longDescription = $service->longDescription;
        $this->urlImage = $service->urlImage;
        $this->status = $service->status;
    }

    public function update()
    {
        $this->validate([
            'name' => ['required', Rule::unique('services')->ignore($this->serviceId)],
            'shortDescription' => 'required',
            'longDescription' => 'required',
        ], [
            'name.required' => 'El campo Nombre es obligatorio.',
            'name.unique' => 'El Nombre de Servicio ya existe.',
            'shortDescription.required' => 'El campo Descripción Corta es obligatorio.',
            'longDescription.required' => 'El campo Descripción Larga es obligatorio.',
        ]);

        $service = Service::find($this->serviceId);

        if ($this->urlImage != $service->urlImage) {
            $this->validate(['urlImage' => 'image'], ['urlImage.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->urlImage->getClientOriginalExtension();
            $path = $this->PATH_ROOT .  $this->urlImage->storeAs('/', $name, 'services');
        } else {
            $path = $service->urlImage;
        }
        $data = [
            'name' => $this->name,
            'shortDescription' => $this->shortDescription,
            'longDescription' => $this->longDescription,
            'urlImage' => $path,
            'status' => $this->status,
        ];

        $service->update($data);

        if ($service) {
            $this->alert('success', 'Servicio actualizado con exito.');
            $this->resetInputFields();
        } else {
            $this->alert('danger', 'Error al actualizar el registro.');
        }
        $this->emit('store');
    }


    public function delete($id)
    {
        $this->serviceId = $id;
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
        $service = Service::find($this->serviceId);
        if ($service->urlImage != 'images/placeholder.jpg') {
            Storage::delete($service->urlImage);
        }
        $service->delete();
        $this->alert('success', 'Servicio eliminado con exito.');
    }

    public function cancelled()
    {
        $this->serviceId = null;
        $this->alert('info', 'No se eliminó.');
    }

    public function tempUrl()
    {
        $this->urlImage = null;
        $this->temporaryUrl = true;
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }
}
