<?php  
include_once('base/functions.php');
if(isset($_POST['user_registration_btn'],$_POST['email'],$_POST['password'])){
	user_registration_master($_POST['first-name'], $_POST['last-name'], $_POST['email'], $_POST['password'], $_POST['repeat-password']);
}

function print_login_modal(){
	echo'<!-- Login modal -->
	<div class="modal fade apartment-modal" id="login-modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<div class="modal-title">
						<h1>Login<span class="special-color">.</span></h1>
						<div class="short-title-separator"></div>
					</div>
					<input name="login" type="email" class="input-full main-input" placeholder="Email" />
					<input name="password" type="password" class="input-full main-input" placeholder="Your Password" />
					<a href="#" class="button-primary button-shadow button-full">
						<span>Sign In</span>
						<div class="button-triangle"></div>
						<div class="button-triangle2"></div>
						<div class="button-icon"><i class="fa fa-user"></i></div>
					</a>
					<a href="#" class="forgot-link">Forgot your password?</a>
					<div class="clearfix"></div>';
//					<p class="login-or">OR</p>
//					<a href="#" class="facebook-button">
//						<i class="fa fa-facebook"></i>
//						<span>Login with Facebook</span>
//					</a>
//					<a href="#" class="google-button margin-top-15">
//						<i class="fa fa-google-plus"></i>
//						<span>Login with Google</span>
//					</a>
					echo '<p class="modal-bottom">Don\'t have an account? <a href="#" class="register-link">REGISTER</a></p>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- Register modal -->
	<div class="modal fade apartment-modal" id="register-modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<div class="modal-title">
						<h1>Register<span class="special-color">.</span></h1>
						<div class="short-title-separator"></div>
					</div>
					<form name="user_registration" method="POST" action="'.$_SERVER["PHP_SELF"].'">
					<input name="first-name" type="text" class="input-full main-input" placeholder="First name" required/>
					<input name="last-name" type="text" class="input-full main-input" placeholder="Last name" required/>
					<input name="email" type="email" class="input-full main-input" placeholder="Email" required/>
					<input name="password" type="password" class="input-full main-input" placeholder="Password" required/>
					<input name="repeat-password" type="password" class="input-full main-input" placeholder="Repeat Password" required/>
					<button name="user_registration_btn" class="button-primary button-shadow button-full">
						<span>Sign up</span>
						<div class="button-triangle"></div>
						<div class="button-triangle2"></div>
						<div class="button-icon"><i class="fa fa-user"></i></div>
					</button>
					</form>
					<div class="clearfix"></div>';
					// <p class="login-or">OR</p>
					// <a href="#" class="facebook-button">
					// 	<i class="fa fa-facebook"></i>
					// 	<span>Sing Up with Facebook</span>
					// </a>
					// <a href="#" class="google-button margin-top-15">
					// 	<i class="fa fa-google-plus"></i>
					// 	<span>Sing Up with Google</span>
					// </a>
					echo '<p class="modal-bottom">Already registered? <a href="#" class="login-link">SIGN IN</a></p>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- Forgotten password modal -->
	<div class="modal fade apartment-modal" id="forgot-modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<div class="modal-title">
						<h1>Forgot your password<span class="special-color">?</span></h1>
						<div class="short-title-separator"></div>
					</div>
					<p class="negative-margin forgot-info">Insert your account email address.<br/>We will send you a link to reset your password.</p>
					<input name="login" type="email" class="input-full main-input" placeholder="Your email" />
					<a href="my-profile.html" class="button-primary button-shadow button-full">
						<span>Reset password</span>
						<div class="button-triangle"></div>
						<div class="button-triangle2"></div>
						<div class="button-icon"><i class="fa fa-user"></i></div>
					</a>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->';
}

?>