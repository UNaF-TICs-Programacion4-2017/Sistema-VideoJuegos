
<?php
require_once 'Conexion.php';

function InsertarConsola()
{
	{
	$Rela_tipo_producto = '1';
	$Rela_genero ='1';
	$Rela_consola ='1';
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
	  							'v1'=>$Rela_tipo_producto,
	  							'v3'=>$Rela_genero,
	  							'v4'=>$Rela_consola,
	  							'v2'=>$fecha
	  							);
	    $oUsuario->Insertar(); 

    }
}
}