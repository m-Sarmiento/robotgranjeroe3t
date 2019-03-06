<?php
//funciones para facilitar la optencion de informacion del servidor
class JardinTable{

    public $IDr = 0 ;
    //Función que crea y devuelve un objeto de conexión a la base de datos y chequea el estado de la misma.
    function conectarBD(){
            $server = "localhost";
            $usuario = "1143405";
            $pass = "123qweasd";
            $BD = "1143405";
            //variable que guarda la conexión de la base de datos
            $conexion = mysqli_connect($server, $usuario, $pass, $BD);
            //Comprobamos si la conexión ha tenido exito
            if(!$conexion){
               echo 'Ha sucedido un error inexperado en la conexion de la base de datos<br>';
            }
            //devolvemos el objeto de conexión para usarlo en las consultas
            return $conexion;
    }
    /*Desconectar la conexion a la base de datos*/
    function desconectarBD($conexion){
            //Cierra la conexión y guarda el estado de la operación en una variable
            $close = mysqli_close($conexion);
            //Comprobamos si se ha cerrado la conexión correctamente
            if(!$close){
               echo 'Ha sucedido un error inexperado en la desconexion de la base de datos<br>';
            }
            //devuelve el estado del cierre de conexión
            return $close;
    }

    //Devuelve un array multidimensional con el resultado de la consulta
    function getArraySQL($sql){
        //Creamos la conexión
        $conexion = $this->conectarBD();
        //generamos la consulta
        if(!$result = mysqli_query($conexion, $sql)) die();
        $rawdata = array();
        //guardamos en un array multidimensional todos los datos de la consulta
        $i=0;
        while($row = mysqli_fetch_array($result))
        {
            //guardamos en rawdata todos los vectores/filas que nos devuelve la consulta
            $rawdata[$i] = $row;
            $i++;
        }
        //Cerramos la base de datos
        $this->desconectarBD($conexion);
        //devolvemos rawdata
        return $rawdata;
    }

    function getPlantInfo($p){
        //Creamos la consulta
        $sql = "SELECT id,time,temp,temp_amb,humidity,humidity_amb FROM jardin_2 WHERE plant=$p;";
        //obtenemos el array con toda la información
        return $this->getArraySQL($sql);
    }

    function getHumidityInfo($p){
        //Creamos la consulta
        $sql = "SELECT id,time,humidity, FROM jardin_2 WHERE plant=$p;";
        //obtenemos el array con toda la información
        return $this->getArraySQL($sql);
    }
	
	function getHumidityAmbInfo($p){
        //Creamos la consulta
        $sql = "SELECT id,time,humidity_amb, FROM jardin_2 WHERE plant=$p;";
        //obtenemos el array con toda la información
        return $this->getArraySQL($sql);
    }

    function getTempInfo($p){
        //Creamos la consulta
        $sql = "SELECT id,time,temp FROM jardin_2 WHERE plant=$p;";
        //obtenemos el array con toda la información
        return $this->getArraySQL($sql);
    }

	function getTempAmbInfo($p){
        //Creamos la consulta
        $sql = "SELECT id,time,temp_amb FROM jardin_2 WHERE plant=$p;";
        //obtenemos el array con toda la información
        return $this->getArraySQL($sql);
    }
	
    function getImgInfo($p){
        //Creamos la consulta
        $sql = "SELECT id,time,photo FROM jardin WHERE plant=$p;";
        //obtenemos el array con toda la información
        return $this->getArraySQL($sql);
    }

    function getAllInfo(){
        //Creamos la consulta
        $sql = "SELECT * FROM jardin_2;";
        //obtenemos el array con toda la información
        return $this->getArraySQL($sql);
    }
}

?>
