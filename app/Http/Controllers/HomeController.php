<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the index page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Render the index view
        return view("index");
    }
}
