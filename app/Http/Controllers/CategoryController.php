<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function List()
    {
        $data['allData'] = Category::all();
        return view('backend.pages.category.category_list', $data);
    }

    public function Create()
    {
        return view('backend.pages.category.category_add');
    }

    public function Store(Request $request)
    {
        try {
            $request->validate([
                'category_name' => 'required|unique:categories',
                'category_image' => 'required',
            ]);

            $category = new Category();
            $category->category_name = $request->category_name;
            $category->category_slug = $request->category_slug;
            if ($request->hasFile('category_image')) {
                $file = $request->file('category_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/category/', $filename);
                $category->category_image = $filename;
            }
            $category->save();
            toast()->success('Category Added Successfully');
            return redirect()->route('category.list');
        }
        catch (Exception $e) {
            toast()->error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function Edit($id)
    {
        $data['editData'] = Category::find($id);
        return view('backend.pages.category.category_add', $data);
    }

    public function Update(Request $request, $id)
    {
        try {
            $category = Category::find($id);
            $category->category_name = $request->category_name;
            $category->category_slug = $request->category_slug;
            if ($request->hasFile('category_image')) {
                @unlink(public_path('uploads/category/'.$category->category_image));
                $file = $request->file('category_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/category/', $filename);
                $category->category_image = $filename;
            }
            $category->save();
            toast()->success('Category Updated Successfully');
            return redirect()->route('category.list');
        }
        catch (Exception $e) {
            toast()->error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function Delete($id)
    {
        $category = Category::find($id);
        @unlink(public_path('uploads/category/'.$category->category_image));
        $category->delete();
        toast()->success('Category Deleted Successfully');
        return redirect()->route('category.list');
    }



}
