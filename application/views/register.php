<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assets/auth/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/auth/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/auth/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/auth/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/auth/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/auth/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/auth/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div style="margin-top:60px;" class="login100-pic js-tilt" data-tilt>
					<img src="assets/auth/images/img-01.png" alt="IMG">
				</div>

				<form method="post" autocomplete="off" action="<?= base_url('new_account') ?>" class="login100-form validate-form">
					<span class="login100-form-title">
						Create new account !
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Name is required">
						<input class="input100" type="text" name="fullname" id="fullname" placeholder="Full Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-card" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Group is required">
						<select style="border:none;" class="input100" name="batch" id="batch">
							<option>-- Select Group --</option>
							<?php foreach ($data as $row) : ?>
								<option value="<?= $row->id ?>"><?= $row->name ?></option>
							<?php endforeach; ?>
						</select>
						
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-sitemap" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" id="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" id="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Confirm Password is required">
						<input class="input100" type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-check" aria-hidden="true"></i>
						</span>
					</div>

					<?php if ($this->session->flashdata('error')) {?>
						<p class="text-danger text-center" style="margin-top: 10px">
							<?=$this->session->flashdata('error') ?>
						</p>
					<?php }?>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							REGISTER
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="<?= base_url('login') ?>">
							Already have an account ?
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->	
	<script src="assets/auth/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/auth/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/auth/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/auth/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/auth/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		});
		function myFunction(message) {
			alert(message);
		}
	</script>
<!--===============================================================================================-->
	<script src="assets/auth/js/main.js"></script>

</body>
</html>
