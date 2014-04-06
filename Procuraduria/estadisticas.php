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

  .bien{
    color: black;
    text-decoration:none;
  }
  .bien:hover{
    color:black;
  }
  
</style>  
  <body>

  
   
    
<div class="container">

      <ul class="nav nav-tabs">
                    <li class="active"><a class="bien" href="#home2" data-toggle="tab">Personas perdidas por colonia</a></li>
                    <li><a class="bien" href="#profile2" data-toggle="tab">% de personas perdidas por edad</a></li>
                    <li><a class="bien" href="#messages2" data-toggle="tab">Cantidad de hombres o mujeres perdidas</a></li>
                    <li><a class="bien" href="#settings2" data-toggle="tab">Personas encontradas</a></li>
      </ul>

  
    <div class="tab-content">
              <div class="tab-pane fade in active" id="home2"><iframe src="graficas/grafica2.html" frameborder="0" scrolling="auto" name="admin" width="100%" height="500"></iframe></div>
              <div class="tab-pane fade" id="profile2"><iframe src="graficas/grafica3.html" frameborder="0" scrolling="auto" name="admin" width="100%" height="500"></iframe></div>
              <div class="tab-pane fade" id="messages2"><iframe src="graficas/grafica4.html" frameborder="0" scrolling="auto" name="admin" width="100%" height="500"></iframe></div>
              <div class="tab-pane fade" id="settings2"><iframe src="graficas/grafica5.html" frameborder="0" scrolling="auto" name="admin" width="100%" height="500"></iframe></div>
      </div>
  </div>    


         
  
   




    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="js/jquery.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>