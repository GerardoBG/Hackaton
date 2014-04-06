<!DOCTYPE html>
<?php

$server="localhost"; // Nuestro server mysql 
$database="prueba"; // Nuestra base de datos 
$dbpass=""; //Nuestro password mysql 
$dbuser="root"; // Nuestro user mysql
$link= mysql_connect($server,$dbuser, $dbpass) or die ("no estan bien los datos".mysql_error());
mysql_select_db($database, $link) or die ("no se pudo conectar ".mysql_error());
  
  $nombre=$_REQUEST["nombre"]; 
  $apPat=$_REQUEST["apPat"];
  $apMat=$_REQUEST["apMat"];
  $parentesco=$_REQUEST["parestesco"];
  $calle=$_REQUEST["calle"];
  $numero=$_REQUEST["numero"];
  $colonia=$_REQUEST["colonia"];
  $email=$_REQUEST["email"];
  $telefono=$_REQUEST["telefono"];
  
     
      $sql="INSERT INTO denunciante(nombre, apPat,apMat,parentesco,calle,numero,colonia,tel_celular,correo) VALUES ('$nombre','$apPat','$apMat',
      '$parentesco','$calle','$numero','$colonia','$telefono','$email');";
      $inserta = mysql_query($sql,$link)or die(mysql_error());    
     
      
?>

<html lang="es">
  <head>
         <link href="images/icono.png" rel="shortcut icon">
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBS6hmzoYF7TyEVAKOnn0Ul3Kxw-DhIrUk&sensor=false">
    </script>
 <script type="text/javascript">
      
            var mapa;
            var marcador;
            var geocoder;            

            function inicializar(){    
            geocoder = new google.maps.Geocoder();        
            var myLatlng = new google.maps.LatLng(17.063658983819206, -96.72999286217953);
      //var myLatlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude); 
           var mapOptions = {
                  zoom: 15,
                  center: myLatlng,
          mapTypeControl: false,  
        navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},  
                  mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            mapa = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);    

            google.maps.event.addListener(mapa, 'click', function (event){
                creaMarcador(event.latLng)
                }); 

           }

            function creaMarcador(localizacion){                
                // Crear marcador
                   if (marcador) marcador.setMap(null);                   
                   marcador = new google.maps.Marker({
                   position: localizacion,
                   draggable: true, 
                   map: mapa
                });
                mapa.setCenter(localizacion);
                 // Rellenar X e Y
                document.formulario.latitud.value=localizacion.lat();
                document.formulario.longitud.value=localizacion.lng();

                // Modificar X e Y al mover
                google.maps.event.addListener(marcador,'drag',function(event){
                    document.formulario.latitud.value=event.latLng.lat();
                    document.formulario.longitud.value=event.latLng.lng();
                    //mapa.setCenter(localizacion);
                });

            }

            function direc(){            
            var dire = document.getElementById("direccion").value;            
              geocoder.geocode( {'address': dire}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                  mapa.setCenter(results[0].geometry.location);
                  creaMarcador(results[0].geometry.location);
              }
             else {
                  alert("Geocode was not successful for the following reason: " + status);
            }                
            });

            }
            </script>

        <script  type="text/javascript" src="js/file.js"></script>


    <meta charset="iso-8359-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
  
<script>
  function subirImagen(){
    self.name='opener';
    remote=open('gestionimagen.php','remote', 'width=400, height=150, location=no, scrollbars=yes, menubars=no, toolbars=no, resizable=yes, fullscreen=no, status= yes');
    remote.focus();
    }
</script> 


    <body onload="inicializar()">
