<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;
use App\Models\Penyakit;
use App\Models\Tumbuhan;

class LandingController extends Controller
{
    public function index()
    {
        $penyakits = Penyakit::all();
        return view('landing.pages.index', compact('penyakits'));
    }

    public function listTumbuhan($slug)
    {

        $penyakit = Penyakit::where('slug', $slug)->first();
        $penyakits = Penyakit::all();
        $plants = Tumbuhan::where('penyakit_id', $penyakit->id)->paginate(12);



        return view('landing.pages.tumbuhan.index', compact('plants', 'penyakits', 'penyakit'));
    }

    public function detailTumbuhan($slug)
    {
        $penyakits = Penyakit::all();
        $plant = Tumbuhan::where('slug', $slug)->first();

        $sickness = Tumbuhan::where('nama', $plant->nama)->get();

        return view('landing.pages.tumbuhan.detail', compact('penyakits', 'plant', 'sickness'));
    }

    public function listPenyakit()
    {
        $penyakits = Penyakit::all();
        $sickness = Penyakit::paginate(12);
        return view('landing.pages.penyakit.index', compact('penyakits', 'sickness'));
    }

    public function detailPenyakit($slug)
    {
        $penyakits = Penyakit::all();
        $penyakit = Penyakit::where('slug', $slug)->first();
        return view('landing.pages.penyakit.detail', compact('penyakits', 'penyakit'));
    }

    public function perhitungan()
    {
        $penyakits = Penyakit::all();
        $criterion = Criteria::all();
        return view('landing.pages.perhitungan.index', compact('penyakits', 'criterion'));
    }
}
