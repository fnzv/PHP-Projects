
<?php

echo "Simple SMS Sender in PHP";
$Destnumber = "+393123456789"; // format country code(39) + your phone number(3123456789)
$shownNumber="+3123456789
$amount = 1;
$message ="test messaggio";
$headers = 'From: ' . "$_POST['from'];"+3123456789";
 
$carrier = "textlocal.co.uk"; //your sms gateway

$number = $Destnumber . "@" . $carrier;
mail($Destnumber,"",$message,$headers);


echo "Sent";
    
?>
