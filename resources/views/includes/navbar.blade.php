
<nav class="colorlib-nav" role="navigation">
	<div class="top-menu">
		
		<div class="container">
			<div class="row">
				<div class="col-sm-7 col-md-9">
					<div id="colorlib-logo"><a href="/">Footwear</a></div>
				</div>
				<div class="col-sm-12 col-md-3">
					{{-- <div class="login"> --}}
						@if (Session::has('loginId'))
							<h4></h4>
							<ul>
								{{-- <li>{{$data -> user_name}}</li> --}}
								<li class="has-dropdown">
									<a href="">{{$data -> name}}</a>
									<ul class="dropdown">
										<li><a href="">Account</a></li>
										<li><a href="/order-complete">Order Complete</a></li>
										<li><a href="/logout">Logout</a></li>
									</ul>
								</li>
								{{-- <li><a href="/account">Account</a></li> --}}
								{{-- <li><a href="/logout">Logout</a></li> --}}
							</ul>

						@else
							<ul>
								<li><a href="/signup">Sign Up</a></li>
								<li><a href="/login">Login</a></li>
							</ul>
						@endif
						
					{{-- </div> --}}
	            {{-- <form action="#" class="search-wrap">
	               <div class="form-group">
	                  <input type="search" class="form-control search" placeholder="Search">
	                  <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
	               </div>
	            </form> --}}
	         </div>
			 
		     </div>
			<div class="row">
				<div class="col-sm-12 text-left menu-1">
					<ul>
						<li class="active"><a href="/">Home</a></li>
						<li class="has-dropdown">
							<a href="/men">Men</a>
							<ul class="dropdown">
								<li><a href="/checkout">Checkout</a></li>
								<li><a href="/order-complete">Order Complete</a></li>
								<li><a href="/wishlist">Wishlist</a></li>
							</ul>
						</li>
						<li><a href="/women">Women</a></li>
						<li><a href="/about">About</a></li>
						<li><a href="/contact">Contact</a></li>
						<li class="cart"><a href="/cart"><i class="icon-shopping-cart"></i> Cart [ {{ $cartCount}} ]</a></li>

						
					</ul>
					
				</div>
				
			</div>
		</div>
	</div>
	<div class="sale">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 offset-sm-2 text-center">
					<div class="row">
						<div class="owl-carousel2">
							<div class="item">
								<div class="col">
									<h3><a href="#">25% off (Almost) Everything! Use Code: Summer Sale</a></h3>
								</div>
							</div>
							<div class="item">
								<div class="col">
									<h3><a href="#">Our biggest sale yet 50% off all summer shoes</a></h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav>