<?php

namespace App\Http\Livewire\Client;

use App\Models\Service;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ServiceDetails extends Component
{
    use LivewireAlert;

    public $serviceId = null;
    public function mount($id)
    {
        $this->serviceId = $id;
    }

    public function render()
    {
        $service = Service::find($this->serviceId);
        return view('livewire.client.service-details', compact('service'));
    }
}
