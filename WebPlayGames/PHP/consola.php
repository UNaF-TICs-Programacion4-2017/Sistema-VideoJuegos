
<?php
require_once 'Conexion.php';

function InsertarConsola()
{
	
	$Rela_tipo_producto = '4';
	$genero = '';
	$consola = '';
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
	  							'linkyoutube',
	  							
	  							'v4'=>$fecha
	  							);
	    $oUsuario->Insertar(); 
    }
}