<?php

namespace App\Http\Livewire\Admin;

use App\Models\Page;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class MissionVision extends Component
{
    use LivewireAlert;
    public $pages;
    public $mission, $vision;

    public function mount(){
        $this->pages = Page::find(1);
        $this->mission = $this->pages->mission;
        $this->vision = $this->pages->vision;
    }

    public function render()
    {
        return view('livewire.admin.mission-vision');
    }

    public function update(){
//      dd(  $this->description);
        $data = [
            'mission' => $this->mission,
            'vision' => $this->vision,
        ];

        $this->pages->update($data);

        $this->alert('success','Página Misión y Visión actualizada con exito.');
    }

    public function cancel(){
        $this->mission = $this->pages->mission;
        $this->vision = $this->pages->vision;
        $this->emit('loadData');
    }
}
