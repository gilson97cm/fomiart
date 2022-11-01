<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('admin.dashboard.index', compact('user'));
    }
    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

    public function productCategories(Request $request)
    {
        $user = Auth::user();
        return view('admin.products.categories', compact('user'));
    }

    public function products(Request $request)
    {
        $user = Auth::user();
        return view('admin.products.index', compact('user'));
    }

    public function services(Request $request)
    {
        $user = Auth::user();
        return view('admin.services.index', compact('user'));
    }

    public function banners(Request $request)
    {
        $user = Auth::user();
        return view('admin.banners.index', compact('user'));
    }

    public function aboutUs(Request $request)
    {
        $user = Auth::user();
        return view('admin.pages.about', compact('user'));
    }

    public function missionVision(Request $request)
    {
        $user = Auth::user();
        return view('admin.pages.mission-vision', compact('user'));
    }

    public function information(Request $request)
    {
        $user = Auth::user();
        return view('admin.pages.information', compact('user'));
    }

    public function gallery(Request $request)
    {
        $user = Auth::user();
        return view('admin.gallery.index', compact('user'));
    }
    public function comments(Request $request)
    {
        $user = Auth::user();
        return view('admin.comments.index', compact('user'));
    }

    public function messages(Request $request)
    {
        $user = Auth::user();
        return view('admin.messages.index', compact('user'));
    }
}
