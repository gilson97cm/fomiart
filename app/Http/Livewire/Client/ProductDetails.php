<?php

namespace App\Http\Livewire\Client;

use App\Models\Comment;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Array_;

class ProductDetails extends Component
{
    use LivewireAlert;

    public $productId = null;

    public $nameComment, $lastnameComment, $emailComment, $rating = 0, $messageComment, $status = 1;
    public $arrayColor = ['#84b6f4', '#f9a59a', '#fa5f49', '#bc98f3', '#f47e8e', '#ff9c9c', '#f45572', '#6a9eda', '#84b6f4', '#c0a0c3'];
    public $profile = '', $bgProfile = '';

    public function mount($id)
    {
        $this->productId = $id;
    }

    public function render()
    {
        $product = Product::find($this->productId);
        return view('livewire.client.product-details', compact(['product']));
    }

    public function comment()
    {
        $this->validate([
            'nameComment' => 'required',
            'lastnameComment' => 'required',
            'emailComment' => 'required',
            'messageComment' => 'required',
        ], [
            'lastnameComment.required' => 'El campo es obligatorio.',
            'nameComment.required' => 'El campo es obligatorio.',
            'emailComment.required' => 'El campo es obligatorio.',
            'messageComment.required' => 'El campo es obligatorio.',
        ]);
        $this->profile = substr(strtoupper($this->nameComment), 0, 1) . substr(strtoupper($this->lastnameComment), 0, 1);

        $this->bgProfile = $this->arrayColor[array_rand($this->arrayColor, 1)];

        $product = Product::find($this->productId);
        $comment = new Comment([
            'name' => $this->nameComment,
            'lastname' => $this->lastnameComment,
            'profile' => $this->profile,
            'bgProfile' => $this->bgProfile,
            'email' => $this->emailComment,
            'rating' => $this->rating > 0 ? $this->rating : 0,
            'message' => $this->messageComment,
            'status' => $this->status
        ]);
        $product->comments()->save($comment);

        $this->alert('success', 'Comentario publicado con exito.', [
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
        $this->nameComment = '';
        $this->lastnameComment = '';
        $this->emailComment = '';
        $this->rating = 0;
        $this->messageComment = '';
        $this->profile = '';
        $this->bgProfile = '';
    }
}
