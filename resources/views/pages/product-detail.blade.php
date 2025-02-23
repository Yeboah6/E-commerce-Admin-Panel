@extends('layouts.app')
@section('content')

	<div class="colorlib-loader"></div>

	<div id="page">
		@include('includes.navbar')

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="/">Home</a></span> / <span>Product Details</span></p>
					</div>
				</div>
			</div>
		</div>


		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg product-detail-wrap">
					<div class="col-sm-8">
						<div class="owl-carousel">
							@if (!empty($file['additionalImageUrls']))
                				@foreach ($file['additionalImageUrls'] as $imageUrl)
									<div class="item">
										<div class="product-entry border">
											<a href="#" class="prod-img">
												<img src="https://{{ $imageUrl }}" class="img-fluid" alt="Free html5 bootstrap 4 template">
											</a>
										</div>
									</div>
                				@endforeach
                			@else
                		    	<p>No additional images available.</p>
                			@endif
						</div>
					</div>
					<div class="col-sm-4">
						<div class="product-desc">
							<h3>{{$file['brandName']}}</h3>
							<p class="price">
								<span>{{ $file['price']['current']['text'] ?? 'N/A' }}</span> 
								{{-- <span class="rate">
									<i class="icon-star-full"></i>
									<i class="icon-star-full"></i>
									<i class="icon-star-full"></i>
									<i class="icon-star-full"></i>
									<i class="icon-star-half"></i>
									(74 Rating)
								</span> --}}
							</p>
							<p>{{ $file['name'] }}
							</p>
							<div class="size-wrap">
								<div class="block-26 mb-2">
									<h4>Size</h4>
				               <ul>
				                  <li><a href="#">7</a></li>
				                  <li><a href="#">7.5</a></li>
				                  <li><a href="#">8</a></li>
				                  <li><a href="#">8.5</a></li>
				                  <li><a href="#">9</a></li>
				                  <li><a href="#">9.5</a></li>
				                  <li><a href="#">10</a></li>
				                  <li><a href="#">10.5</a></li>
				                  <li><a href="#">11</a></li>
				                  <li><a href="#">11.5</a></li>
				                  <li><a href="#">12</a></li>
				                  <li><a href="#">12.5</a></li>
				                  <li><a href="#">13</a></li>
				                  <li><a href="#">13.5</a></li>
				                  <li><a href="#">14</a></li>
				               </ul>
				            </div>
				            <div class="block-26 mb-4">
									<h4>Width</h4>
				               <ul>
				                  <li><a href="#">M</a></li>
				                  <li><a href="#">W</a></li>
				               </ul>
				            </div>
							</div>
							<form action="{{ url('/add-to-cart') }}" method="POST">
								@if (Session::has('success'))
				    	        	<div class="alert alert-success">{{ Session::get('success') }}</div>
				            	@endif
				            	@if (Session::has('fail'))
				            		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
				            	@endif
								@csrf
								<div class="input-group mb-4">
									<span class="input-group-btn">
										<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
											<i class="icon-minus2"></i>
										</button>
									</span>
									<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
									<span class="input-group-btn ml-1">
										<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
											<i class="icon-plus2"></i>
										</button>
									</span>
								</div>
								<input type="text" hidden name="product_id" value="{{$file['id']}}">
								@if (Session::has('loginId'))
									<input type="text" hidden name="customer_id" value="{{$data -> id}}">
								@endif
							
                  				<div class="row">
	                  				<div class="col-sm-12 text-center">
										@if (Session::has('loginId'))
											<button type="submit" class="btn btn-primary btn-addtocart"><i class="icon-shopping-cart"></i>Add to cart</button>
									{{-- </div>
								</div> --}}
							</form>
									@else
										<p class="addtocart"><a href="/signup" class="btn btn-primary btn-addtocart"><i class="icon-shopping-cart"></i> Add to Cart</a></p>
									@endif
									
									
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-md-12 pills">
								<div class="bd-example bd-example-tabs">
								  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

								    <li class="nav-item">
								      <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Description</a>
								    </li>
								    <li class="nav-item">
								      <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Manufacturer</a>
								    </li>
								    {{-- <li class="nav-item">
								      <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
								    </li> --}}
								  </ul>

								  <div class="tab-content" id="pills-tabContent">
								    <div class="tab-pane border fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
								      <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
										<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
										<ul>
											<li>The Big Oxmox advised her not to do so</li>
											<li>Because there were thousands of bad Commas</li>
											<li>Wild Question Marks and devious Semikoli</li>
											<li>She packed her seven versalia</li>
											<li>tial into the belt and made herself on the way.</li>
										</ul>
								    </div>

								    <div class="tab-pane border fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
								      <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
										<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
								    </div>

								    <div class="tab-pane border fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
								      <div class="row">
								   	</div>
								    </div>
								  </div>
								</div>
				         </div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col footer-col colorlib-widget">
						<h4>About Footwear</h4>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Customer Care</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">Contact</a></li>
								<li><a href="#">Returns/Exchange</a></li>
								<li><a href="#">Gift Voucher</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Special</a></li>
								<li><a href="#">Customer Services</a></li>
								<li><a href="#">Site maps</a></li>
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Information</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">About us</a></li>
								<li><a href="#">Delivery Information</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Support</a></li>
								<li><a href="#">Order Tracking</a></li>
							</ul>
						</p>
					</div>

					<div class="col footer-col">
						<h4>News</h4>
						<ul class="colorlib-footer-links">
							<li><a href="blog.html">Blog</a></li>
							<li><a href="#">Press</a></li>
							<li><a href="#">Exhibitions</a></li>
						</ul>
					</div>

					<div class="col footer-col">
						<h4>Contact Information</h4>
						<ul class="colorlib-footer-links">
							<li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
							<li><a href="tel://1234567920">+ 1235 2355 98</a></li>
							<li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
							<li><a href="#">yoursite.com</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="row">
					<div class="col-sm-12 text-center">
						<p>
							<span></span> 
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>
	
	
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const quantityInput = document.getElementById('quantity');
			const btnMinus = document.querySelector('.quantity-left-minus');
			const btnPlus = document.querySelector('.quantity-right-plus');
	
			// Function to update the quantity value
			function updateQuantity(delta) {
				let currentValue = parseInt(quantityInput.value) || 1;
				const minValue = parseInt(quantityInput.min) || 1;
				const maxValue = parseInt(quantityInput.max) || 100;
	
				currentValue += delta;
	
				if (currentValue < minValue) {
					currentValue = minValue;
				} else if (currentValue > maxValue) {
					currentValue = maxValue;
				}
	
				quantityInput.value = currentValue;
			}
	
			// Event listeners for buttons
			btnMinus.addEventListener('click', function () {
				updateQuantity(-1);
			});
	
			btnPlus.addEventListener('click', function () {
				updateQuantity(1);
			});
		});
	</script>

@endsection