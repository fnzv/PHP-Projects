
<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Personal WiFi Tracker</title> 
  <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
</head> 
<body>
  <div id="map" style="width: 100%; height: 900px;"></div>

  <script type="text/javascript">

    var locations = [
      ['aaa',13.72777607,13.4024537,5]
          <?php 
$db=mysql_connect("localhost","user","password") or die ("Can't connect to the db");
mysql_select_db("database") or die ("Can't find db");
$sql= "SELECT * FROM WigleWifiDB"; 
$ris=mysql_query($sql) or die("query failed");
$i=0;
   while ($riga = mysql_fetch_array($ris)) 
      { $i++;
	 	  if($riga['Type']=="GSM"){ 
	 	     
	 	      $bssid = substr($riga['BSSID'], 0, 5);
        echo ",['".$riga['BSSID']."',".$riga['Latitude'].",".$riga['Longitude'].",2]";
	 	     array_push($gsm,$i); //save gsm tower
	 	  }
		  if($riga['MAC']=="WigleWifi-1.4"){} //*remove this line since i imported wifiwigle .csv
		  if($riga['Latitude']=="board=MSM8974"){} // *
		  else{
		  $bssid = substr($riga['BSSID'], 0, 5);
        echo ",['".$riga['BSSID']."',".$riga['Latitude'].",".$riga['Longitude'].",2]";
	 }
      }?>
    

    
    
    
    ];
function isInArray(value, array) {
  return array.indexOf(value) > -1;
}


    var map = new google.maps.Map(document.getElementById('map'), {   //elemento mappa in div
      zoom: 14, // zoom mappa
      center: new google.maps.LatLng(13.6960255, 13.4177808), //centra la mappa nelle coordinate
      mapTypeId: google.maps.MapTypeId.SATELLITE
      //tipo mappa (ROADMAP ,SATELLITE ,HYBRID ,TERRAIN )
    });
    


    var infowindow = new google.maps.InfoWindow();  //small text

    var marker, i;

    for (i = 0; i < locations.length; i++) {  //per ogni marker
    
       
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        icon: 'wifi.png', // optional icon to make the map look cool
        /*    icon: {
      path: google.maps.SymbolPath.CIRCLE,
      scale: 10
    }*/
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) { //aggiunge il testo nel marker con l'evento del click 
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
</body>
</html>
