<?php

namespace App\Http\Controllers;

use App\Models\SaleCategory;
use Exception;
use Illuminate\Http\Request;

class SaleCategoryController extends Controller
{

    public function List()
    {
        $data['allData'] = SaleCategory::all();
        return view('backend.pages.sale_category.list', $data);
    }

    public function Create()
    {
        return view('backend.pages.sale_category.add');
    }


    public function Store(Request $request)
    {
        try {
            $request->validate([
                'sale_category_name' => 'required|unique:sale_categories|max:30',
            ]);
            $data = new SaleCategory();
            $data->sale_category_name = $request->sale_category_name;
            $data->save();
            toast()->success('Sale Category Added Successfully');
            return redirect()->route('sale.category.list');
        }
        catch (Exception $e) {
            toast()->error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function Edit($id)
    {
        $data['editData'] = SaleCategory::find($id);
        return view('backend.pages.sale_category.add', $data);
    }


    public function Update(Request $request, $id)
    {
        try {
            $request->validate([
                'sale_category_name' => 'required|unique:sale_categories|max:30',
            ]);
            $data = SaleCategory::find($id);
            $data->sale_category_name = $request->sale_category_name;
            $data->save();
            toast()->success('Sale Category Updated Successfully');
            return redirect()->route('sale.category.list');
        }
        catch (Exception $e) {
            toast()->error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function Delete($id)
    {
        $data = SaleCategory::find($id);
        $data->delete();
        toast()->success('Sale Category Deleted Successfully');
        return redirect()->route('sale.category.list');
    }
}