<div class="container well" >

  <form method="post" action="ok.php"  name="formulario" id="form1">
      <h3><strong> Datos generales sobre la persona extraviada </strong></h3>
       <img name="foto" src="images/perfil.jpg"  width="200"  height="220" class="img-polaroid">

		<input type="hidden" name="longitud" value="">
        <input type="hidden" name="latitud" value="">
        <input type="text" class="form-control" style="width:17.8%;" name="imagen" id="imagen" />
      <input type="button" class="btn btn-primary btn-sm" name="button" id="button" value="Subir Imagen" onclick="javascript:subirImagen();"/>
        </div>

  
  
    <div class=" container well">
           <div class="row" >
            <h3 style="margin-top:-40px;"><span class="label label-default">Datos generales de la persona extraviada </span></h3>
                  <div class="col-xs-4">   
                            <div class="input-group" style="width:90%;">   
                                        <label>Nombre(s)</label>      
                                        <input  name="nombre"type="text" class="form-control" placeholder="Nombre de la persona extraviada" required>
                            </div>
                   </div>
                   <div class="col-xs-4"> <div class="input-group" style="width:90%;">  
                               <label>Apellido paterno</label> 
                              <input name="apPat"type="text" class="form-control" placeholder="Introduzca el apellido paterno" required>
                               </div>  
                   </div>
                   <div class="col-xs-4"> 
                               <div class="input-group" style="width:90%;">  
                               <label>Apellido materno</label> 
                               <input name="apMat"type="text" class="form-control" placeholder="Introduzca el apellido materno" required>
                               </div> 
                   </div>

          </div>
          <div class="row">  
                <div class="col-xs-4"> 
                     <label>Edad</label>
                     <input name="edad"class="form-control" type="number" id="edad" min="0" max="120" style="width:20%;">  
                </div>     
                <div class="col-xs-4"> 
                     <label>Sexo</label>
                      <select name="sexo" class="form-control" style="width:60%;">
                              <option value=""></option>
                              <option value="masculino">Masculino</option>
                              <option value="femenino">Femenino</option>
                      </select>
                </div> 
                <div class="col-xs-4"> 
                      <label> Fecha de nacimiento: </label>
                      <input name="nacimiento" type="date" class= "input-group"id="fecha" >
                </div>


          </div>

    </div>

<div class="container well">  
         <div class="row" >
          <h3 style="margin-top:-40px;"><span class="label label-default">Datos de domicilio</span></h3>
          
                  <div class="col-xs-4">   
                            <div class="input-group" style="width:90%;">   
                                        <label>Colonia</label>      
                                        <input name="colon"type="text" class="form-control" placeholder="Nombre del municipio" required>
                            </div>
                   </div>
                   <div class="col-xs-4"> <div class="input-group" style="width:90%;">  
                               <label>Calle</label> 
                              <input name="calle" type="text" class="form-control" placeholder="Nombre de la colonia" required>
                               </div>  
                   </div>
                   <div class="col-xs-4"> 
                        <label>Numero</label> 
                               <div class="input-group" style="width:90%;">  
                                <input  name="numero" class="form-control" type="number" id="numero" min="0" max="10000" style="width:60%;">
                               </div> 
                   </div>

          </div>
</div>


<div class="container well">  
         <div class="row" >
          <h3 style="margin-top:-40px;"><span class="label label-default">Datos del momento en que se perdió</span></h3>
                <div class="col-xs-4"> 
                       <label> Fecha en que se perdió: </label>
                      <input name="fecha_per" class= "input-group" type="date"  >
                      <br>
                      <label> Hora en que se perdió: </label>
                      <input name="hora_per" class= "input-group" type="time">
                </div>
                <div class="col-xs-4">
                    <label>La persona extraviada iba Acompañado?</label> 
                      <input name="acompanado"type="text" class="form-control" placeholder="Persona con quien iba el dia en que se perdió" >
                      </div>
                <div class="col-xs-4">
                      <label>Señas particulares</label>            
                      <textarea name="senas"class="form-control" rows="5" placeholder="Anote sus señas particulares"></textarea>
                </div>  
         </div> 
</div>   
<div class="container well "><!--En esta seccion ira la parte del mapa para ubicar donde fue visto por ultima vez-->
  <div class="row" >
     <div class="col-xs-4">
       <input type="text" class="form-control" id="direccion" name="lugar" placeholder="Calle, numero, municipio, estado"  onchange="direc()">
         </div>
          <div class="col-xs-8">
        <h3 style="margin-top:-40px;"><span class="label label-default">¿Dónde fue visto por ultima vez?</span></h3>  
     <div id="map_canvas" style="width:90%;height:500px">&nbsp;</div>
      </div>



</div> 
</div>        


<center>
<input class="btn btn-primary" type="submit" value="Aceptar">
<input class="btn btn-default" type="reset" value="Cancelar"></center>
</form>
    </div> 



    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="js/jquery.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>