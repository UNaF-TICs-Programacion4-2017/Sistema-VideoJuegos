<?php
function CargarConsolas()
{
	$oConsola = new Conexion();
	$oConsola->Tabla = 'consola';
	$oConsola->Datos = array('id','descripcion');
	$oConsola->Condicion ="id < '100'";
	$Consulta = $oConsola->ObtenerFila();
	$ID = '';
	$Descripcion = '';

	foreach ($Consulta as $key => $Columna) 
	{

 		foreach ($Columna as $Fila) 
 		{
 			if(!is_numeric($Fila))
 			{
 				$Descripcion = $Fila;
 	    	}
 	    	else
 	    	{
 	    		$ID = $Fila;
 	    	}
	 	}
	 	echo "<option value='$ID'>$Descripcion</option>";
	}
}
function CargarGeneros()
{
	$oGenero = new Conexion();
	$oGenero->Tabla ='genero';
    $oGenero->Datos = array('id','descripcion');
    $oGenero->Condicion ="id < '100'";
    $Consulta = $oGenero->ObtenerFila();
    $ID='';
    $Descripcion = '';
    foreach ($Consulta as $key => $Columna) 
	{
	 	foreach ($Columna as $Fila) 
	 	{
	 		if(!is_numeric($Fila))
	 		{
	 			$Descripcion = $Fila;
	 	    }
	 	    else
	 	    {
	 	    	$ID = $Fila;
	 	    }
	 	}
	 	echo "<option value='$ID'>$Descripcion</option>";
	}
}
function InsertarJuego()
{
	$Rela_tipo_producto = '4';
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
	  							'linkyoutube',
	  							'v1'=>$Rela_tipo_producto,
	  							'genero',
	  							'consola',
	  							'v2'=>$fecha,
	  							'v3'=>$imagen
	  							);
	    $oUsuario->Insertar(); 
    }
}