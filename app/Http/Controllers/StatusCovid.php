<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;

class StatusCovid extends Controller
{
    public function index()
    {
        $user = new User;
        $get_data = $user->where('email',session()->get('email'))->get();
        return view('status-covid',['get_data' => $get_data,'status_covid' => $this->getApi()]);
    }
    public function getApi()
    {
        return file_get_contents("https://api.kawalcorona.com/indonesia");
    }
}
