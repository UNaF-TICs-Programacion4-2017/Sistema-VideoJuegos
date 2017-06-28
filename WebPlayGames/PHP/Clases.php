<?php
require_once 'Conexion.php';
require_once 'Cliente.php';
require_once 'Juego.php';
require_once 'consola.php';
require_once 'merchandising.php';
require_once 'accesorios.php';
function ObtenerImagen()
{
	$nombre_imagen = $_FILES['imagen']['name'];
	$tipo_image = $_FILES['imagen']['type'];
	$tamano_imagen = $_FILES['imagen']['size'];
	$carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/PlayGames/WebPlayGames/ImgProd/';
	$imagen = $carpeta_destino.$nombre_imagen;
	move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino.$nombre_imagen);
	return $imagen;
}