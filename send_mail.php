<?php
 
ini_set('display_errors', 1 );
 
error_reporting( E_ALL );
 
$from = "fahrizal.khoirianto@gmail.com";
 
$to = "info.oslog.integrasiautama@gmail.com";
 
$subject = "Checking PHP mail";
 
$message = "PHP mail works just fine";
 
$headers = "From:" . $from;
 
$test = mail($to,$subject,$message, $headers);
 
echo $test;
?>