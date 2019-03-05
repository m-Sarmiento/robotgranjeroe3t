
<?php
//este programa permite descragar informacion en formato json o csv de la base de datos
//To DO: descargar informacion de acuerdo a la fecha
$p= "";
$q= 0;
$r= "";
if(isset($_GET['plant'])) {
    $q = $_GET['plant'];
}
if(isset($_GET['prop'])) {
    $r = $_GET['prop'];
}
if(isset($_GET['type'])) {
    $p = $_GET['type'];
}

require_once("JardinClass.php");
require('export.php');

$rand = new JardinTable();
$rawdata = $rand->getAllInfo();

if ($p == 'json' && $q ==0 && $r =="") {            //listo ########################################################
  $rawdata = $rand->getAllInfo();
  $posts[0]= array('tiempo' ,'ph', 'temperatura', 'humedad','ruta imagen','numero planta');
  for($i = 0 ;$i<count($rawdata);$i++){
      $timeArray[$i]=$rawdata[$i][1];
      $phArray[$i]=$rawdata[$i][2];
      $tempArray[$i]=$rawdata[$i][3];
      $humidityArray[$i]=$rawdata[$i][4];
      $imgArray[$i]=$rawdata[$i][5];
      $plantArray[$i]=$rawdata[$i][6];
      $posts[$i+1]= array('t'=>$timeArray[$i] ,'ph'=>$phArray[$i],'temp'=>  $tempArray[$i], 'humidity'=>$humidityArray[$i], 'img'=>$imgArray[$i], 'plant'=> $plantArray[$i]);
    }
    $p($posts);
} elseif ($p == 'json' && $q !=0 && $r =="") {      //listo ########################################################
  $rawdata = $rand->getPlantInfo($q);
  $posts[0]= array('tiempo' ,'ph', 'temperatura', 'humedad','numero planta');
  for($i = 0 ;$i<count($rawdata);$i++){
      $timeArray[$i]=$rawdata[$i][1];
      $phArray[$i]=$rawdata[$i][2];
      $tempArray[$i]=$rawdata[$i][3];
      $humidityArray[$i]=$rawdata[$i][4];
      $plantArray[$i]=$q;
      $posts[$i+1]= array('t'=>$timeArray[$i] ,'ph'=>$phArray[$i],'temp'=>  $tempArray[$i], 'humidity'=>$humidityArray[$i],'plant'=> $plantArray[$i]);
    }
    $p($posts);
}elseif ($p == 'json' && $q !=0 && $r =="temp") {
  $rawdata = $rand->getTempInfo($q);
  $posts[0]= array('tiempo' ,'temperatura','numero planta');
  for($i = 0 ;$i<count($rawdata);$i++){
      $timeArray[$i]=$rawdata[$i][1];
      $tempArray[$i]=$rawdata[$i][2];
      $plantArray[$i]=$q;
      $posts[$i+1]= array('t'=>$timeArray[$i] ,'temp'=>  $tempArray[$i], 'plant'=> $plantArray[$i]);
    }
    $p($posts);
}elseif ($p == 'json' && $q !=0 && $r =="ph") {
  $rawdata = $rand->getPhInfo($q);
  $posts[0]= array('tiempo' ,'ph','numero planta');
  for($i = 0 ;$i<count($rawdata);$i++){
      $timeArray[$i]=$rawdata[$i][1];
      $phArray[$i]=$rawdata[$i][2];
      $plantArray[$i]=$q;
      $posts[$i+1]= array('t'=>$timeArray[$i] ,'ph'=>  $phArray[$i], 'plant'=> $plantArray[$i]);
    }
    $p($posts);
}elseif ($p == 'json' && $q !=0 && $r =="humidity") {
  $rawdata = $rand->getHumidityInfo($q);
  $posts[0]= array('tiempo' ,'humedad','numero planta');
  for($i = 0 ;$i<count($rawdata);$i++){
      $timeArray[$i]=$rawdata[$i][1];
      $humidityArray[$i]=$rawdata[$i][2];
      $plantArray[$i]=$q;
      $posts[$i+1]= array('t'=>$timeArray[$i] ,'humidity'=>  $humidityArray[$i], 'plant'=> $plantArray[$i]);
    }
    $p($posts);
}elseif ($p == 'csv' && $q ==0 && $r =="") {        //listo ########################################################
  $rawdata = $rand->getAllInfo();
  $posts[0]= array('tiempo' ,'ph', 'temperatura', 'humedad','ruta imagen','numero planta');
  for($i = 0 ;$i<count($rawdata);$i++){
      $timeArray[$i]=$rawdata[$i][1];
      $phArray[$i]=$rawdata[$i][2];
      $tempArray[$i]=$rawdata[$i][3];
      $humidityArray[$i]=$rawdata[$i][4];
      $imgArray[$i]=$rawdata[$i][5];
      $plantArray[$i]=$rawdata[$i][6];
      $posts[$i+1]= array('t'=>$timeArray[$i] ,'ph'=>$phArray[$i],'temp'=>  $tempArray[$i], 'humidity'=>$humidityArray[$i], 'img'=>$imgArray[$i], 'plant'=> $plantArray[$i]);
    }
    $p($posts);
}elseif ($p == 'csv' && $q !=0 && $r =="") {
  $rawdata = $rand->getPlantInfo($q);
  $posts[0]= array('tiempo' ,'ph', 'temperatura', 'humedad','numero planta');
  for($i = 0 ;$i<count($rawdata);$i++){
      $timeArray[$i]=$rawdata[$i][1];
      $phArray[$i]=$rawdata[$i][2];
      $tempArray[$i]=$rawdata[$i][3];
      $humidityArray[$i]=$rawdata[$i][4];
      $plantArray[$i]=$q;
      $posts[$i+1]= array('t'=>$timeArray[$i] ,'ph'=>$phArray[$i],'temp'=>  $tempArray[$i], 'humidity'=>$humidityArray[$i],'plant'=> $plantArray[$i]);
    }
    $p($posts);
}elseif ($p == 'csv' && $q !=0 && $r =="temp") {
  $rawdata = $rand->getTempInfo($q);
  $posts[0]= array('tiempo' ,'temperatura','numero planta');
  for($i = 0 ;$i<count($rawdata);$i++){
      $timeArray[$i]=$rawdata[$i][1];
      $tempArray[$i]=$rawdata[$i][2];
      $plantArray[$i]=$q;
      $posts[$i+1]= array('t'=>$timeArray[$i] ,'temp'=>  $tempArray[$i], 'plant'=> $plantArray[$i]);
    }
    $p($posts);
}elseif ($p == 'csv' && $q !=0 && $r =="ph") {
  $rawdata = $rand->getPhInfo($q);
  $posts[0]= array('tiempo' ,'ph','numero planta');
  for($i = 0 ;$i<count($rawdata);$i++){
      $timeArray[$i]=$rawdata[$i][1];
      $phArray[$i]=$rawdata[$i][2];
      $plantArray[$i]=$q;
      $posts[$i+1]= array('t'=>$timeArray[$i] ,'temp'=>  $phArray[$i], 'plant'=> $plantArray[$i]);
    }
    $p($posts);
}elseif ($p == 'csv' && $q !=0 && $r =="humidity") {
  $rawdata = $rand->getHumidityInfo($q);
  $posts[0]= array('tiempo' ,'humedad','numero planta');
  for($i = 0 ;$i<count($rawdata);$i++){
      $timeArray[$i]=$rawdata[$i][1];
      $humidityArray[$i]=$rawdata[$i][2];
      $plantArray[$i]=$q;
      $posts[$i+1]= array('t'=>$timeArray[$i] ,'humidity'=>  $humidityArray[$i], 'plant'=> $plantArray[$i]);
    }
    $p($posts);
}
?>
