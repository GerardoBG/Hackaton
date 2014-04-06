<?php
 		session_start();
		require_once("dompdf/dompdf_config.inc.php");
		include('php_conexion.php'); 
		if(!$_SESSION['tipo_usu']=='a' or !$_SESSION['tipo_usu']=='ca'){
			header('location:error.php');
		}

		$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 		$hoy=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		$fech=date('d')."".$meses[date('n')-1]."".date('y');
		//Salida: Viernes 24 de Febrero del 2012

		$codigoHTML=' 
					<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
					<head>

					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<title>Reporte</title>
					<style type="text/css">
					.text {
						font-family: Verdana, Geneva, sans-serif;
						font-size: 12px;
					}
					img{
						margin-left:40px;
						width:150px;
						heigth:120px;
					}
					
				}
					</style>
					</head>
					<body>
						<img src="images/logon.png" alt="hola"> <p align=right>Impreso el '.$hoy.' <br> por '.$_SESSION['username'].'</p>
						<div align="center">
						<h2><strong>Procuraduria General de Justicia </strong></h2>
							
						</div>';

						$can=mysql_query("SELECT * FROM per_extraviada WHERE folio_denuncia=$_GET[recordID]");	
						while($dato=mysql_fetch_array($can)){   

						$codigoHTML.=' <h3>
						Se rinde declaracion el dia ' .$hoy.' con el fin de localizar a '.$dato['nombre'].' '.$dato['apPat'].' '.$dato['apMat']. ' con fecha de nacimiento '.$dato['fecha_nac'].' del sexo '.$dato['genero'].' actualmente tiene '.$dato['edad']. ' anios, su domicilio actual es calle ' .$dato['calle'].' numero '.$dato['numero']. ' colonia ' .$dato['colonia'].' cuyo numero de telefono es '.$dato['telefono'].'. <br> <br>'.$dato['nombre'].' se fue visto por ultima vez el '.$dato['fecha_ausencia'].' en ' .$dato['ultimo_lugar'].'</h3>';


						}


						$codigoHTML=utf8_decode($codigoHTML);
						$dompdf=new DOMPDF();
						$dompdf->load_html($codigoHTML);
						ini_set("memory_limit","128M");
						$dompdf->render();
						$dompdf->stream("Declaracion_".$fech."_".$dato['nombre']."_".$dato['apPat'].".pdf");
?>
	