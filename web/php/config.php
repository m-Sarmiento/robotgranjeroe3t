<?php
    // config.php
    //Este archivo permite la conexion con la base de datos
    // Credenciales
    $dbhost = "localhost";
    $dbuser = "root";//"1143405";
    $dbpass = "";//"123qweasd";
    $dbname = "1143405";
    // Conexión con la base de datos
    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
    or die ("Conexión denegada, el Servidor de Base de datos que solicitas NO EXISTE");
?>
