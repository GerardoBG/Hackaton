
<?php
		session_start();
		include('php_conexion.php'); 
		$act="0";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
             <link href="images/icono.png" rel="shortcut icon">
    <meta charset="utf-8">
    <title>Entrar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {

      }


.container{
  display: none;
}


      .form-signin {
        
        max-width: 300px;
        padding: 39px 29px 29px;
        margin: 0 auto 20px;
        background: url(img/nav.png)0 0 repeat;
        
        -webkit-border-radius: 10px;
           -moz-border-radius: 10px;
                border-radius: 10px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05)
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 30px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
      footer{
        width:100%;
        margin:0 auto;
        color:#666;
        margin-top:0px; 
        text-align:center; 
        font-size:12px; 
        padding-bottom:5px;
        }
     .footer a:link, .footer a:visited {
          color:#ccc}
      .footer a:hover, .footer a:active {
          color:#fff}
       .page-header{
        background-image: url(images/bg_top1.jpg);
        
        margin: 0px 0 20px;
       }   

      
    </style>


    <!-- Utilización del método de animación show para el logotipo-->
 <script src="js/jquery.js"></script>
 <script>
    $(document).ready(function(){
      $( "#logo" ).show( "slow" );
       $( ".container" ).show( "slow" );
  });
</script>



    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">

  </head>
  <div class="page-header">
    <img src="images/logo.png">
</div>

  <body>
   
    <div class="container well">
      <form name="form1"  method="post" action="" class="form-signin" style="width:50%; border:1px; ">
        <h2 >Inicio de sesión</h2>
        <input type="text" name="usuario" class="form-control" placeholder="Usuario"> <br>
        <input type="password" name="contra" class="form-control" placeholder="Contraseña">
        <button class="btn btn-large btn-primary" type="submit">Iniciar sesion</button>



        <p>&nbsp;</p>
<?php
		$act="1";
		if(!empty($_POST['usuario']) and !empty($_POST['contra'])){          //los input se identifican con en atributo name= usuario o name = contra
			$usuario=trim($_POST['usuario']);
			$contra=trim($_POST['contra']);
			$can=mysql_query("SELECT * FROM usuarios WHERE (usu='".$usuario."' or ced='".$usuario."') and con='".$contra."'"); //seleccionará el registro que tenga un nombre de usuario y contraseña introducido en los input
			if($dato=mysql_fetch_array($can)){    //la variable can contendrá el nombre de usuario y contraseña coincidentes de la consulta
				$_SESSION['username']=$dato['usu'];        //pasa a la variable de sesion username el valor contenido en el input usuario
				$_SESSION['tipo_usu']=$dato['tipo'];        //pasa a la variable de session  tipo_usu el valor del tipo de usuraio echo en la consulta contenida en el campo tipo de la BD

				//inicializa las variables de caja por defecto//
				$_SESSION['tventa']="venta";
				$_SESSION['ddes']=0;
				///////////////////////////////
				if($_SESSION['tipo_usu']=='a' ){      //si es administrador mostrar pagina de administrador
					header('location:administracion.php');                 
				}
        if($_SESSION['tipo_usu']=='ca' ){       //si es cajero mostrar pagina de cajero
          header('location:pag_cajero.php');
        }
			}else{
				if($act=="1"){echo '<div class="alert alert-error" align="center">Usuario y Contraseña Incorrecta</div>';}else{$act="0";}
			}
		}else{
			
		}
	?>
      </form>
    </div> <!-- /container -->

<footer>
  
  <strong>Procuraduría</strong>Hack code <br>

Para saber más <a href="http://facebook.com"><strong>Click aquí</strong></a> para detalles<strong> y contacto</strong>.</div>
</footer>
  </body>
</html>
