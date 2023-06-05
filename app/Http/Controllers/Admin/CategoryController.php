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
        return view('admin.allcategory');
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
            'slug' =>strtolower(str_replace())
        ]);

    }
}
