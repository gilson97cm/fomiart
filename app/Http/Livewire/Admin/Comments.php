<?php

namespace App\Http\Livewire\Admin;

use App\Models\Comment;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;
    use WithFileUploads;
    use LivewireAlert;

    public $perPage = '10';
    public $search = '';
    public $action = 'STORE';
    public $temporaryUrl = true;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];

    public $productFilter = null;
    public $commentId = null;
    public function render()
    {
        if ($this->search != '') {
            $this->productFilter = null;
        }
        $productList = Product::orderBy('name', 'asc')->get();

        $commentList = Comment::orderBy('created_at','desc')->where(function ($query) {
            $query->when($this->productFilter != null, function ($q) {
                $q->where('commentable_id', $this->productFilter);
            });
            $query->when($this->search != '', function ($q) {
                $q->orWhere('name', 'LIKE', "%{$this->search}%");
                $q->orWhere('email', 'LIKE', "%{$this->search}%");
                $q->orWhere('message', 'LIKE', "%{$this->search}%");
            });
        })->paginate($this->perPage);

        $comment = Comment::find($this->commentId);

        return view('livewire.admin.comments', compact('commentList', 'productList', 'comment'));
    }

    public function show($id)
    {
        $this->commentId = $id;
    }

    public function activate($id){
        $comment = Comment::find($id);
        $data = ['status' => 1];
        $comment->update($data);
        $this->alert('success', 'Commentario Visible.');
        $this->emit('store');
        $this->commentId = null;
    }

    public function deactivate($id){
        $comment = Comment::find($id);
        $data = ['status' => 0];
        $comment->update($data);
        $this->alert('success', 'Commentario Oculto.');
        $this->emit('store');
        $this->commentId = null;
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
        $this->productFilter = null;
    }
}
