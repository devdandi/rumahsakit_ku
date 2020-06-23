<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\LoggingUser as LoggingUsers;

class LoggingUser extends Controller
{
    public function index()
    {
        $user = new User;
        $logging = new LoggingUsers;
        $log = $logging->paginate(10);
        $get_data = $user->where('email',session()->get('email'))->get();
        return view('log',['get_data' => $get_data,'log' => $log]);
    }
}
