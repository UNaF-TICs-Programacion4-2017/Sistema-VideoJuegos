<?php
include 'PHP/Clases.php';
session_start();
if ($_POST['user_ingresar'] <> '' && $_POST['pass_ingresar'] <> '') 
{
	$User = $_POST['user_ingresar'];
	$Pass = $_POST['pass_ingresar'];
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