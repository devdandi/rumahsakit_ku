<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Dokter;


class Profile extends Controller
{
    public function index()
    {
        $user = new User;
        $get_data = $user->where('email',session()->get('email'))->get();
        return view('profile',['get_data' => $get_data]);
    }
}
