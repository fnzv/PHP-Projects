<?php
//old proxy test script 

echo "<form name='form' action='proxy.php' method='get'>
Inserisci l'url del sito   <input type='text' name='testo' >
 <input type='submit' name='bottone' 
           value='Usa Proxy'/>
</form>";

if(isset($_GET['testo']))
{

$sito=$_GET['testo'];

$fp = fsockopen($sito, 80, $errno, $errstr, 30);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
   $out = "GET / HTTP/1.1\r\n";
    $out .= "Host: ".$sito."\r\n";
    $out .= "Connection: Close\r\n\r\n";
    fwrite($fp, $out);
    while (!feof($fp)) {
        echo fgets($fp, 1024);
    }
    fclose($fp);
}
}
?>
