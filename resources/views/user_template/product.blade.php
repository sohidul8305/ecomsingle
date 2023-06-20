@extends('user_template.layouts.template')
@section('main-content')
<div class="container">
    <div class="row">
       <div class="col-lg-4">
     <div class="box_main">
        <div class="tshirt_img"><img src="images/dress-shirt-img.png"></div>
     </div>
        </div> 
        <div class="col-lg-8">
   <div class="box_main">
    <div class="product-info">
        <h4 class="shirt_text text-left">Man-Shirt</h4>  
    <p class="price_text text-left">Price  <span style="color: #262626;">$ 30</span></p>
    </div>
    <div class="my-3 product-details">
        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident odio saepe optio. Veniam maxime ex, corporis id provident dolorem amet, facere magnam perspiciatis nemo ratione optio non eaque aperiam assumenda.</p>
   <ul class="p-2 bg-light my-2">
    <li>Category- Electroics</li>
    <li>Sub Category- Mobile</li>
    <li>Availlable Quantity- 10</li>
   </ul>
    </div>

    <div class="btn_main">
        <div class="btn btn-warning"><a href="#">Add To Cart</a></div>
     </div>
   </div>
        </div>
    </div>
</div>

<div class="fashion_section">
    <div id="main_slider">
                <div class="container">
                   <h1 class="fashion_taital">Related Products</h1>
                   <div class="fashion_section_2">
                         <div class="row">
                          
                            <div class="col-lg-4 col-sm-4">
                               <div class="box_main">
                                     <h4 class="shirt_text">Product Name</h4>
                                     <p class="price_text">Price <span style="color: #262626;">$ 50</span></p>
                                     <div class="tshirt_img"><img src=""></div>
                                     <div class="btn_main">
                                        <div class="buy_bt"><a href="#">Buy Now</a></div>
                                        <div class="seemore_bt"><a href="">See More</a></div>
                                     </div>
                               </div>
                            </div>
                         </div>
                   </div>
                </div>
    </div>
 </div>
@endsection()