<?php
include 'PHP/Clases.php';
session_start();
$Usuario = '';
$Password = '';
if (isset($_POST['usuario_ingresar']) || isset($_POST['contraseña_ingresar'])) 
{
	$Usuario = $_POST['usuario_ingresar'];
	$Password = $_POST['contraseña_ingresar'];
	header("location: index.php");
}
else
{
	header("location: index-logged.php");
	
}
/*$Sesion = new Conexion();
$Sesion->Tabla = 'usuario';
$Sesion->Datos = array('nombre','password');
$Sesion->Condicion = array(
							array('nombre','=',$Usuario),
							array('password','=',$Password)
							);
$Consulta = $Sesion->ObtenerFila();
if ($Consulta[0][0] == $Usuario && $Consulta[0][1] == $Password) 
{
	$_SESSION['username'] = $Consulta[0][0];
	header("location: index-logged.php");
}
else
{
	header("location: index.php");
}*/
?>