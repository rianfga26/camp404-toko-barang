<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Show index or landing page for guest
     * 
     * @return void
     */
    public function index(){
        $products = ProductModel::orderBy('id', 'DESC')->limit(4)->get();
        return view('index', compact('products'));
    }

}
