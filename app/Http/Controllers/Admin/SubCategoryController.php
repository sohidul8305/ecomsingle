<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function index(){
        $allsubcategories = SubCategory::latest()->get();
        return view('admin.allsubcategory',compact('allsubcategories'));
    }
    public function AddSubCategory(){
        $categories = Category::latest()->get();
        return view('admin.addsubcategory', compact('categories'));
    }
    public function StoreSubCategory(Request $request){
        $request->validate([
            'subcategory_name' => 'required|unique:sub_categories',
            'category_id' => 'required',
        ]);

           
        $category_id = $request->category_id;
        $category_name = Category::where('id', $category_id)->value('category_name');
            SubCategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace('','-', $request->subcategory_name)),
            'category_id' => $category_id,
            'category_name' => $category_name
        ]);
        Category::where('id', $category_id)->increment('subcategory_count',1);
        return redirect()->route('allsubcategory')->with('message','Sub Category Added Successfully!');
    }
}
