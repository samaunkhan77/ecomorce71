<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Exception;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
   public function List()
   {
       $data['allData'] = SubCategory::get();
       return view('backend.pages.sub-category.list', $data);
   }

   public function Create()
   {
       $data['categories'] = Category::get();
       return view('backend.pages.sub-category.add', $data);
   }

   public function Store(Request $request)
   {
       try {
           $request->validate([
               'category_id' => 'required',
               'sub_category_name' => 'required',
               'sub_category_slug' => 'required',
               'sub_category_description' => 'required',
               'sub_category_image' => 'required',
           ]);

           if ($request->hasFile('sub_category_image')) {
               $file = $request->file('sub_category_image');
               $ext = $file->getClientOriginalExtension();
               $filename = time() . '.' . $ext;
               $file->move('uploads/subcategory/', $filename);
               $request->merge(['sub_category_image' => $filename]);
           }

           SubCategory::create([
               'category_id' => $request->category_id,
               'sub_category_name' => $request->sub_category_name,
               'sub_category_slug' => $request->sub_category_slug,
               'sub_category_description' => $request->sub_category_description,
               'sub_category_image' => $filename,
           ]);
           toast()->success('Sub Category Added Successfully');
           return redirect()->route('sub.category.list');
       }catch (Exception $e) {
           toast()->error($e->getMessage());
           return redirect()->back()->with('error', $e->getMessage());
       }
   }

   public function Edit($id)
   {
       $data['editData'] = SubCategory::find($id);
       $data['categories'] = Category::get();
       return view('backend.pages.sub-category.add', $data);
   }

   public function Update(Request $request, $id)
   {
       try {
           $request->validate([
               'category_id' => 'required',
               'sub_category_name' => 'required',
               'sub_category_slug' => 'required',
               'sub_category_description' => 'required',
               'sub_category_image' => 'required',
           ]);

           $data = SubCategory::find($id);
           if ($request->hasFile('sub_category_image')) {
               @unlink('uploads/subcategory/' . $data->sub_category_image);
               $file = $request->file('sub_category_image');
               $ext = $file->getClientOriginalExtension();
               $filename = time() . '.' . $ext;
               $file->move('uploads/subcategory/', $filename);
               $request->merge(['sub_category_image' => $filename]);
           }

           $data->update([
               'category_id' => $request->category_id,
               'sub_category_name' => $request->sub_category_name,
               'sub_category_slug' => $request->sub_category_slug,
               'sub_category_description' => $request->sub_category_description,
               'sub_category_image' => $filename,
           ]);
           toast()->success('Sub Category Updated Successfully');
           return redirect()->route('sub.category.list');
       }catch (Exception $e) {
           toast()->error($e->getMessage());
           return redirect()->back()->with('error', $e->getMessage());
       }
   }

   public function Delete($id)
   {
       $data = SubCategory::find($id);
       @unlink('uploads/subcategory/' . $data->sub_category_image);
       $data->delete();
       toast()->success('Sub Category Deleted Successfully');
       return redirect()->route('subcategory.list');
   }
}
