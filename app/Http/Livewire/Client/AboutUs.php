<?php

namespace App\Http\Livewire\Client;

use App\Models\Page;
use Livewire\Component;

class AboutUs extends Component
{
    public function render()
    {
        $pagesData = Page::find(1);
        return view('livewire.client.about-us', compact('pagesData'));
    }
}
