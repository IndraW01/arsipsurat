<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'unitCount' => Unit::count(),
            'suratMasukCount' => SuratMasuk::count(),
            'suratKeluarCount' => SuratKeluar::count(),
            'suratMasuks' => SuratMasuk::suratMasukToday(),
            'suratKeluars' => SuratKeluar::suratKeluarToday()
        ]);
    }
}
