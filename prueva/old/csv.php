<?php
require_once("JardinClass.php");
$rand = new JardinTable();
$rawdata = $rand->getAllInfo();
$posts = array();
$posts[0]= array('tiempo' ,'ph', 'temperatura', 'humedad','ruta imagen','numero planta');
for($i = 0 ;$i<count($rawdata);$i++){
    $timeArray[$i]=$rawdata[$i][1];
    $idArray[$i]=$rawdata[$i][0];
    $phArray[$i]=$rawdata[$i][2];
    $tempArray[$i]=$rawdata[$i][3];
    $humidityArray[$i]=$rawdata[$i][4];
    $imgArray[$i]=$rawdata[$i][5];
    $plantArray[$i]=$rawdata[$i][6];
    $posts[$i+1]= array('t'=>$timeArray[$i] ,'ph'=>$phArray[$i],'temp'=>  $tempArray[$i], 'humidity'=>$humidityArray[$i], 'img'=>$imgArray[$i], 'plant'=> $plantArray[$i]);
  }


  $fp = fopen('php://output','w');
  fwrite($fp, json_encode($posts));
  fclose($fp);

?>
