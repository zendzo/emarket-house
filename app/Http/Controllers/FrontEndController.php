<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perumahan;
use App\Rumah;

class FrontEndController extends Controller
{
    public function home()
    {
        $perumahans = Perumahan::orderBy('id', 'DESC')->paginate(9);

        return view('frontend.welcome', compact('perumahans'));
    }

    public function showPerumahan(Perumahan $perumahan)
    {
        return view('frontend.show_perumahan', compact('perumahan'));
    }

    public function showRumah(Rumah $rumah)
    {
        return view('frontend.show_rumah', compact('rumah'));
    }
}
