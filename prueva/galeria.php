<!DOCTYPE>
<!--protopipo galeria         TO DO: all-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Imágenes dinámicas de una carpeta en php</title>
</head>

<body>
<?php
    $directory="img/1";
    $dirint = dir($directory);
    while (($archivo = $dirint->read()) !== false)
    {
        if (preg_match("/gif/", $archivo) || preg_match("/jpg/", $archivo) || preg_match("/png/", $archivo)){
            echo '<img src="'.$directory."/".$archivo.'">'."\n";
        }
    }
    $dirint->close();
?>
</body>
</html>
