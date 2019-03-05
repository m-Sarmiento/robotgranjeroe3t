<?php
//programa con funciones para exportar datos en csv y json
function json($posts) {
  $fp = fopen('php://output','w');
  fwrite($fp, json_encode($posts));
  fclose($fp);
}

function csv($posts)
{
  header("Pragma: public");
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  header('Content-type: text/csv');
  header("Content-Disposition: attachment;filename=file.csv");
  header("Content-Transfer-Encoding: binary");

  $fp = fopen('php://output', 'a');
  foreach ($posts as $fields) {
      fputcsv($fp, $fields);
  }
  fclose($fp);
}

?>
