<?php 
require("assets/php/connect2db.php");
require("assets/php/registerlogin.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="assets/js/script.js"></script>
	<link rel="stylesheet" href="assets/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet"> 
    <title>Messenger</title>
</head>
<body>
<div class="title-chat">
	<h1>Bienvenue sur BigChat</h1>
</div>
<div class="container">
    	<div class="row">
            <div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-md-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form"  method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username1" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password1" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<!-- <div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div> -->
								</form>
								<form id="register-form"  method="post" role="form" style="display: none;">
									<?php include('assets/php/errors.php');?>
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="<?php echo $username; ?>">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="<?php echo $email; ?>">
									</div>
									<div class="form-group">
										<input type="text" name="firstname" id="firstname" tabindex="1" class="form-control" placeholder="Firstname" value="<?php echo $firstname; ?>">
									</div>
									<div class="form-group">
										<input type="text" name="lastname" id="lastname" tabindex="1" class="form-control" placeholder="Lastname" value="<?php echo $lastname; ?>">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" value="<?php echo $password1; ?>">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-3"></div>
											<div class="col-md-6 col-md-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
