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
        $data['products'] = Product::where('product_status',"Approved")->where('product_availability',"InStock")->paginate(10);
        return view('frontend.components.dashboard',$data);
    }
}
