<?php 
if(isset($data['msg']))
{
$msg = $data['msg'];
}
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>ISS | Login </title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<base href="<?= $data['bhref'] ?>">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="css/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="css/select2.css" rel="stylesheet" type="text/css"/>
<link href="css/login3.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="css/plugins-md.css" rel="stylesheet" type="text/css"/>
<link href="css/layout.css" rel="stylesheet" type="text/css"/>
<link href="css/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md login">
<!-- BEGIN LOGO -->
<div class="logo">

		<h3 style = "color:white"> ISS Governance</h3>

</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="Index/login_attempt" method="post">
		<h3 class="form-title">Login to your account</h3>
		<div id = "login_error"></div>
		<?php
		
			if(isset($msg))
			{
				if($msg == "login_failed")
				{
					echo "<div class= 'alert alert-danger'> Username/Password is invalid</div>";
				}
				if($msg == "registration_success")
				{
					echo "<div class= 'alert alert-success'> Registration Success! You may now login!</div>";
				}
			}
		
		?>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Not a valid Username and Password. </span>
		</div>
	
		
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" value="<?php if(isset($_POST['username']))?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" />
			</div>
		</div>
		<div class="form-actions">
			<label class="checkbox">
			<input type="checkbox" name="remember" value="1"/> Remember me </label>
			<button type="submit" class="btn green-haze pull-right">
			Login <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	
		<div class="forget-password">
			<h4>Forgot your password ?</h4>
			<p>
				 no worries, click <a href="javascript:;" id="forget-password">
				here </a>
				to reset your password.
			</p>
		</div>
		<div class="create-account">
			<p>
				 Don't have an account yet ?&nbsp; <a href="javascript:;" id="register-btn">
				Create an account </a>
			</p>
		</div>
	</form>
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="" method="post">
		<h3>Forget Password ?</h3>
		<p>
			 Enter your e-mail address below to reset your password.
		</p>
		<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn">
			<i class="m-icon-swapleft"></i> Back </button>
			<button type="submit" class="btn green-haze pull-right">
			Submit <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
	<!-- BEGIN REGISTRATION FORM -->
	<form class="register-form" action="Index/register" method="post">
		<h3>Sign Up</h3>
		<div id = "error_msg"></div>
		<p>
			 Enter your personal details below:
		</p>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">First Name</label>
			<div class="input-icon">
				<i class="fa fa-font"></i>
				<input class="form-control placeholder-no-fix" type="text" placeholder="First Name" name="fname" value="<?php if(isset($_POST['fname']))?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Last Name</label>
			<div class="input-icon">
				<i class="fa fa-font"></i>
				<input class="form-control placeholder-no-fix" type="text" placeholder="Last Name" name="lname" value="<?php if(isset($_POST['lname']))?>"/>
			</div>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" value="<?php if(isset($_POST['email']))?>"/>
			</div>
		</div>
		
		
		<p>
			 Enter your account details below:
		</p>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" value="<?php if(isset($_POST['username']))?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
			<div class="controls">
				<div class="input-icon">
					<i class="fa fa-check"></i>
					<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="rpassword"/>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label>
			<input type="checkbox" name="tnc"/> I agree to the <a href="javascript:;">
			Terms of Service </a>
			and <a href="javascript:;">
			Privacy Policy </a>
			</label>
			<div id="register_tnc_error">
			</div>
		</div>
		<div class="form-actions">
			<button id="register-back-btn" type="button" class="btn">
			<i class="m-icon-swapleft"></i> Back </button>
			<button type="submit" id="register-submit-btn" class="btn green-haze pull-right" name="rbutton">
			Sign Up <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	<!-- END REGISTRATION FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 2015 &copy; ISS Governance
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery-migrate.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery.blockui.min.js" type="text/javascript"></script>
<script src="js/jquery.uniform.min.js" type="text/javascript"></script>
<script src="js/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="js/metronic.js" type="text/javascript"></script>
<script src="js/layout.js" type="text/javascript"></script>
<script src="js/demo.js" type="text/javascript"></script>
<script src="js/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
  Metronic.init(); // init metronic core components
  Layout.init(); // init current layout
  Login.init();
  Demo.init();
    
});
 function getError(err)
 {
	        jQuery('.login-form').hide();
            jQuery('.register-form').show();
			var d = document.getElementById("error_msg");
			d.className = " alert alert-danger";
			if(err == "registration_failed")
			{
				d.innerHTML = 'Something is wrong..';
			}
			else if(err == "username_taken")
			{
				d.innerHTML = 'Username is already taken, please try another username..';
			}
 }
 
</script>

<?php 

	if(isset($msg))
	{
		if($msg == "registration_failed")
		{
			echo "<script type='text/javascript'>
					var err = 'registration_failed';
					getError(err);
					</script>"; ;
		}
		elseif($msg == "username_taken")
		{
			echo "<script type='text/javascript'>
					var err = 'username_taken';
					getError(err);
					</script>"; ;
		}
	}
		

		
?>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>