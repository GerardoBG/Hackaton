<?php
include_once 'conex.php';//INCLUIR CONEXION DE BASE DE DATOS

class puntosDao
{
    private $r;
    public function __construct()
    {
        $this->r = array();
    }
    public function grabar($titulo, $cx,$cy)//METODO PARA GRABAR A LA BD
    {
        $con = conex::con();
        $titulo = mysql_real_escape_string($titulo);
        $cx = mysql_real_escape_string($cx);
        $cy = mysql_real_escape_string($cy);
        $q = "insert into puntos (Titulo, cx, cy)".
             "values ('".addslashes($titulo)."','".addslashes($cx)."','".addslashes($cy)."')";
        $rpta = mysql_query($q, $con);
        mysql_close($con);
        if($rpta==1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    public function listar_todo()
    {
        $q = "select * from puntos";
        $con = conex::con();
        $rpta = mysql_query($q,$con);
        mysql_close($con);
        while($fila = mysql_fetch_assoc($rpta))
        {
            $this->r[] = $fila;
        }
        return $this->r;
    }
    public function borrar($idPunto)//METODO PARA BORRAR DE LA BD
    {
        $con = conex::con();
        $idPunto = mysql_real_escape_string($idPunto);
        $q = "delete from puntos where IdPunto = ".(int)$idPunto;
        $rpta = mysql_query($q, $con);
        mysql_close($con);
        if($rpta==1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
	
	
	public function folio($folio){
	$arr = array();
	$rs = mysql_query("select * from puntos where cx= " . (text)<$idPunto);
	$rpta = mysql_query($q, $con);
    while($obj = mysql_fetch_object($rs)) {

        $arr[] = $obj;

    }// add the header line to specify that the content type is JSON
    header("Content-type: application/json");
	

    echo "{\"data\":" .json_encode($arr). "}";
	

	}
}
?>