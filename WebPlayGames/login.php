<?php
include 'PHP/Clases.php';
session_start();
if ($_POST['user_ingresar'] <> '' && $_POST['pass_ingresar'] <> '') 
{
	$User = $_POST['user_ingresar'];
	$Pass = $_POST['pass_ingresar'];
	$Ingresar = new Conexion();
	$Ingresar->Tabla = 'usuario';
	$Ingresar->Datos = array('nombre','password','rela_tipo_user');
	$Ingresar->Condicion = "nombre = '$User' AND password = '$Pass'";
	$Consulta = $Ingresar->ObtenerFila();
	$BDUser = $Consulta[0][0];
	$BDPass = $Consulta[0][1];
	$BDTipoUser = $Consulta[0][2];
	if ($BDUser == $User && $BDPass == $Pass && $BDTipoUser == '1') 
	{
		$_SESSION['username'] = $BDUser;
		header('location: index-logged.php');
	}
	elseif($BDUser == $User && $BDPass == $Pass && $BDTipoUser == '2')
	{
		$_SESSION['username'] = $BDUser;
		header('location: acciones-adm.php');
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