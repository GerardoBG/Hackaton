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
	$latitud=$_REQUEST["senas"];
	$longitud=$_REQUEST["senas"];
	$imagen=$_REQUEST["imagen"];
								       		

			$sql=" INSERT INTO per_extraviada ( fecha_nac, nombre, apPat,apMat,
			edad,genero,calle,numero,fecha_ausencia,colonia,
			acompanado,hora,seniasparticulares,foto) VALUES ('$fecha_asu','$nombre','$apPat','$apPat','$edad',
			'$genero','$calle','$numero','$fecha_asu','$acompanado','$colonia','$hora_per','$senas','$imagen')";
			
			$inserta = mysql_query($sql,$link)or die(mysql_error());		
			
			
?>
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="js/jquery.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="js/bootstrap.min.js"></script>
