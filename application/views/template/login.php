<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Login | Blog Mahasiswa Podomoro University</title>

	<!--=== CSS ===-->

	<!-- Bootstrap -->
	<link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />

	<!-- Theme -->
	<link href="<?= base_url('assets/css/main.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets/css/plugins.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets/css/responsive.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets/css/icons.css')?>" rel="stylesheet" type="text/css" />

	<!-- Login -->
	<link href="<?= base_url('assets/css/login.css')?>" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="<?= base_url('assets/css/fontawesome/font-awesome.min.css')?>">
	<!--[if IE 7]>
		<link rel="stylesheet" href="<?= base_url('assets/css/fontawesome/font-awesome-ie7.min.css')?>">
	<![endif]-->

	<!--[if IE 8]>
		<link href="<?= base_url('assets/css/ie8.css')?>" rel="stylesheet" type="text/css" />
	<![endif]-->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

	<link href="https://pcam.podomorouniversity.ac.id/assets/template/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css" />

	<!--=== JavaScript ===-->

	<script type="text/javascript" src="<?= base_url('assets/js/libs/jquery-1.10.2.min.js')?>"></script>

	<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/libs/lodash.compat.min.js')?>"></script>

	<!-- JWT Encode -->
	<script type="text/javascript" src="https://pcam.podomorouniversity.ac.id/assets/plugins/jwt/encode/hmac-sha256.js"></script>
	<script type="text/javascript" src="https://pcam.podomorouniversity.ac.id/assets/plugins/jwt/encode/enc-base64-min.js"></script>
	<script type="text/javascript" src="https://pcam.podomorouniversity.ac.id/assets/plugins/jwt/encode/jwt.encode.js"></script>

	<!-- JWT Decode -->
	<script type="text/javascript" src="https://pcam.podomorouniversity.ac.id/assets/plugins/jwt/decode/build/jwt-decode.min.js"></script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="<?= base_url('assets/js/libs/html5shiv.js')?>"></script>
	<![endif]-->

	<!-- Beautiful Checkboxes -->
	<script type="text/javascript" src="<?= base_url('assets/plugins/uniform/jquery.uniform.min.js')?>"></script>

	<!-- Form Validation -->
	<script type="text/javascript" src="<?= base_url('assets/plugins/validation/jquery.validate.min.js')?>"></script>

	<!-- Slim Progress Bars -->
	<script type="text/javascript" src="<?= base_url('assets/plugins/nprogress/nprogress.js')?>"></script>
	<script type="text/javascript" src="https://pcam.podomorouniversity.ac.id/assets/template/plugins/toastr/toastr.min.js"></script>
	<!-- App -->
	<script type="text/javascript" src="<?= base_url('assets/js/login.js')?>"></script>
	
</head>

