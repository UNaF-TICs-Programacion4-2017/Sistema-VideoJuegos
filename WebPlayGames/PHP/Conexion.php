<?php
abstract class Conexion
{
	protected $Host;
	protected $BaseDeDatos;
	protected $Usuario;
	protected $Contraseña;
	protected $Conexion;
	protected $Comando;

	protected function Conectarse()
	{
		$this->Conexion = new PDO('mysql:host='.$this->Host.';dbname='.$this->BaseDeDatos."'","'".$this->Usuario."'","'".$this->Contraseña."'");
		$this->Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
}
class Consultas extends Conexion
{
	private function Ejecutar($ConsultaSQL, $Vector)
	{
		try 
		{
			$Host = '';
			$BaseDeDatos = '';
			$Usuario = 'root';
			$Contraseña = '';
			$this->Conectarse();
			$Comando = $this->Conexion->prepare($ConsultaSQL);
			if (!$Vector == "")
			{
				$Comando->execute($Vector);
			}
			else
			{
				$Comando->execute();
			}
			return $Comando;
			} 
		catch (PDOException $e) 
		{
			echo $ex->getMessage();
			exit;
		}
	}
	private function ComprobarDatos($Datos)
	{
		$Validar = false;
		foreach ($Datos as $Key => $Valor) 
		{
			if (isset($_POST[$Datos[$Key]])) 
			{
				$Validar = true;
			}
			else
			{
				$Validar = false;
				break;
			}
		}
		return $Validar;
	}
	public function Insertar($Tabla, $Datos)
	{
		try 
		{
			if ($this->ComprobarDatos($Datos) == true) 
			{
				$Variables = array();
				$Valores = "NULL";
				foreach ($Datos as $Key => $Valor) 
				{
					$Valores = $Valores.",?";
					if (isset($_POST[$Datos[$Key]])) 
					{
						$Variables[] = $_POST[$Valor];
					}
				}
				$Insertar = "INSERT INTO $Tabla VALUES($Valores)";
				$this->Ejecutar($Insertar, $Variables);
			}
		}
		catch (PDOException $ex) 
		{
			echo $ex->getMessage();
			exit;
		}
	}
	public function Actualizar($Tabla, $Datos, $Condicion)
	{
		try 
		{
			$Cadena = '';
			foreach ($Datos as $Columna => $Valor) 
			{
				$Cadena = $Cadena.$Columna.'='."'$Valor',";
			}
			$Cadena = trim($Cadena, ',');
			$Consulta = "UPDATE $Tabla SET $Cadena WHERE $Condicion";
			$this->Ejecutar($Consulta,"");
		}
		catch (PDOException $ex) 
		{
			echo $ex->getMessage();
			exit;
		}
	}
}
