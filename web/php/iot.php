<?php
    // iot.php
    //este programa lee la informacion envia por POST al servidor   TO DO: validar que la informacion cumpla requistors minimos, revisar origen de la informacion
    // Importamos la configuración
    require("config.php");
    // Leemos los valores que nos llegan por post
    $time = mysqli_real_escape_string($con, $_POST['time']);
    $temp = mysqli_real_escape_string($con, $_POST['temp']);
	$temp_amb = mysqli_real_escape_string($con, $_POST['temp_amb']);
    $humidity = mysqli_real_escape_string($con, $_POST['humidity']);
	$humidity_amb = mysqli_real_escape_string($con, $_POST['humidity_amb']);
    $plant = mysqli_real_escape_string($con, $_POST['plant']);
	$photo = mysqli_real_escape_string($con, $_POST['photo']);
    // Esta es la instrucción para insertar los valores
    $query = "INSERT INTO jardin_2 (time,temp,temp_amb,humidity,humidity_amb,plant,photo) VALUES('".$time."','".$temp."','".$temp_amb."','".$humidity."','".$humidity_amb."','".$plant."','".$photo."');";
    mysqli_query($con, $query);
    mysqli_close($con);
?>
