<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;

class HomeController extends Controller
{
    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::latest()->get();
        return view('home', compact('ekstrakurikuler'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function publicIndex()
    {
        $ekstrakurikuler = Ekstrakurikuler::latest()->paginate(12);
        return view('public.ekstrakurikuler', compact('ekstrakurikuler'));
    }
}