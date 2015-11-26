 <?php 
 /* Wifi Personal Tracker Copyright (C) 2015 Sami Yessou
This program comes with ABSOLUTELY NO WARRANTY;
This is free software, and you are welcome to redistribute it under certain conditions*/
 
 
$db=mysql_connect("localhost","user","password") or die ("Can't connect to db");
mysql_select_db("database") or die ("Can't find db");
$sql= "SELECT * FROM WigleWifiDB";
$ris=mysql_query($sql) or die("query failed");

   while ($riga = mysql_fetch_array($ris)) 
      {
		 
		  if($riga['MAC']=="WigleWifi-1.4"){}
		  if($riga['Latitude']=="board=MSM8974"){}
		  else{
		  $bssid = substr($riga['MAC'], 0, 5);
        echo ",['".$riga['MAC']."',".$riga['Latitude'].",".$riga['Longitude'].",2]";
      
	 }
      }?>
