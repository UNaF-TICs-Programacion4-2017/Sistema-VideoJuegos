<?php
function InsertarUsuario()
{
	$Valor = '';
	$Usuario = new Conexion();
	$Usuario->Tabla = 'usuario';
	$Rela_Tipo_Usuario = 1;
	$Usuario->Datos = array('userBD','passwordBD','v'=>$Rela_Tipo_Usuario);
	$Usuario->Insertar();
	$UserBD = $_POST['userBD'];
	$Usuario->Datos = array('id');
	$Usuario->Condicion = "nombre = '$UserBD'";
	$Valor = $Usuario->ObtenerFila();
	return $Valor[0][0];
}
function InsertarDatos($Rela_Usuario)
{
	$oPersona = new Conexion();
	$oPersona->Tabla = 'persona';
	$oPersona->Datos = array('nombre_apellido','dni','fecha_nac','email','telefono','direccion','v'=>$Rela_Usuario);
	$oPersona->Insertar();
}
function InsertarPersona()
{
	$Rela_Usuario = InsertarUsuario();
	InsertarDatos($Rela_Usuario);
}
function InsertarAccesorio()
{
	$Rela_tipo_producto = '3';
	$genero = '';
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
	  							'v5'=>$genero,
	  							'consola',
	  							'v2'=>$fecha,
	  							'v3'=>$imagen
	  							);
	    $oUsuario->Insertar(); 
    }
}
function InsertarConsola()
{
	$Rela_tipo_producto = '1';
	$genero = '';
	$consola = '';
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
	  							'v4'=>$genero,
	  							'v5'=>$consola,
	  							'v2'=>$fecha,
	  							'v3'=>$imagen
	  							);
	    $oUsuario->Insertar(); 
    }
}
function InsertarFiguraAccion()
{
	$Rela_tipo_producto = '5';
	$genero = '';
	$consola = '';
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
	  							'v6'=>$link,
	  							'v1'=>$Rela_tipo_producto,
	  							'v4'=>$genero,
	  							'v5'=>$consola,
	  							'v2'=>$fecha,
	  							'v3'=>$imagen
	  							);
	    $oUsuario->Insertar(); 
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
function InsertarMerchandising()
{
	$Rela_tipo_producto = '2';
	$genero = '';
	$consola = '';
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
	  							'v6'=>$link,
	  							'v1'=>$Rela_tipo_producto,
	  							'v4'=>$genero,
	  							'v5'=>$consola,
	  							'v2'=>$fecha,
	  							'v3'=>$imagen
	  							);
	    $oUsuario->Insertar(); 
    }
}