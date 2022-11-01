<?php

namespace App\Http\Livewire\Admin;

use App\Models\Page;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class About extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $temporaryUrl = false;

    public $pages;
    public $description, $urlImage, $abstract;
    public function mount(){
        $this->pages = Page::find(1);
        $this->description = $this->pages->aboutUs;
        $this->urlImage = $this->pages->urlImage;
        $this->abstract = $this->pages->abstract;
    }
    public function render()
    {
        return view('livewire.admin.about');
    }

    public function update(){
//      dd(  $this->description);
        $path = 'images/placeholder.jpg';
        if ($this->urlImage != 'images/placeholder.jpg' && $this->temporaryUrl) {
            $name = "file-" . time() . '.' . $this->urlImage->getClientOriginalExtension();
            $path = 'images/pages/' . $this->urlImage->storeAs('/', $name, 'pages');
        }
        $data = [
            'aboutUs' => $this->description,
            'urlImage' => $path,
            'abstract' => $this->abstract,
        ];

        $this->pages->update($data);

        $this->alert('success','Página Acerca de Nosotros actualizada con exito.');
    }

    public function cancel(){
        $this->description = $this->pages->aboutUs;
        $this->urlImage = $this->pages->urlImage;
        $this->abstract = $this->pages->abstract;
        $this->emit('loadData');
    }

    public function tempUrl()
    {
        $this->urlImage = null;
        $this->temporaryUrl = true;
    }
}
