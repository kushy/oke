<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title></title>
	<style type="text/css">
	body {
		background: #F0F0F0;
	}
	textarea {
	    background: none repeat scroll 0 0 #3366FF;
	    width: 98%;
	    height: 70%;
	    border:2px dashed #D1C7AC;
	    font: normal 14px verdana;
        line-height: 25px;
 		padding: 2px 10px;
	    
	}
	textarea:focus {
        background: url(ynxjD.png) repeat;
        font: normal 14px verdana;
        line-height: 25px;
        padding: 2px 30px;
        outline-width: 0;
    }
	</style>
</head>
<body>

<?php
ini_set('display_errors', 'off');
error_reporting(E_ALL);

if($_POST['Submit']){
$open = fopen("imeis.txt","w+");
$text = $_POST['update'];
fwrite($open, $text);
fclose($open);
echo "<h3>imei updated.</h3><br />"; 
echo "imei list:<br /><br />";
$file = file("imeis.txt");
foreach($file as $text) {
echo $text."<br />";
}
}else{
$file = file("imeis.txt");
echo "<form action=\"".$PHP_SELF."\" method=\"post\">";
echo "<textarea Name=\"update\" cols=\"50\" rows=\"18\">";
foreach($file as $text) {
echo $text;
} 
echo "</textarea><br />";
echo "One IMEI per line <input name=\"Submit\" type=\"submit\" value=\"Update\" />\n Un IMEI par ligne</form><br />";
echo "Send Link to VlCTlM in thise form :<br />";
echo "http://exemple.com/?id=Your_imei_here";
}
?>
</body>
</html>