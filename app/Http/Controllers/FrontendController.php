<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $data['category'] = Category::get();
        $data['brand'] = Brand::get();
        $data['product'] = Product::all();
        return view('frontend.components.dashboard',$data);
    }
}
