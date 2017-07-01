<?php
function EliminarPersona()
{
	if(isset($_POST['ID_Persona']))
	{
		$ID_Persona = $_POST['ID_Persona'];
		$oPersona = new Conexion();
		$oPersona->Tabla = 'persona';
		$oPersona->Datos = array('rela_usuario');
		$oPersona->Condicion = "id = $ID_Persona";
		$Consulta = $oPersona->ObtenerFila();
		$Rela_Usuario = $Consulta[0][0];
		//////////////////////////////////////
		$EPersona = new Conexion();
		$EPersona->Tabla = 'persona';
		$EPersona->Condicion = "id = $ID_Persona";
		$EPersona->Eliminar();
		//////////////////////////////////////
		$EUsuario = new Conexion();
		$EUsuario->Tabla = 'usuario';
		$EUsuario->Condicion = "id = $Rela_Usuario";
		$EUsuario->Eliminar();
	}	
}
function EliminarJuego()
{
	if(isset($_POST['ID_Juego']))
	{
		$ID_Juego = $_POST['ID_Juego'];
		$Consulta = new Conexion();
		$Consulta->Tabla = 'producto';
		$Consulta->Datos = array('imagen');
		$Consulta->Condicion = "id = $ID_Juego";
		$Valor = $Consulta->ObtenerFila();
		$Imagen = $Valor[0][0];
		unlink($Imagen);
		$oJuego = new Conexion();
		$oJuego->Tabla = 'producto';
		$oJuego->Condicion = "id = $ID_Juego";
		$oJuego->Eliminar();
	}
}
function EliminarConsola()
{
	if(isset($_POST['ID_Consola']))
	{
		$ID_Consola = $_POST['ID_Consola'];
		$Consulta = new Conexion();
		$Consulta->Tabla = 'producto';
		$Consulta->Datos = array('imagen');
		$Consulta->Condicion = "id = $ID_Juego";
		$Valor = $Consulta->ObtenerFila();
		$Imagen = $Valor[0][0];
		unlink($Imagen);
		$oConsola = new Conexion();
		$oConsola->Tabla = 'producto';
		$oConsola->Condicion = "id = $ID_Consola";
		$oConsola->Eliminar();
	}
}
function EliminarAccesorio()
{
	if(isset($_POST['ID_Accesorio']))
	{
		$ID_Accesorio = $_POST['ID_Accesorio'];
		$Consulta = new Conexion();
		$Consulta->Tabla = 'producto';
		$Consulta->Datos = array('imagen');
		$Consulta->Condicion = "id = $ID_Juego";
		$Valor = $Consulta->ObtenerFila();
		$Imagen = $Valor[0][0];
		unlink($Imagen);
		$oAccesorio = new Conexion();
		$oAccesorio->Tabla = 'producto';
		$oAccesorio->Condicion = "id = $ID_Accesorio";
		$oAccesorio->Eliminar();
	}
}
function EliminarMercha()
{
	if(isset($_POST['ID_Mercha']))
	{
		$ID_Mercha = $_POST['ID_Mercha'];
		$Consulta = new Conexion();
		$Consulta->Tabla = 'producto';
		$Consulta->Datos = array('imagen');
		$Consulta->Condicion = "id = $ID_Juego";
		$Valor = $Consulta->ObtenerFila();
		$Imagen = $Valor[0][0];
		unlink($Imagen);
		$oMercha = new Conexion();
		$oMercha->Tabla = 'producto';
		$oMercha->Condicion = "id = $ID_Mercha";
		$oMercha->Eliminar();
	}
}
function EliminarFAccion()
{
	if(isset($_POST['ID_Accion']))
	{
		$ID_Accion = $_POST['ID_Accion'];
		$Consulta = new Conexion();
		$Consulta->Tabla = 'producto';
		$Consulta->Datos = array('imagen');
		$Consulta->Condicion = "id = $ID_Juego";
		$Valor = $Consulta->ObtenerFila();
		$Imagen = $Valor[0][0];
		unlink($Imagen);
		$oAccion = new Conexion();
		$oAccion->Tabla = 'producto';
		$oAccion->Condicion = "id = $ID_Accion";
		$oAccion->Eliminar();
	}
}