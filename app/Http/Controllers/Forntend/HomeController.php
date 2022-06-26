<?php

namespace App\Http\Controllers\Forntend;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = product::all();
        return view ('forntend.home',compact('products'));
    }
}
