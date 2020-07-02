<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontPage extends Controller
{
    public function index()
    {
        return view('front_page.index');
    }
}
