<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        $rekomendasi = Story::take(5)->get();
        $terbaru = Story::latest()->paginate(9);
        return view('welcome',compact('rekomendasi','terbaru'));
    }
    public function show(Story $story)
    {
        return view('show',compact('story'));
    }
}
