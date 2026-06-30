<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_kegiatan' => Ekstrakurikuler::count(),
        ];

        return view('dashboard', $data);
    }
}