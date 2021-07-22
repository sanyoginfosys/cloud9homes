<?php
session_start();

if(isset($_SESSION['INFCRM_UserID'])){
	header('location: dashboard.php');
}

if(isset($_POST['email']) AND isset($_POST['password'])){
	if($_POST['email'] != NULL AND $_POST['password'] != NULL){
		include_once('base/functions.php');
		LOGIN_begin($_POST['email'], $_POST['password']);
	}    else {
		header("location: login.php?error=10");
	}
}
?>
<!DOCTYPE html>
<?php include_once 'siteconfig.php'; ?>
<html lang="en">	
<head>
	<meta charset="utf-8" />
	<title>Login | <?php echo SITE_TITLE; ?></title>
	<meta name="description" content="Login to the portal">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="assets/app/custom/login/login-v4.default.css" rel="stylesheet" type="text/css" />
	<?php include_once 'includes/header.php'; ?>
</head>

<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
	<div class=""></div>

	<div class="kt-grid kt-grid--ver kt-grid--root">
		<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(assets/media/bg/bg-2.jpg);">
				<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
					<div class="kt-login__container">
						<div class="kt-login__logo">
							<a href="#">
								<img src="assets/media/logos/logo-5.png">
							</a>
						</div>
						<div class="kt-login__signin">
							<div class="kt-login__head">
								<h3 class="kt-login__title">Sign In To The Portal</h3>
							</div>
							<?php if(isset($_GET['error'])){
								if($_GET['error'] == 10) {
									?>
									<div class="alert alert-danger" role="alert">
										<div class="alert-text">Incorrect Email or Password!!!</div>
									</div>
									<?php
								}   
								else{
									if($_GET['error'] == 20){?>
										<div class="alert alert-danger" role="alert">
											<div class="alert-text">Incorrect your password!</div>
										</div>
										<?php
									}
								}
							}
							?>
							<form class="kt-form" action="login.php" method="POST">
								<div class="input-group">
									<input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
								</div>
								<div class="input-group">
									<input class="form-control" type="password" placeholder="Password" name="password">
								</div>
								<div class="row kt-login__extra">
									<div class="col">
										<label class="kt-checkbox">
											<input type="checkbox" name="remember"> Remember me
											<span></span>
										</label>
									</div>

								</div>
								<div class="kt-login__actions">
									<button type="submit" id="kt_login_signin_submit" class="btn btn-brand btn-pill">Sign In</button>										
								</div>
								<!-- <div class="kt-login__actions">
									<button id="kt_login_signin_submit" class="btn btn-brand btn-pill kt-login__btn-primary" formaction="registration.php">Register</button>
								</div> -->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include_once 'includes/footer.php'; ?>
	<!-- <script src="assets/app/custom/login/login-general.js" type="text/javascript"></script> -->
</body>
</html>