<body class="login">
	<!-- Logo -->
	<div class="logo">
		<img style="width: 15%;padding: 15px; margin-bottom: 40px;" src="<?= base_url('assets/img/PU.png')?>" alt="logo" />
	</div>
	<!-- /Logo -->

	<!-- Login Box -->
	<div class="box">
		<div class="content">
			<!-- Login Formular -->
			<!-- <form class="form-vertical login-form" action="" method="post"> -->
				<!-- Title -->
				<h3 class="form-title">Sign In to your Account</h3>

				<!-- Error Message -->
				<!-- <div class="alert fade in alert-danger" style="display: none;" id = "divMSG">
					<i class="icon-remove close" data-dismiss="alert"></i>
					<?php if ($this->session->flashdata('Message')): ?>
						<?php echo $this->session->flashdata('Message') ?>
					<?php endif ?>
				</div> -->

				<!-- Input Fields -->
				<div class="form-group">
					<!--<label for="username">Username:</label>-->
					<div class="input-icon">
						<i class="icon-user"></i>
						<input type="text" name="username" id="username" class="form-control" placeholder="Username" autofocus="autofocus" data-rule-required="true" data-msg-required="Please enter your username." />
					</div>
				</div>
				<div class="form-group">
					<!--<label for="password">Password:</label>-->
					<div class="input-icon">
						<i class="icon-lock"></i>
						<input type="password" name="password" id="password" class="form-control" placeholder="Password" data-rule-required="true" data-msg-required="Please enter your password." />
					</div>
				</div>
				<!-- /Input Fields -->

				<!-- Form Actions -->
				<div class="form-actions">
					<!-- <label class="checkbox pull-left"><input type="checkbox" class="uniform" name="remember"> Remember me</label> -->
					<button type="submit" id="login" class="submit btn btn-primary pull-right">
						Sign In <i class="icon-angle-right"></i>
					</button>
				</div>
			<!-- </form> -->
			<!-- /Login Formular -->

			<!-- Register Formular (hidden by default) -->
			<form class="form-vertical register-form" action="" method="post" style="display: none;">
				<!-- Title -->
				<h3 class="form-title">Sign Up for Free</h3>

				<!-- Input Fields -->
				<div class="form-group">
					<div class="input-icon">
						<i class="icon-user"></i>
						<input type="text" name="username" class="form-control" placeholder="Username" autofocus="autofocus" data-rule-required="true" />
					</div>
				</div>
				<div class="form-group">
					<div class="input-icon">
						<i class="icon-lock"></i>
						<input type="password" name="password" class="form-control" placeholder="Password" id="register_password" data-rule-required="true" />
					</div>
				</div>
				<div class="form-group">
					<div class="input-icon">
						<i class="icon-ok"></i>
						<input type="password" name="password_confirm" class="form-control" placeholder="Confirm Password" data-rule-required="true" data-rule-equalTo="#register_password" />
					</div>
				</div>
				<div class="form-group">
					<div class="input-icon">
						<i class="icon-envelope"></i>
						<input type="text" name="Email" class="form-control" placeholder="Email address" data-rule-required="true" data-rule-email="true" />
					</div>
				</div>
				<div class="form-group spacing-top">
					<label class="checkbox"><input type="checkbox" class="uniform" name="remember" data-rule-required="true" data-msg-required="Please accept ToS first."> I agree to the <a href="javascript:void(0);">Terms of Service</a></label>
					<label for="remember" class="has-error help-block" generated="true" style="display:none;"></label>
				</div>
				<!-- /Input Fields -->

				<!-- Form Actions -->
				<div class="form-actions">
					<button type="button" class="back btn btn-default pull-left">
						<i class="icon-angle-left"></i> Back</i>
					</button>
					<button type="submit" class="submit btn btn-primary pull-right">
						Sign Up <i class="icon-angle-right"></i>
					</button>
				</div>
			</form>
			<!-- /Register Formular -->
		</div> <!-- /.content -->

		<!-- Forgot Password Form -->
		<div class="inner-box">
			<div class="content">
				<!-- Close Button -->
				<i class="icon-remove close hide-default"></i>

				<!-- Link as Toggle Button -->
				<!-- <a href="#" class="forgot-password-link">Forgot Password?</a> -->
				<div class="text-center"><p>© 2020 Universitas Agung Podomoro</p>
				<!-- </p>Version 2.0.1</p> --></div>
				<!-- Forgot Password Formular -->
				<form class="form-vertical forgot-password-form hide-default" action="" method="post">
					<!-- Input Fields -->
					<div class="form-group">
						<!--<label for="email">Email:</label>-->
						<div class="input-icon">
							<i class="icon-envelope"></i>
							<input type="text" name="email" class="form-control" placeholder="Enter email address" data-rule-required="true" data-rule-email="true" data-msg-required="Please enter your email." />
						</div>
					</div>
					<!-- /Input Fields -->

					<button type="submit" class="submit btn btn-default btn-block">
						Reset your Password
					</button>
				</form>
				<!-- /Forgot Password Formular -->

				<!-- Shows up if reset-button was clicked -->
				<div class="forgot-password-done hide-default">
					<i class="icon-ok success-icon"></i> <!-- Error-Alternative: <i class="icon-remove danger-icon"></i> -->
					<span>Great. We have sent you an email.</span>
				</div>
			</div> <!-- /.content -->
		</div>
		<!-- /Forgot Password Form -->
	</div>
	<!-- /Login Box -->

	<!-- Single-Sign-On (SSO) -->
	<!-- <div class="single-sign-on">
		<span>or</span>

		<button class="btn btn-facebook btn-block">
			<i class="icon-facebook"></i> Sign in with Facebook
		</button>

		<button class="btn btn-twitter btn-block">
			<i class="icon-twitter"></i> Sign in with Twitter
		</button>

		<button class="btn btn-google-plus btn-block">
			<i class="icon-google-plus"></i> Sign in with Google
		</button>
	</div> -->
	<!-- /Single-Sign-On (SSO) -->

	<!-- Footer -->
	<!-- <div class="footer">
		<a href="#" class="sign-up">Don't have an account yet? <strong>Sign Up</strong></a>
	</div> -->
	<!-- /Footer -->

	<script>
	
	$(document).ready(function(){
		window.base_url_js = "<?php echo base_url(); ?>";
		"use strict";
		Login.init(); // Init login JavaScript
		toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "newestOnTop": false,
		  "progressBar": false,
		  "positionClass": "toast-top-center",
		  "preventDuplicates": false,
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}
		<?php if ($this->session->flashdata('Message')): ?>
			var msg = "<?php echo $this->session->flashdata('Message') ?>";
			toastr.error(msg,'!Error');
		<?php endif ?>
	});

	function FormSubmitAuto(action, method, values,blank = '_self') {

        var form = $('<form/>', {
            action: action,
            method: method
        });
        $.each(values, function() {
            form.append($('<input/>', {
                type: 'hidden',
                name: this.name,
                value: this.value
            }));
        });
        form.attr('target', blank);
        form.appendTo('body').submit();
    }

    function loading_button2(selector) {
        selector.html('<i class="fa fa-refresh fa-spin fa-fw right-margin"></i> Loading...');
        selector.prop('disabled',true);
    }

    function end_loading_button2(selector,html='Save'){
        selector.prop('disabled',false).html(html);
    }

    $(document).on('click','#login',function () {
    	var Username = $('#username').val();
        var Password = $('#password').val();
        var itsme = $(this);

        if(Username!='' && Username!=null && Password!='' && Password!=null){
		    var url = base_url_js+'__cek_login';
				data = {
					Username : Username,
					Password : Password,
				}
	      	var token = jwt_encode(data,"UAP)(*");
	      	loading_button2(itsme);
			FormSubmitAuto(url, 'POST', [
				          { name: 'token', value: token },
				]);

		}
		else{
			if(Username==='' && Password===''){
				toastr.error('Enter any username and password.','Warning');
			}else if(Username===''){
				toastr.error('Enter any username.','Warning');

			}else{
				toastr.error('Enter any Password.','Warning');
			}
			// toastr.error('Enter any username and password.','Warning');
			// $('#username').val('').focus();
			// $('[name="username"]').addClass('has-error');
			// $('.alert').css("display", "block");
		} 

  	});

  	$(document).off('keypress', '#username').on('keypress', '#username',function(e) {
  		if (e.keyCode == 13) {
  		    $('#password').focus();
  		        return false;
  		}
  	})

  	$(document).off('keypress', '#password').on('keypress', '#password',function(e) {
  		if (e.keyCode == 13) {
  		    $('#login').trigger('click');
  		        return false;
  		}
  	})

	</script>
</body>
</html>
