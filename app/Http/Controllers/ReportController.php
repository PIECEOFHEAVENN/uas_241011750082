<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::all();
        $pdf = Pdf::loadView('reports.ekstrakurikuler', compact('ekstrakurikuler'));
        return $pdf->download('laporan-ekstrakurikuler.pdf');
    }
}