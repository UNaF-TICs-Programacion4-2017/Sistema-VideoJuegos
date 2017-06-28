<?php 
function ComprobarUsuario()
{
	$Array = array();
	$Registro = new Conexion();
	$Registro->Tabla = 'usuario';
	$Registro->Datos = array('user','password');
	if ($Registro->ComprobarDatos() == true) 
	{
		$User = $_POST['user'];
		$Pass = $_POST['password'];
		$ComprobarUser = new Conexion();
		$ComprobarUser->Tabla = 'usuario';
		$ComprobarUser->Datos = array('nombre');
		$ComprobarUser->Condicion = "nombre = '$User'";
		$Consulta = $ComprobarUser->CantidadRegistro();
		if ($Consulta <> '0') 
		{
			header('location: index.php');
		}
		else
		{
			$Array[0] = $User;
			$Array[1] = $Pass;
		}
	}
	else
	{
		$Array[0] = 'NULL';
		$Array[1] = 'NULL';
	}
	return $Array;
}
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
