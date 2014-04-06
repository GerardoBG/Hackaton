<?php
$server="localhost"; /* Nuestro server mysql */
$database="prueba"; /* Nuestra base de datos */
$dbpass=""; /*Nuestro password mysql */
$dbuser="root"; /* Nuestro user mysql */
$link= mysql_connect($server,$dbuser, $dbpass) or die ("no estan bien los datos".mysql_error());
mysql_select_db($database, $link) or die ("no se pudo conectar ".mysql_error());
 	
	$fecha_nac=$_REQUEST["nacimiento"];
	$nombre=$_REQUEST["nombre"]; 
	$apPat=$_REQUEST["apPat"];
	$apMat=$_REQUEST["apMat"];
	$edad=$_REQUEST["edad"];
	$genero=$_REQUEST["sexo"];
	$numero=$_REQUEST["numero"];
	$calle  =$_REQUEST["calle"];
	$colonia=$_REQUEST["colon"];
	$fecha_asu=$_REQUEST["fecha_per"];
	$acompanado=$_REQUEST["acompanado"];
	$hora_per=$_REQUEST["hora_per"];
	$senas=$_REQUEST["senas"];
	$latitud=$_REQUEST["latitud"];
	$longitud=$_REQUEST["longitud"];
	$imagen=$_REQUEST["imagen"];
	$lugar=$_REQUEST["lugar"];
								       		

			$sql=" INSERT INTO per_extraviada ( fecha_nac, nombre, apPat,apMat,
			edad,genero,calle,numero,fecha_ausencia,colonia,
			acompanado,hora,seniasparticulares,foto,latitud,longitud,ultimo_lugar) VALUES ('$fecha_asu','$nombre','$apPat','$apPat','$edad',
			'$genero','$calle','$numero','$fecha_asu','$acompanado','$colonia','$hora_per','$senas','$imagen','$latitud','$longitud','$lugar')";
			
			$inserta = mysql_query($sql,$link)or die(mysql_error());		
			
			
?>
<!DOCTYPE html>
<html lang="es">
  <head>
          <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>

         <link href="images/icono.png" rel="shortcut icon">
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBS6hmzoYF7TyEVAKOnn0Ul3Kxw-DhIrUk&sensor=false">
    </script>
    <meta charset="utf-8">
    <title>Registrar extraviado</title>
    <!-- CSS de Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
 
    <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php include("includes/menu.php"); ?>
      </head>
  <style type="text/css">  
body {
  
  background-image: url(images/fancy_deboss.png);
}
.well{
  background: hsla(0,90%,0%,0.2); 

}
</style>  
  
    <body onload="inicializar()">
    <br><br>
<div class="container well" style=" width: 50%;" >
 <p align="justify">Su denuncia ha sido registrada exitósamente, con el número de <strong>folio: ? </strong>. Su solicitud sera respondida, en un tiempo no máximo a dos dìas habiles. <br><br>Favor de revisar su correo electrónico o consultar la situación de su tramite en la página web de esta procuraduría.</p>
<center> <a href="index.php" class="btn btn-default"  style=" right:auto;">Trámite concluido</a></center>
</div>

    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="js/jquery.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
