<?php

namespace App\Http\Livewire\Client;

use App\Models\Banner;
use App\Models\Comment;
use App\Models\Page;
use App\Models\Picture;
use App\Models\Product;
use App\Models\Service;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $bannersList = Banner::where('status',1)->get();
        $productsList = Product::where('status',1)->inRandomOrder()->limit(4)->get();
        $picturesList = Picture::inRandomOrder()->limit(4)->get();
        $servicesList = Service::where('status',1)->inRandomOrder()->limit(3)->get();
        $pagesData = Page::find(1);
        $commentList = Comment::where('status',1)->inRandomOrder()->limit(3)->get();
        return view('livewire.client.home', compact('bannersList','productsList','picturesList', 'pagesData','servicesList','commentList'));
    }
}
