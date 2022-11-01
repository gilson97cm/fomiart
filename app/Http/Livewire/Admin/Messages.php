<?php

namespace App\Http\Livewire\Admin;

use App\Models\Message;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Messages extends Component
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
    protected $listeners = ['confirmed', 'cancelled'];
    protected $section = 'Mensaje';

    public $messageId = null;
    public function render()
    {
        $messagesList = Message::orderBy('created_at', 'desc')->where(function ($query) {
            $query->when($this->search != '', function ($q) {
                $q->orWhere('name', 'LIKE', "%{$this->search}%");
                $q->orWhere('email', 'LIKE', "%{$this->search}%");
                $q->orWhere('message', 'LIKE', "%{$this->search}%");
            });
        })->paginate($this->perPage);
        $message = Message::find($this->messageId);
        return view('livewire.admin.messages', compact('messagesList', 'message'));
    }

    public function read($id)
    {
        $this->messageId = $id;
        $message = Message::find($id);
        $data = ['read' => 0];
        $message->update($data);
    }

    public function delete($id)
    {
        $this->messageId = $id;
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
        $msg = Message::find($this->messageId);
        $msg->delete();
        $this->alert('success', 'Mensaje eliminado con exito.');
        $this->emit('store');
        $this->messageId = null;
    }

    public function cancelled()
    {
        $this->messageId = null;
        $this->alert('info', 'No se eliminó.');
    }
    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }
}
