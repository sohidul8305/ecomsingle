<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(){
        $allproducts = product::latest()->get();
        return view('user_template.layouts.home', compact('allproducts'));
    }
}
