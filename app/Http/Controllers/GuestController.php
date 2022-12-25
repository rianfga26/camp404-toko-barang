<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Show index or landing page for guest
     * 
     * @return void
     */
    public function index(){
        return view('index');
    }

    /**
     * Show the about page 
     * 
     * @return void
     */
    public function about(){
        return view('about');
    }
}
