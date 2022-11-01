<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    public function index()
    {
        $info = Information::find(1);
        $pagesData = Page::find(1);
        return view('client.home.index', compact('info','pagesData'));
    }

    public function products()
    {
        $info = Information::find(1);
        $pagesData = Page::find(1);
        return view('client.products.index', compact('info','pagesData'));
    }
    public function productDetails($id)
    {
        $info = Information::find(1);
        $pagesData = Page::find(1);
        return view('client.products.details',compact('id','info','pagesData'));
    }
    public function services()
    {
        $info = Information::find(1);
        $pagesData = Page::find(1);
        return view('client.services.index', compact('info','pagesData'));
    }
    public function serviceDetails($id)
    {
        $info = Information::find(1);
        $pagesData = Page::find(1);
        return view('client.services.details',compact('id','info','pagesData'));
    }
    public function aboutUs()
    {
        $info = Information::find(1);
        $pagesData = Page::find(1);
        return view('client.pages.about-us',compact('info','pagesData'));
    }

    public function gallery()
    {
        $info = Information::find(1);
        $pagesData = Page::find(1);
        return view('client.gallery.index',compact('info','pagesData'));
    }

    public function contact()
    {
        $info = Information::find(1);
        $pagesData = Page::find(1);
        return view('client.pages.contact',compact('info','pagesData'));
    }
    public function clear(){
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');

        return "Cleared!";
    }
}
