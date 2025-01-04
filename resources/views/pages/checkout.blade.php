@extends('layouts.app')
@section('content')
		
	<div class="colorlib-loader"></div>

	<div id="page">
		@include('includes.navbar')
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="/index">Home</a></span> / <span>Checkout</span></p>
					</div>
				</div>
			</div>
		</div>


		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-sm-10 offset-md-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center active">
								<p><span>02</span></p>
								<h3>Checkout</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-8">
						<form action="{{ url('/checkout') }}" method="POST" class="colorlib-form">
							@if (Session::has('success'))
				    	        	<div class="alert alert-success">{{ Session::get('success') }}</div>
				            	@endif
				            	@if (Session::has('fail'))
				            		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
				            	@endif
							@csrf
							<h2>Billing Details</h2>
								<input type="text" name="customer_id" value="{{ $data -> id}}">
		              		<div class="row">
			            	   <div class="col-md-12">
			            	      <div class="form-group">
			            	      	<label for="country">Select Country</label>
			            	         <div class="form-field">
			            	         	<i class="icon icon-arrow-down3"></i>
			            	            <select name="country" id="people" class="form-control">
				        	              	<option value="#">Select country</option>
				        	                <option value="Ghana">Ghana</option>
				        	                <option value="Alaska">Alaska</option>
				        	                <option value="China">China</option>
				        	                <option value="Japan">Japan</option>
				        	                <option value="Korea">Korea</option>
				        	                <option value="Philippines">Philippines</option>
			            	            </select>
			            	         </div>
			            	      </div>
			            	   </div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="fname">First Name</label>
											<input type="text" id="fname" name="first_name" class="form-control" placeholder="Your First name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="lname">Last Name</label>
											<input type="text" id="lname" name="last_name" class="form-control" placeholder="Your Last name">
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label for="companyname">Company Name</label>
			            	        	<input type="text" id="companyname" name="company_name" class="form-control" placeholder="Company Name">
			            	      </div>
			            	   </div>

			            	   <div class="col-md-12">
										<div class="form-group">
											<label for="fname">Address</label>
			            	        	<input type="text" id="address" name="address_1" class="form-control" placeholder="Enter Your Address">
			            	      </div>
			            	      <div class="form-group">
			            	        	<input type="text" id="address2" name="address_2" class="form-control" placeholder="Second Address">
			            	      </div>
			            	   </div>
						   
			            	   <div class="col-md-12">
										<div class="form-group">
											<label for="companyname">Town/City</label>
			            	        	<input type="text" id="towncity" name="city" class="form-control" placeholder="Town or City">
			            	      </div>
			            	   </div>
						   
									<div class="col-md-6">
										<div class="form-group">
											<label for="stateprovince">State/Province</label>
											<input type="text" id="fname" name="state" class="form-control" placeholder="State Province">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="lname">Zip/Postal Code</label>
											<input type="text" id="zippostalcode" name="zip_code" class="form-control" placeholder="Zip / Postal">
										</div>
									</div>
								
									<div class="col-md-6">
										<div class="form-group">
											<label for="email">E-mail Address</label>
											<input type="email" id="email" name="email" class="form-control" placeholder="State Province">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="Phone">Phone Number</label>
											<input type="text" id="zippostalcode" name="number" class="form-control" placeholder="Phone Number">
										</div>
									</div>

									{{-- <div class="col-md-12">
										<div class="form-group">
											<label for="country">Select Payment Method</label>
										   <div class="form-field">
											   <i class="icon icon-arrow-down3"></i>
											  <select name="payment_method" id="people" class="form-control">
													<option value="#">Select Payment Method</option>
												  <option value="Mobile Money">Mobile Money</option>
												  <option value="Paypal">Paypal</option>
											  </select>
										   </div>
										</div>
									 </div> --}}
		               		</div>
							   <div class="row">
								<div class="col-md-12 text-center">
									<button type="submit" class="btn btn-primary">Add Address</button>

									<p><a class="btn btn-primary" href="">Proceed to Payment</a></p>
								</div>
							</div>
		            	</form>
					</div>

					<div class="col-lg-4">
						<div class="row">
							<div class="col-md-12">
								<div class="cart-detail">
									<h2>Cart Total</h2>
									<ul>
										<li>
											<span>Subtotal</span> <span>${{ number_format($total, 2) }}</span>
											<ul>
												@foreach ($results as $result)
													<li>
														<span style="font-weight: bold;">{{ $result['cartItem']->quantity }} x {{$result['product']['brandName']}}</span> <span>{{ isset($result['product']['price']['current']['value']) ? $result['product']['price']['current']['value'] * $result['cartItem']->quantity : 'N/A' }}</span>
													</li>
												@endforeach
											</ul>
										</li>
										<li><span>Shipping</span> <span>$0.00</span></li>
										<li><span>Order Total</span> <span>${{ number_format($total, 2) }}</span></li>
									</ul>
								</div>
						   </div>

						   <div class="w-100"></div>

						   {{-- <form action="{{ url('/checkout') }}" method="post">
							@if (Session::has('success'))
				    	        	<div class="alert alert-success">{{ Session::get('success') }}</div>
				            	@endif
				            	@if (Session::has('fail'))
				            		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
				            	@endif
							@csrf
								<div class="col-md-12">
									<div class="cart-detail">
										<h2>Payment Method</h2>
										<div class="form-group">
											<div class="col-md-12">
												<div class="radio">
												<label><input type="radio" name="Mobile_money"> Mobile Money</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<div class="radio">
												<label><input type="radio" name="Paypal"> Paypal</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<div class="checkbox">
												<label><input type="checkbox" value=""> I have read and accept the terms and conditions</label>
												</div>
											</div>
										</div>
									</div>
								</div>
						   </form> --}}
						
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
							<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span> 
							<span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="http://pexels.com/" target="_blank">Pexels.com</a></span>
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>
	
@endsection

