 <?php

    use App\Http\Controllers\Admin\ProductController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\ClientController;
    use App\Http\Controllers\Admin\OrderController;
    use App\Http\Controllers\Admin\SubCategoryController;
    use App\Http\Controllers\Admin\CategoryController;
    use App\Http\Controllers\Admin\DashboardController;
    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */


    Route::controller(HomeController::class)->group(function (){
      Route::get('/', 'Index')->name('Home');
    });

    Route::controller(ClientController::class)->group(function (){
        Route::get('/category/{id}/{slug}', 'CategoryPage')->name('category');
        Route::get('/product-details/{id}/{slug}', 'SingleProduct')->name('singleproduct');
        Route::get('/new-release', 'NewRelease')->name('newrelese');
      });


      Route::middleware(['auth','role:admin'])->group(function(){
        Route::controller(ClientController::class)->group(function (){
            Route::get('/add-to-cart', 'AddToCart')->name('addtocart');
            Route::post('/add-product-to-cart/{id}', 'AddProductToCart')->name('addproducttocart');
            Route::get('/shipping-address', 'GetShippingAddress')->name('shippingaddress');
            Route::post('/add-shipping-address', 'AddShippingAddress')->name('addshippingaddress');
            Route::post('/place-order', 'PlaceOrder')->name('placeorder');
            Route::get('/checkout', 'Checkout')->name('checkout');
            Route::get('/user-profile', 'UserProfile')->name('userprofile');
            Route::get('/user-profile/pending-orders','PendingOrders')->name('pendingorders');
            Route::get('/user-profile/history','History')->name('history');
            Route::get('/todays-deal', 'TodaysDeal')->name('todaysdeal');
            Route::get('/custom-service', 'CustomerService')->name('customerservice');
            Route::get('/remove-cart-item/{id}', 'RemoveCartItem')->name('removeitem');

        });
    });



    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'role:user'])->name('dashboard');

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/admin/dashboard', 'Index')->name('admindashboard');
        });

        Route::controller(CategoryController::class)->group(function () {
            Route::get('/admin/all-category', 'index')->name('allcategory');
            Route::get('/admin/add-category', 'AddCategory')->name('addcategory');
            Route::post('/admin/store-category', 'storeCategory')->name('storecategory');
            Route::get('/admin/edit-category/{id}', 'EditCategory')->name('editcategory');
            Route::post('/admin/update-category', 'updateCategory')->name('updatecategory');
            Route::get('/admin/delete-category/{id}', 'DeleteCategory')->name('deletecategory');
        });
        Route::controller(SubCategoryController::class)->group(function () {
            Route::get('/admin/all-subcategory', 'index')->name('allsubcategory');
            Route::get('/admin/addsub-category', 'AddSubCategory')->name('addsubcategory');
            Route::post('/admin/store-subcategory', 'StoreSubcategory')->name('storesubcategory');
            Route::get('/admin/edit_subcategory/{id}', 'EditSubCat')->name('editsubcat');
            Route::get('/admin/delete_subcategory/{id}', 'DeleteSubCat')->name('deletesubcat');
            Route::post('/admin/update_subcategory', 'UpdateSubCat')->name('updatesubcat');
        });
        Route::controller(ProductController::class)->group(function () {
            Route::get('/admin/all-products', 'index')->name('allproducts');
            Route::get('/admin/add-product', 'AddProduct')->name('addproduct');
            Route::post('/admin/store-product','StoreProduct')->name('storeproduct');
            Route::get('/admin/edit-product-img/{id}','EditProductImg')->name('editproductimg');
            Route::post('/admin/update-product-img','UpdateProductImg')->name('updateproductimg');
            Route::get('/admin/edit-product/{id}','EditProduct')->name('editproduct');
            Route::post('/admin/update-product','UpdateProduct')->name('updateproduct');
            Route::get('/admin/detete-product/{id}','DeleteProduct')->name('deleteproduct');
        });
        Route::controller(OrderController::class)->group(function () {
            Route::get('/admin/pending-order', 'index')->name('pendingorder');
        });
    });


    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__ . '/auth.php';
