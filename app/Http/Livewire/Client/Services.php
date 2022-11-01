<?php

namespace App\Http\Livewire\Client;

use App\Models\Service;
use Livewire\Component;

class Services extends Component
{
    public $perPage = '10';
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];
    public function render()
    {
        $servicesList = Service::orderBy('name', 'asc')->paginate($this->perPage);
        return view('livewire.client.services', compact('servicesList'));
    }
}
