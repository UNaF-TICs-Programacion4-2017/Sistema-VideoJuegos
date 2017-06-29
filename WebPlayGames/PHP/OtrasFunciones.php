<?php
function ObtenerImagen()
{
	$nombre_imagen = $_FILES['imagen']['name'];
	$tipo_image = $_FILES['imagen']['type'];
	$tamano_imagen = $_FILES['imagen']['size'];
	$carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/PlayGames/WebPlayGames/ImgProd/';
	$imagen = 'ImgProd/'.$nombre_imagen;
	move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino.$nombre_imagen);
	return $imagen;
}