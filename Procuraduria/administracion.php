<?php
    session_start();
    require_once("dompdf/dompdf_config.inc.php");
    include('php_conexion.php'); 
    if(!$_SESSION['tipo_usu']=='a' or !$_SESSION['tipo_usu']=='ca'){
      header('location:error.php');
    }
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
             <link href="images/icono.png" rel="shortcut icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administracion</title>
 
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

body {
  
  background-image: url(images/fondo.jpg);
}
.well{
  background: hsla(0,60%,20%,0.2); 

}

  
  
</style>  
  <body>
   
    


  
  


         
  
   




    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="/jquery.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>