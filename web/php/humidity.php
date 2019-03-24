<!--Este archivo me permite graficar la humedad de cuarquier planta, selencionando la planta mediante GET-->
<!--TO DO: unidades, idioma, -->

<HTML>
<BODY>
<meta charset="utf-8">
<?php
require_once("JardinClass.php");
//Creamos un objeto de la clase
$rand = new JardinTable();
//Leemos la planta que se graficara
$p = $_GET['planta'];
//obtenemos la información de la tabla Jardin
$rawdata = $rand->getHumidityInfo($p);
//nos creamos dos arrays para almacenar el tiempo y el valorhumedad
$timeArray;
$dataArray;
//en un bucle for obtenemos en cada iteración el valor númerico y
//el TIMESTAMP del tiempo y lo almacenamos en los arrays
for($i = 0 ;$i<count($rawdata);$i++){
    $t=$rawdata[$i][1];
    $dataArray[$i]=$rawdata[$i][2];
    $date = new DateTime($t);
    //ALMACENAMOS EL TIMESTAMP EN EL ARRAY
    $timeArray[$i] = $date->getTimestamp()*1000+2*3600000;
    //$posts[$i+1]= array('t'=>$timeArray[$i],'humidity'=>$dataArray[$i],'plant'=> $p);
}
?>
<div id="contenedor" style="max-width:100%;height:auto;">Su navegador no soporta Javascript</div>
<script src="https://code.jquery.com/jquery.js"></script>
    <!-- Importo el archivo Javascript de Highcharts directamente desde su servidor -->
<script src="http://code.highcharts.com/stock/highstock.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script>
chartCPU1 = new Highcharts.StockChart({
    chart: {
        renderTo: 'contenedor'
        //defaultSeriesType: 'spline'

    },
    rangeSelector : {
        enabled: false
    },
    title: {
        text: 'Gráfica Humedad , planta <?php echo $p ?>'
    },
    xAxis: {
        type: 'datetime'
        //tickPixelInterval: 150,
        //maxZoom: 20 * 1000
    },
    yAxis: {
        minPadding: 0.2,
        maxPadding: 0.2,
        title: {
            text: 'Valores',
            margin: 10
        }
    },
    series: [{
        name: 'valor',
        data: (function() {
                // generate an array of random data
                var data = [];
                <?php
                    for($i = 0 ;$i<count($rawdata);$i++){
                ?>
                data.push([<?php echo $timeArray[$i];?>,<?php echo $dataArray[$i];?>]);
                <?php } ?>
                return data;
            })()
    }],
    credits: {
            enabled: false
    }
});

</script>
</BODY>
</html>
