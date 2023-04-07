<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        return view('index', [
            'title' => 'Home'
        ]);
    }

    public function about() {
        return view('about', [
            'title' => 'About',
            'active' => 'about',
            'nama' => 'Stenly Andika!']);
    }
}
