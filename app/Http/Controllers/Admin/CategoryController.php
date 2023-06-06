<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use DeepCopy\f007\FooDateInterval;
use Illuminate\Http\Request;
 use Illuminate\Contracts\Container\BindingResolutionException;


class CategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        return view('admin.allcategory', compact('categories'));
    }
    public function AddCategory(){
        return view('admin.addcategory');
    }
    public function StoreCategory(Request $request){
        $request->validate([
         'category_name' => 'required|unique:categories'
        ]);

        Category::insert([
            'category_name' =>$request->category_name,
            'slug' =>strtolower(str_replace('','-', $request->category_name))
        ]);
        return redirect()->route('allcategory')->with('message','Category Added Successfully!');

    }
}
