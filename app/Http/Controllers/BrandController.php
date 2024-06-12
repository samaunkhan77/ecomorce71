<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function BrandList()
    {
        $data['allData'] = Brand::all();
        return view('backend.pages.brand.list', $data);
    }

    public function BrandCreate()
    {
        return view('backend.pages.brand.add');
    }

    public function BrandStore(Request $request)
    {
        try {
            $request->validate([
                'brand_name' => 'required|unique:brands',
                'brand_description' => 'required',
                'brand_image' => 'required',
            ]);
            if ($request->hasFile('brand_image')) {
                $file = $request->file('brand_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/brand/', $filename);
                Brand::create([
                    'brand_name' => $request->brand_name,
                    'brand_slug' => $request->brand_slug,
                    'brand_description' => $request->brand_description,
                    'brand_image' => $filename,
                ]);
                toast()->success('Brand Added Successfully');
                return redirect()->route('brand.list');
            }
            else {
                toast()->error('Something went wrong');
                return redirect()->back();
            }
        } catch (Exception $exception) {
            toast()->error($exception->getMessage());
            return redirect()->back();
        }
    }


    public function BrandEdit($id)
    {
        $data['editData'] = Brand::find($id);
        return view('backend.pages.brand.add', $data);
    }


    public function BrandUpdate(Request $request, $id)
    {
        try {
            $brand = Brand::find($id);
            $brand->brand_name = $request->brand_name;
            $brand->brand_slug = $request->brand_slug;
            $brand->brand_description = $request->brand_description;
            if ($request->hasFile('brand_image')) {
                @unlink(public_path('uploads/brand/'.$brand->brand_image));
                $file = $request->file('brand_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/brand/', $filename);
                $brand->brand_image = $filename;
            }
            $brand->save();
            toast()->success('Brand Updated Successfully');
            return redirect()->route('brand.list');
        }
        catch (Exception $e) {
            toast()->error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function BrandDelete($id)
    {
        $brand = Brand::find($id);
        @unlink(public_path('uploads/brand/'.$brand->brand_image));
        $brand->delete();
        toast()->success('Brand Deleted Successfully');
        return redirect()->route('brand.list');
    }

}
