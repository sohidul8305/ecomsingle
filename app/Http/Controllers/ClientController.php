<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Carttable;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    public function CategoryPage($id){
        $products = Product::where('product_category_id', $id)->latest()->get();
        $category = Category::findOrFail($id);
        return view('user_template.category', compact('category', 'products'));
    }
    public function SingleProduct($id){
        $product = Product::findOrFail($id);
        $subcat_id= Product::where('id', $id)->value('product_subcategory_id');
        $related_products = Product::where('product_subcategory_id', $subcat_id)->latest()->get();
        return view('user_template.product', compact('product', 'related_products'));
    }
    public function AddToCart(){
        $userid = Auth::id();
        $cart_item = Carttable::where('user_id', $userid)->get();
        return view('user_template.addtocart', compact('cart_item'));
    }
    public function checkout(){
        return view('user_template.checkout');
    }
    public function UserProfile(){
        return view('user_template.userprofile');
    }

    public function PendingOrders(){
     return view('user_template.pendingorders');
    }
    public function History(){
        return view('user_template.history');
    }
    public function AddProductToCart(Request $request){
      
        $product_price = $request->price;
        $quantity = $request->quantity;
        $price = $product_price ;
        Carttable::insert([
         'product_id' => $request->product_id,
         'user_id' => Auth::id(),
         'quantity' => $request->product_quantity,
         'price' =>$price,
      ]);

      return redirect()->route('addtocart')->with('message', 'Your item added to cart successfully!');
    }
    public function NewRelease(){
        return view('user_template.newrelease');
    }
    public function TodaysDeal(){
        return view('user_template.todaysdeal');
    }
    public function CustomerService(){
        return view('user_template.customerservice');
    }
}
