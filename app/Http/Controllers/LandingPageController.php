<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index ()
    {
        return view('pages.Home');
    }
    
    public function artikel ()
    {
        $artikels = Artikel::all();
        return view('pages.artikel.index', compact('artikels'));
    }
    public function show_artikel($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('pages.artikel.artikel_detail', compact('artikel'));
    }


    public function hitungHPL ()
    {
        return view('pages.tools.hitungHPL');
    }

    public function about ()
    {
        return view('pages.About');
    }

    public function contact ()
    {
        return view('pages.Contact');
    }
}
