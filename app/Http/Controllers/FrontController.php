<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Muestra la vista del front-end.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front');
    }
}
