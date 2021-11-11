@extends('layouts.master')


@section('content')
  <body class="goto-here">
    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(assets/images/bg_1.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2">We serve Fresh Vegestables &amp; Fruits</h1>
	              <h2 class="subheading mb-4">Get organic vegetables &amp; fruits</h2>
	              <p><a href="/products" class="btn btn-primary">View Details</a></p>
	            </div>

	          </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image: url(assets/images/bg_2.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-sm-12 ftco-animate text-center">
	              <h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
	              <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
	              <p><a href="/products" class="btn btn-primary">View Details</a></p>
	            </div>

	          </div>
	        </div>
	      </div>
	    </div>
    </section>
    

    <section class="ftco-section">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-shipped"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Agree on Shipping</h3>
                <span>Get your product</span>
              </div>
            </div>
          </div>
          
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-diet"></span>
              </div>
              
              <div class="media-body">
                <h3 class="heading">Always Fresh</h3>
                <span>Product well packaged</span>
              </div>
            </div>
          </div>
          
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-award"></span>
              </div>
              
              <div class="media-body">
                <h3 class="heading">Superior Quality</h3>
                <span>Quality Products</span>
              </div>
            </div>
          </div>
          
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-customer-service"></span>
              </div>
              
              <div class="media-body">
                <h3 class="heading">Support</h3>
                <span>24/7 Support</span>
              </div>
            </div>
          </div>
        </div>
			</div>
		</section>
        

		<section class="ftco-section ftco-category ftco-no-pt">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-6 order-md-last align-items-stretch d-flex">
								<div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(assets/images/category.jpg);">
									<div class="text text-center">
										<h2>Vegetables</h2>
										<p>Protect the health of every home</p>
										<p><a href="/products" class="btn btn-primary">Shop now</a></p>
									</div>
								</div>
							</div>
                            
							<div class="col-md-6">
								<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(assets/images/category-1.jpg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="/products?type=fruit">Fruits</a></h2>
									</div>
								</div>
                                
								<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(assets/images/category-2.jpg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="/products?type=vegetable">Vegetable</a></h2>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(assets/images/category-3.jpg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="/products?type=fruit">Fruits</a></h2>
							</div>
						</div>
                        
						<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(assets/images/category-4.jpg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="/products?type=dried">Dried</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
        

    {{-- <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Featured Products</span>
            <h2 class="mb-4">Our Products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
    	</div>

    	<div class="container">
			<div class="row">

			@foreach($data as $item)
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">

						<div class="item {{$item['id']==1?'active':''}}">
							<h3><a href="detail/{{$item['id']}}"></a></h3>
								<img class="img-fluid" src="{{ productImage($item['product_image'])}}" alt="Product Image">

								<!-- <div class="carousel-caption slider-text"> -->

								<div class="text py-3 pb-4 px-3 text-center">
									<h3>{{$item['name']}}</h3>
								</div>
									<!-- <p>{{$item['description']}}</p> -->
									<div class="d-flex">
										<div class="pricing">
											<p class="price"><span class="price-sale">$ {{$item['price']}}</span></p>
										</div>
									</div>
						</div>
                        
							<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
						</div>
			</div>
			@endforeach
		</div>

    </section> --}}
    

		<section class="ftco-section img" style="background-image: url(assets/images/bg_3.jpg);">
    	<div class="container">
				<div class="row justify-content-end">
          <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
          	<span class="subheading">Best Price For You</span>
            <h2 class="mb-4">Deal of the day</h2>
            <p>For the best deals and offers</p>
            <h3><a href="#">Spinach</a></h3>
            <span class="price">Ksh. 50 <a href="#">now Ksh. 45 only</a></span>
            <div id="timer" class="d-flex mt-5">
						  <div class="time" id="days"></div>
						  <div class="time pl-3" id="hours"></div>
						  <div class="time pl-3" id="minutes"></div>
						  <div class="time pl-3" id="seconds"></div>
						</div>
          </div>
        </div>
    	</div>
    </section>
    

    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Customer Reviews</span>
            <h2 class="mb-4">Our satisfied customer says</h2>
            <p> </p>
          </div>
        </div>
        
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(assets/images/about2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">Thanks to Bustani, I have been able to get more customers who enjoy my organic potatoes. I am now a very happy farmer.</p>
                    <p class="name">Philipe` Smith</p>
                    <span class="position">Farmer- Smith Potato Farm</span>
                  </div>
                </div>
              </div>
              
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(assets/images/about1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">As an upcoming restaurant, we pride in making fresh food for our customers. Through Bustani, we have been able to find the best farm products from the farmers directly. This has helped boost our business.</p>
                    <p class="name">Miriam Johnson</p>
                    <span class="position">Owner- Kapseski Restaurant</span>
                  </div>
                </div>
              </div>
              
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(assets/images/about3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">Bustani has helped me connect with great maize farmers who provide fresh maize for my business. People going home from work are very satisfied with the quality of the roasted maize.</p>
                    <p class="name">Mista Hasla</p>
                    <span class="position">Mista Hasla</span>
                  </div>
                </div>
              </div>
              
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(assets/images/about4.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">As a supermarket, customers expect fresh products. Bustani has connected us to farmers in our town,not only helping us but has also uplifted our community.</p>
                    <p class="name">Bucky Barnes</p>
                    <span class="position">Human Resource Manager- Amani Supermarket</span>
                  </div>
                </div>
              </div>
              
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(assets/images/about5.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">Although the market for Goji berries is said to be small, Bustani has helped me find many people who are interested. My business is going well, thanks to them.</p>
                    <p class="name">Alejandro Jose`</p>
                    <span class="position">Ranch Owner- Hasienda Ranch</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    

    {{-- <hr> --}}

	{{-- <section class="ftco-section ftco-partner">
    	<div class="container">
    		<div class="row">
            
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="assets/images/partner-1.png" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
                
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="assets/images/partner-2.png" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
                
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="assets/images/partner-3.png" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
                
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="assets/images/partner-4.png" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
                
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="assets/images/partner-5.png" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
                
    		</div>
    	</div>
    </section> --}}
    

		<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Get e-mail updates about our latest blogs and special offers</span>
          </div>
          
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3">
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </section>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  </body>

  @endsection
</html>