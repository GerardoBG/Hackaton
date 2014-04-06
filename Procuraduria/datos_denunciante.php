

<!DOCTYPE html>
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


    <meta charset="utf-8">
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
  
    <body onload="inicializar()">
<div class="container well" >
      <h3><strong> DATOS DE LA PERSONA QUE DENUNCIA.</strong></h3>
      <form method="post" action="registra_perdido.php">
      
      <div class="well">
             <div class="row" >
                    <h3 style="margin-top:-40px;"><span class="label label-default">Datos generales de la persona que Denuncia.</span></h3>
                    <div class="col-xs-4">   
                            <div class="input-group" style="width:90%;">   
                                    <label>Nombre(s)</label>      
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre de la persona quien denuncia" required>
                            </div>

                             <label>Parentesco</label>
                              <select name="parestesco" class="form-control" style="width:90%;" required>
                              <option value="">--Seleccione una opción--</option>
                              <option value="padre">Padre</option>
                              <option value="madre">Madre</option>
                              <option value="hijo(a)">Hijo(a)</option>
                              <option value="hermano(a)">Hermano(a)</option>
                              <option value="tio(a)">Tío(a)</option>
                              <option value="abuelo(a)">Abuelo(a)</option>
                              <option value="padrastro">Padrastro</option>
                              <option value="madrastra">Madrastra</option>
                              <option value="primo(a)">Primo(a)</option>
                              <option value="sobrino(a)">Sobrino(a)</option>
                      </select>
                   </div>
                   <div class="col-xs-4"> 
                              <div class="input-group" style="width:90%;">  
                                    <label>Apellido paterno</label> 
                                    <input type="text" class="form-control" name="apPat" placeholder="Introduzca el apellido paterno" required>
                               </div>  
                   </div>
                   <div class="col-xs-4">
                               <div class="input-group" style="width:90%;">  
                                       <label>Apellido materno</label> 
                                       <input type="text" class="form-control" name="apMat" placeholder="Introduzca el apellido materno">
                               </div> 
                   </div>
              </div>
        </div>    
        <div class="well">
                <h3 style="margin-top:-40px;"><span class="label label-default">Datos del domicilio de la persona que denuncia.</span></h3>
                <div class="row" >
                      <div class="col-xs-4">  
                               <div class="input-group" style="width:90%;">  
                               <label>Calle</label> 
                               <input type="text" name="calle" class="form-control" placeholder="Introduzca la calle" required>
                               </div> 
                       </div>
                      <div class="col-xs-4">
                              <div class="input-group" style="width:90%;">  
                               <label>Número</label> 
                               <input type="text" name="numero" class="form-control" placeholder="Introduzca el numero de domicilio" required>
                               </div> 
                      </div>
                      <div class="col-xs-4">
                              <div class="input-group" style="width:90%;">  
                               <label>Colonia</label> 
                               <input type="text" name="colonia" class="form-control" placeholder="Introduzca el nombre de su colonia" required>
                               </div> 
                      </div>

                </div>
            </div>

        <div class="well">
                <h3 style="margin-top:-40px;"><span class="label label-default">Datos de contacto del denunciante.</span></h3>
                <div class="row" >
                          <div class="col-xs-4"> 
                               <div class="input-group" style="width:90%;">  
                               <label>Email</label> 
                               <input type="email" name="email" class="form-control" placeholder="Introduzca su correo electronico" required>
                               </div> 
                              
                           </div>
                           <div class="col-xs-4"> 
                               <div class="input-group" style="width:90%;">  
                               <label>Teléfono</label> 
                               <input type="tel" class="form-control" name="telefono" placeholder="Introduzca su numero de telefono" required>
                               </div>
                            </div>
                            <div class="col-xs-4"> 
                               
                            </div>

                </div>
        </div>

  </div>

<center>
      <input class="btn btn-primary" type="submit" value="Continuar..."> 

      <input class="btn btn-default" type="reset" value="Cancelar">
</center>
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