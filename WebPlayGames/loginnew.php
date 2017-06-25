<?php
include 'PHP/Clases.php';
session_start();
$oConexion = new Conexion();
$oConexion->Datos = array('nombre_apellido','dni','email','fecha_nac','telefono','direccion','userBD','passwordBD');
if ($oConexion->ComprobarDatos() == true)
{
	InsertarPersona();
}
if ($_POST['userBD'] <> '' && $_POST['passwordBD'] <> '') 
{
	$User = $_POST['userBD'];
	$Pass = $_POST['passwordBD'];
	$Ingresar = new Conexion();
	$Ingresar->Tabla = 'usuario';
	$Ingresar->Datos = array('nombre','password');
	$Ingresar->Condicion = "nombre = '$User' AND password = '$Pass'";
	$Consulta = $Ingresar->ObtenerFila();
	$BDUser = $Consulta[0][0];
	$BDPass = $Consulta[0][1];
	if ($BDUser == $User && $BDPass == $Pass) 
	{
		$_SESSION['username'] = $BDUser;
		header('location: index-logged.php');
	}
	else
	{
		header('location: index.php');
	}
}
else
{
	header('location: index.php');
}