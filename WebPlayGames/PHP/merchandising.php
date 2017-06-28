
<?php
require_once 'Conexion.php';

function InsertarMerchandising()
{
	
	$Rela_tipo_producto = '4';
	$genero = '';
	$consola = '';
	$link = '';
    $fecha = date_format(date_create(date("Y-m-d")),'Y-m-d');
    $oUsuario = new Conexion();
    $oUsuario->Datos = array('nombre');
    if($oUsuario->ComprobarDatos() == true)
    {
    	$oUsuario->Tabla = 'producto';	                        
	  	$oUsuario->Datos = array(
	  							'cantidad',
	  							'precio',
	  							'descripcion',
	  							'nombre',
	  							'anio',
	  							'v1'=>$link,
	  							
	  							'v4'=>$fecha
	  							);
	    $oUsuario->Insertar(); 
    }
}