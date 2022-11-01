<?php

namespace App\Http\Livewire\Client;

use App\Models\Information;
use App\Models\Message;
use App\Models\Page;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Contact extends Component
{
    use LivewireAlert;
    public $name,$lastname, $codeProduct, $phone, $email, $message, $read = 1, $status = 1;
    public $products = [], $products_selected = null;
    public function render()
    {
        $info = Information::find(1);
        $pagesData = Page::find(1);
        $this->products = Product::where('status',1)->get(["code","name","id"]);

        return view('livewire.client.contact', compact('info','pagesData'));
    }

    public function sendMessage()
    {
        $codes = implode(", ", $this->products_selected);
        $this->codeProduct = $codes;
        $this->validate([
            'name' => 'required',
            'lastname' => 'required',
            'codeProduct' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required',
        ], [
            'name.required' => 'El campo es obligatorio.',
            'lastname.required' => 'El campo es obligatorio.',
            'codeProduct.required' => 'El campo es obligatorio.',
            'email.required' => 'El campo es obligatorio.',
            'message.required' => 'El campo es obligatorio.',
            'phone.required' => 'El campo es obligatorio.',
            'phone.numeric' => 'El campo es incorrecto.',
            'email.email' => 'El campo es incorrecto.',
        ]);

        
   
        $data = [
            'name' => $this->name,
            'lastname' => $this->lastname,
            'codeProduct' => $this->codeProduct,
            'phone' => $this->phone,
            'email' => $this->email,
            'message' => $this->message,
            'read' => $this->read,
            'status' => $this->status
        ];
        $message = Message::create($data);

        $this->alert('success', 'Mensaje enviado con exito.', [
            'position' => 'center',
            'timer' => '2000',
            'toast' => true,
            'text' => '',
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => 'Cancel',
            'showCancelButton' => false,
            'showConfirmButton' => true,
        ]);
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->lastname = '';
        $this->codeProduct = '';
        $this->phone = '';
        $this->email = '';
        $this->message = '';
        $this->emit('resetProducts');
    }
}
