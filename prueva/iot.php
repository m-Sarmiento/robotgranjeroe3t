<?php
    // iot.php
    //este programa lee la informacion envia por POST al servidor   TO DO: validar que la informacion cumpla requistors minimos, revisar origen de la informacion
    // Importamos la configuración
    require("config.php");
    // Leemos los valores que nos llegan por GET
    $t = mysqli_real_escape_string($con, $_POST['t']);
    $ph = mysqli_real_escape_string($con, $_POST['ph']);
    $humidity = mysqli_real_escape_string($con, $_POST['humidity']);
    $temp = mysqli_real_escape_string($con, $_POST['temp']);
    $img = mysqli_real_escape_string($con, $_POST['img']);
    $plant = mysqli_real_escape_string($con, $_POST['plant']);
    // Esta es la instrucción para insertar los valores
    $query = "INSERT INTO jardin (t,ph,humidity,temp,img,plant) VALUES('".$t."','".$ph."','".$humidity."','".$temp."','".$img."','".$plant."');";
    mysqli_query($con, $query);
    mysqli_close($con);
?>
