<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController.php extends Controller
{
    public function getHome()
    {
        return view('home');
    }
}
