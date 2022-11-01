<?php

namespace App\Http\Livewire\Admin;

use App\Models\Information as Info;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Information extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $information;
    public $email, $phone, $cellphone, $address, $fb,$wtp, $ig, $tw, $urlLogo;
    public $temporaryUrl = false;

    public function mount()
    {
        $this->information = Info::find(1);
        $this->defaultData();
    }

    public function render()
    {
        return view('livewire.admin.information');
    }


    public function update(){
        $path = 'images/placeholder.jpg';

        if ($this->urlLogo != 'images/placeholder.jpg' && $this->temporaryUrl) {
            $name = "file-" . time() . '.' . $this->urlLogo->getClientOriginalExtension();
            $path = 'images/pages/' . $this->urlLogo->storeAs('/', $name, 'pages');
        }
        $data = [
            'email' => $this->email,
            'phone' => $this->phone,
            'cellphone' => $this->cellphone,
            'address' => $this->address,
            'fb' => $this->fb,
            'wtp' => $this->wtp,
            'ig' => $this->ig,
            'tw' => $this->tw,
            'urlLogo' => $path
        ];

        $this->information->update($data);

        $this->alert('success','Información General actualizada con exito.');
    }

    public function defaultData(){
        $this->email = $this->information->email;
        $this->phone = $this->information->phone;
        $this->cellphone = $this->information->cellphone;
        $this->address = $this->information->address;
        $this->fb = $this->information->fb;
        $this->wtp = $this->information->wtp;
        $this->ig = $this->information->ig;
        $this->tw = $this->information->tw;
        $this->urlLogo = $this->information->urlLogo;
    }

    public function tempUrl()
    {
        $this->urlLogo = null;
        $this->temporaryUrl = true;
    }
}
