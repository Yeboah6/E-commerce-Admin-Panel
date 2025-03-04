<!DOCTYPE html>
<html lang="en">

<head>

	<title>Ecommerce Website</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="assets1/css/style.css">
	
	


</head>

<!-- [ auth-signup ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
                        <h3>E-commerce Website</h3>
						<h4 class="mb-3 f-w-400">Sign up</h4>
                        <form action="{{ url('/signup') }}" method="POST">
                            @if (Session::has('success'))
				    	        <div class="alert alert-success">{{ Session::get('success') }}</div>
				            @endif
				            @if (Session::has('fail'))
				            	<div class="alert alert-danger">{{ Session::get('fail') }}</div>
				            @endif
                            
                            @csrf
							<div class="form-group mb-3">
						    	<label class="floating-label" for="Role">Role</label>
								<select class="form-control" name="role">
									<option selected> -- Select Role -- </option>
									<option value="customer">Customer</option>
								</select>
						    	{{-- <input type="text" class="form-control" id="Username" placeholder="" name="name"> --}}
						    </div>
						    <div class="form-group mb-3">
						    	<label class="floating-label" for="Username">Name</label>
						    	<input type="text" class="form-control" id="Username" placeholder="" name="name">
						    </div>
						    <div class="form-group mb-3">
						    	<label class="floating-label" for="Email">Email address</label>
						    	<input type="email" class="form-control" id="Email" placeholder="" name="email">
						    </div>
							<div class="form-group mb-3">
						    	<label class="floating-label" for="number">Phone Number</label>
						    	<input type="text" class="form-control" id="Username" placeholder="" name="number">
						    </div>
						    <div class="form-group mb-4">
						    	<label class="floating-label" for="Password">Password</label>
						    	<input type="password" class="form-control" id="Password" placeholder="" name="password">
						    </div>
						    <button class="btn btn-block mb-4" style="background-color: #88C8BC;color: #fff;">Sign up</button>
						    <p class="mb-2">Already have an account? <a href="login" class="f-w-400">login</a></p>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signup ] end -->

<!-- Required Js -->
<script src="assets1/js/vendor-all.min.js"></script>
<script src="assets1/js/plugins/bootstrap.min.js"></script>
<script src="assets1/js/ripple.js"></script>
<script src="assets1/js/pcoded.min.js"></script>



</body>

</html>
