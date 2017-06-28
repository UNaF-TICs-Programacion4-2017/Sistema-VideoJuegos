<?php
function InsertarAccesorio()
{
	$Rela_tipo_producto = '3';
	$genero = '';
	$link = '';
    $fecha = date_format(date_create(date("Y-m-d")),'Y-m-d');
    $oUsuario = new Conexion();
    $oUsuario->Datos = array('nombre');
    if($oUsuario->ComprobarDatos() == true)
    {
    	$imagen = ObtenerImagen();
    	$oUsuario->Tabla = 'producto';	                        
	  	$oUsuario->Datos = array(
	  							'cantidad',
	  							'precio',
	  							'descripcion',
	  							'nombre',
	  							'anio',
	  							'v4'=>$link,
	  							'v1'=>$Rela_tipo_producto,
	  							'v4'=>$genero,
	  							'consola',
	  							'v2'=>$fecha,
	  							'v3'=>$imagen
	  							);
	    $oUsuario->Insertar(); 
    }
}