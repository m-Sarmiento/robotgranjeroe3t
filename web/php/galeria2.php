<!--Este archivo me permite graficar la humedad de cuarquier planta, selencionando la planta mediante GET-->
<!--TO DO: unidades, idioma, -->

<HTML>
<BODY>

<meta charset="utf-8">

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.fancybox.js"></script>
<link rel="stylesheet" href="../css/jquery.fancybox.css" type="text/css" media="screen" />
			<div class="gallery" align="center" id="contenedor" style="max-width:100%;height:auto;">
				<?php
				require_once("JardinClass.php");
				//Creamos un objeto de la clase
				$rand = new JardinTable();
				//Leemos la planta que se graficara
				$p = $_GET['planta'];
				//obtenemos la información de la tabla Jardin
				$rawdata = $rand->getImgInfo($p);
				//nos creamos dos arrays para almacenar el tiempo y el
				$timeArray;
				$dataArray;
				//en un bucle for obtenemos en cada iteración el valor númerico y
				//el TIMESTAMP del tiempo y lo almacenamos en los arrays
        $numberphotos=count($rawdata);
        ?>
        <style type="text/css">
        .gallery img {
            width: <?php echo 80/$numberphotos; ?>%;
            height: auto;
            border-radius: 5px;
            cursor: pointer;
            transition: .3s;
            <font color="#ff0000">text</font>
        }
        </style>
        <?php
				for($i = 0 ;$i<count($rawdata);$i++){
					$t=$rawdata[$i][1];
					$dataArray[$i]=$rawdata[$i][2];
					$date = new DateTime($t);
					//ALMACENAMOS EL TIMESTAMP EN EL ARRAY
					$timeArray[$i] = $date->getTimestamp();
					//$posts[$i+1]= array('t'=>$timeArray[$i],'humidity'=>$dataArray[$i],'plant'=> $p);
					//$imageThumbURL = 'uploads/thumb/'.$dataArray[$i];
					$imageURL = '../uploads/'.$dataArray[$i];
				?>
					<a href="<?php echo $imageURL; ?>" class="fancybox" data-fancybox-group="gallery" caption="Imagen <?php echo $i+1; ?>" title="Fecha de la imagen: <?php echo date('Y-m-d H:i:s',$timeArray[$i]); ?>">
						<img src="<?php echo $imageURL; ?>" id="<?php echo $i; ?>" value="<?php echo $i; ?>" class="imagenGaleria" alt="<?php echo $	$timeArray[$i]; ?>" />

					</a>
				<?php }
				 ?>
			</div>
			<script>
			$().ready(function(){
				$('.fancybox').fancybox({keyboard:true});
			}	);
			</script>
</BODY>
</html>
