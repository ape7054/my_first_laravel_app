<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function hello()
    {
        return 'Hello from WelcomeController!';
    }

    public function showGreetingPage()
    {
        return view('greeting');
    }
}
