<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SaleCategory;
use App\Models\SubCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function ProductList()
    {
        if (auth()->user()->role == "Admin") {
            $data['allData'] = Product::all();
        } else {
            $data['allData'] = Product::where('user_id', auth()->user()->id)->get();
        }
        return view('backend.pages.product.list', $data);
    }

    public function ProductCreate()
    {
        $data['category'] = Category::all();
        $data['sub_category'] = SubCategory::all();
        $data['sale_category'] = SaleCategory::all();
        $data['brand'] = Brand::all();
        return view('backend.pages.product.add', $data);
    }

    public function ProductStore(Request $request)
    {
        try {
            $request->validate([
                'category_id' => 'required',
                'sale_category_id' => 'required',
                'sub_category_id' => 'required',
                'brand_id' => 'required',
                'product_name' => 'required',
                'short_description' => 'required|max:30',
                'long_description' => 'required|min:250|max:2500',
                'product_slug' => 'required',
                'product_quantity' => 'required',
                'product_price' => 'required',
                'discount_price' => 'required',
                'product_selling_price' => 'required',
                'product_thumbnail' => 'required|image',
                'product_availability' => 'required',
                'product_weight' => 'required',
                'product_image_1' => 'image|nullable',
                'product_image_2' => 'image|nullable',
                'product_image_3' => 'image|nullable',
                'product_image_4' => 'image|nullable',
                'product_image_5' => 'image|nullable',
            ]);

            // Handling product_thumbnail upload
            @$thumbnail = $request->file('product_thumbnail');
            @$thumbnailName = time() . '_thumbnail.' . $thumbnail->getClientOriginalName();
            @$thumbnail->move('uploads/product/', $thumbnailName);

            // Handling other product images
            @$imageFields = ['product_image_1', 'product_image_2', 'product_image_3', 'product_image_4', 'product_image_5'];
            @$imageNames = [];

            $random = rand(10000, 99999);
            $unique = auth()->user()->id . $random;
            $product_code ="soft-".$unique;

            foreach ($imageFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $filename = time() . '_' . $field . '.' . $file->getClientOriginalName();
                    $file->move('uploads/product/', $filename);
                    $imageNames[$field] = $filename;
                } else {
                    $imageNames[$field] = null;
                }
            }

            Product::create([
                'category_id' => $request->category_id,
                'sale_category_id' => $request->sale_category_id,
                'sub_category_id' => $request->sub_category_id,
                'brand_id' => $request->brand_id,
                'user_id' => auth()->user()->id,
                'product_name' => $request->product_name,
                'product_slug' => $request->product_slug,
                'product_code' => $product_code,
                'product_price' => $request->product_price,
                'product_weight' => $request->product_weight,
                'product_quantity' => $request->product_quantity,
                'product_selling_price' => $request->product_selling_price,
                'product_discount' => $request->discount_price,
                'product_availability' => $request->product_availability,
                'product_status' => $request->product_status,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'product_thumbnail' => $thumbnailName,
                'product_image_1' => $imageNames['product_image_1'],
                'product_image_2' => $imageNames['product_image_2'],
                'product_image_3' => $imageNames['product_image_3'],
                'product_image_4' => $imageNames['product_image_4'],
                'product_image_5' => $imageNames['product_image_5'],
            ]);

            toast()->success('Product Added Successfully');
            return redirect()->route('product.list');
        } catch (Exception $e) {
            toast()->error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function ProductEdit($id)
    {
        $data['editData'] = Product::find($id);
        $data['category'] = Category::all();
        $data['sub_category'] = SubCategory::all();
        $data['sale_category'] = SaleCategory::all();
        $data['brand'] = Brand::all();
        return view('backend.pages.product.add', $data);
    }

    public function ProductUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'category_id' => 'required',
                'sale_category_id' => 'required',
                'sub_category_id' => 'required',
                'brand_id' => 'required',
                'product_name' => 'required',
                'short_description' => 'required|max:30',
                'long_description' => 'required|min:250|max:2500',
                'product_slug' => 'required',
                'product_quantity' => 'required',
                'product_price' => 'required',
                'discount_price' => 'required',
                'product_selling_price' => 'required',
                'product_availability' => 'required',
                'product_weight' => 'required',
                'product_image_1' => 'image|nullable',
                'product_image_2' => 'image|nullable',
                'product_image_3' => 'image|nullable',
                'product_image_4' => 'image|nullable',
                'product_image_5' => 'image|nullable',
            ]);

            // Handling product_thumbnail upload
            if ($request->hasFile('product_thumbnail')) {
                $thumbnail = $request->file('product_thumbnail');
                @unlink('uploads/product/' . $request->product_thumbnail);
                @unlink('uploads/product/' . $request->product_image_1);
                @unlink('uploads/product/' . $request->product_image_2);
                @unlink('uploads/product/' . $request->product_image_3);
                @unlink('uploads/product/' . $request->product_image_4);
                @unlink('uploads/product/' . $request->product_image_5);
                @$thumbnailName = time() . '_thumbnail.' . $thumbnail->getClientOriginalName();
                @$thumbnail->move('uploads/product/', $thumbnailName);

                // Handling other product images
                @$imageFields = ['product_image_1', 'product_image_2', 'product_image_3', 'product_image_4', 'product_image_5'];
                @$imageNames = [];

                $random = rand(10000, 99999);
                $unique = auth()->user()->id . $random;
                $product_code = "soft-" . $unique;

                foreach ($imageFields as $field) {
                    if ($request->hasFile($field)) {
                        $file = $request->file($field);
                        $filename = time() . '_' . $field . '.' . $file->getClientOriginalName();
                        $file->move('uploads/product/', $filename);
                        $imageNames[$field] = $filename;
                    } else {
                        $imageNames[$field] = null;
                    }
                }

                Product::where('id', $id)->update([
                    'category_id' => $request->category_id,
                    'sale_category_id' => $request->sale_category_id,
                    'sub_category_id' => $request->sub_category_id,
                    'brand_id' => $request->brand_id,
                    'user_id' => auth()->user()->id,
                    'product_name' => $request->product_name,
                    'product_slug' => $request->product_slug,
                    'product_code' => $product_code,
                    'product_price' => $request->product_price,
                    'product_quantity' => $request->product_quantity,
                    'product_selling_price' => $request->product_selling_price,
                    'product_discount' => $request->discount_price,
                    'product_weight' => $request->product_weight,
                    'product_status' => $request->product_status,
                    'product_availability' => $request->product_availability,
                    'short_description' => $request->short_description,
                    'long_description' => $request->long_description,
                    'product_thumbnail' => $thumbnailName,
                    'product_image_1' => $imageNames['product_image_1'],
                    'product_image_2' => $imageNames['product_image_2'],
                    'product_image_3' => $imageNames['product_image_3'],
                    'product_image_4' => $imageNames['product_image_4'],
                    'product_image_5' => $imageNames['product_image_5'],
                ]);
            }else{
                Product::where('id', $id)->update([
                    'category_id' => $request->category_id,
                    'sale_category_id' => $request->sale_category_id,
                    'sub_category_id' => $request->sub_category_id,
                    'brand_id' => $request->brand_id,
                    'user_id' => auth()->user()->id,
                    'product_name' => $request->product_name,
                    'product_slug' => $request->product_slug,
                    'product_price' => $request->product_price,
                    'product_quantity' => $request->product_quantity,
                    'product_selling_price' => $request->product_selling_price,
                    'product_discount' => $request->discount_price,
                    'product_weight' => $request->product_weight,
                    'product_status' => $request->product_status,
                    'product_availability' => $request->product_availability,
                    'short_description' => $request->short_description,
                    'long_description' => $request->long_description,
                ]);
            }

            toast()->success('Product Added Successfully');
            return redirect()->route('product.list');
        } catch (Exception $e) {
            toast()->error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function ProductDelete($id)
    {
        $product = Product::find($id);
        @unlink(public_path('uploads/product/'.$product->product_thumbnail));
        @unlink(public_path('uploads/product/'.$product->product_image_1));
        @unlink(public_path('uploads/product/'.$product->product_image_2));
        @unlink(public_path('uploads/product/'.$product->product_image_3));
        @unlink(public_path('uploads/product/'.$product->product_image_4));
        @unlink(public_path('uploads/product/'.$product->product_image_5));
        $product->delete();
        toast()->success('Product Deleted Successfully');
        return redirect()->route('product.list');
    }

    public function loadMoreProducts(Request $request)
    {
        $products = Product::with('category', 'user')->paginate(10);

        $html = '';
        foreach ($products as $item) {
            $html .= view('partials.product', compact('item'))->render();
        }

        return response()->json(['html' => $html]);
    }


}
