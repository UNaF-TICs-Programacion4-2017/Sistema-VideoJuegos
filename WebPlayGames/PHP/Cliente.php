<?php
require_once 'Conexion.php';
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
	$oPersona->Datos = array('nombre_apellido','dni','fecha_nac','v'=>$Rela_Usuario,'email');
	$oPersona->Insertar();
	$NombreYApellido = $_POST['nombre_apellido'];
	$Documento = $_POST['dni'];
	$oPersona->Datos = array('id');
	$oPersona->Condicion = "nombre_apellido = '$NombreYApellido' AND dni = '$Documento'";
	$Valor = $oPersona->ObtenerFila();
	return $Valor[0][0];
}
function InsertarDireccionTelefono($Rela_Persona)
{
	$Telefono = new Conexion();
	$Telefono->Tabla = 'telefono';
	$Telefono->Datos = array('telefono','v'=>$Rela_Persona);
	$Telefono->Insertar();
	$Direccion = new Conexion();
	$Direccion->Tabla = 'direccion';
	$Direccion->Datos = array('direccion','v'=>$Rela_Persona);
	$Direccion->Insertar();
}
function InsertarPersona()
{
	$Rela_Usuario = InsertarUsuario();
	$Rela_Persona = InsertarDatos($Rela_Usuario);
	InsertarDireccionTelefono($Rela_Persona);
}

