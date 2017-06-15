<?php
abstract class Conexion
{
	//Atributos
	protected $Host;
	protected $BaseDeDatos;
	protected $Usuario;
	protected $Contraseña;
	protected $Conexion;
	protected $Comando;
	//Métodos
	protected function Conectarse()
	{
		$this->Conexion = new PDO('mysql:host='.$this->Host.';dbname='.$this->BaseDeDatos,$this->Usuario,$this->Contraseña);
		$this->Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
}