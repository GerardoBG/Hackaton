<?php
    session_start();
    require_once("dompdf/dompdf_config.inc.php");
    include('php_conexion.php'); 
    if(!$_SESSION['tipo_usu']=='a' or !$_SESSION['tipo_usu']=='ca'){
      header('location:error.php');
    }
    ?>


<!DOCTYPE html>
<html lang="es">
  <head>
  <link href="images/icono.png" rel="shortcut icon">
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Denuncias recientes</title>
 
    <!-- CSS de Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
 
    <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php include("includes/menu2.php"); ?>  
    
  </head>
  <style type="text/css">  

body{
  
  background-image: url(images/fancy_deboss.png);
}
.well{
  background: hsla(0,90%,0%,0.2); 

}  
</style>  
  
    <body onload="inicializar()">
<div class="container well" >

            <?php

$maxRows_Recordset1 = 30;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;


$query_Recordset1 = "SELECT * FROM per_extraviada where estatus='No procesado' and edad>0 ORDER BY fecha_ausencia ASC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>

     <div  style="margin:0 auto;heigth:400px; overflow: auto;">
    <table width="150" border="1" cellspacing="1" cellpadding="2" class="table table-hover" >
 <tr class="active">
    <th scope="col">Folio</th>
    <th scope="col">Nombre</th>
    <th scope="col">Edad</th>
    <th scope="col">Sexo</th>
    <th scope="col">Fecha de registro</th>
    <th scope="col">Imprimir</th>
  </tr>

<?php $i= 0 ; do { ?>
	<tr class="warning">
    
    <td>  <?php echo $row_Recordset1['folio_denuncia']; ?></td>
		<td>  <?php echo $row_Recordset1['nombre']; ?> </td>
		<td>	<?php echo $row_Recordset1['edad']; ?></td>
    <td>  <?php echo $row_Recordset1['genero']; ?></td>
    <td>  <?php echo $row_Recordset1['fecha_ausencia']?></td>

		<td> 
<?php  $x=$row_Recordset1['edad'];
        if ($x<=10) {?>
          <a style =" text-decoration:none;"class="btn btn-danger btn-sm" href="phpprueba.php?recordID='<?php echo $row_Recordset1['folio_denuncia']; ?>'" >Generar expediente</a>
      <?php 
    }
      else{
      ?>
          <a style =" text-decoration:none;" class="btn btn-primary btn-sm" href="phpprueba.php?recordID='<?php echo $row_Recordset1['folio_denuncia']; ?>'" >Generar expediente</a>
      <?php 
      }
?>

	</tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));?> 
  
   <tr>
    <td></td>
    <td></td>
  </tr> 
</table>
</div>
<?php
mysql_free_result($Recordset1);
?>    
</div> 

    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="js/jquery.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>