<?php
class Conexion
{
	//Atributos
	public $Tabla;
	public $Datos;
	public $Condicion;
	private $Host;
	private $BaseDeDatos;
	private $Usuario;
	private $Contraseña;
	private $Conexion;
	private $Comando;
	//Metodos
	private function Conectarse()
	{
		$this->Conexion = new PDO('mysql:host='.$this->Host.';dbname='.$this->BaseDeDatos,$this->Usuario,$this->Contraseña);
		$this->Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	protected function Ejecutar($ConsultaSQL, $Vector)
	{
		try 
		{
			$this->Host = 'localhost';
			$this->BaseDeDatos = 'play_games';
			$this->Usuario = 'root';
			$this->Contraseña = '';
			$this->Conectarse();
			$this->Comando = $this->Conexion->prepare($ConsultaSQL);
			if (!$Vector == "")
			{
				$this->Comando->execute($Vector);
			}
			else
			{
				$this->Comando->execute();
			}
			return $this->Comando;
			} 
		catch (PDOException $ex) 
		{
			echo $ex->getMessage();
			exit;
		}
	}
	public function ComprobarDatos()
	{
		$Validar = false;
		foreach ($this->Datos as $Key => $Valor) 
		{
			if (isset($_POST[$this->Datos[$Key]])) 
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
	public function Insertar()
	{
		try 
		{
			$Variables = array();
			$Valores = "NULL";
			foreach ($this->Datos as $Key => $Valor) 
			{
				$Valores = $Valores.",?";
				if ($Key == 'v')
				{
					$Variables[] = $Valor;
				}
				else
				{
					$Variables[] = $_POST[$Valor];
					
				}
				
			}
			$Insertar = "INSERT INTO $this->Tabla VALUES($Valores)";
			print_r ($Variables);
			echo $Insertar . ' ' . count($Variables);
			$this->Ejecutar($Insertar, $Variables);
		}
		catch (PDOException $ex) 
		{
			echo $ex->getMessage();
			exit;
		}
	}
	public function Actualizar()
	{
		try 
		{
			if ($this->ComprobarDatos() == true) 
			{
				$Cadena = '';
				$Cadena2 = '';
				foreach ($this->Datos as $Columna => $Valor) 
				{
					$Cadena = $Cadena.$Columna.' = '."'".$_POST[$Valor]."'".",";
				}
				foreach ($this->Condicion as $Sentencia) 
				{
					$Cadena2 = $Cadena2.$Sentencia[0].$Sentencia[1]."'".$Sentencia[2]."'"." AND ";
				}
				$Cadena = trim($Cadena, ',');
				$Cadena2 = substr($Cadena2, 0, -4);
				$Consulta = "UPDATE $this->Tabla SET $Cadena WHERE $Cadena2";
				$this->Ejecutar($Consulta,"");
			}
		}
		catch (PDOException $ex) 
		{
			echo $ex->getMessage();
			exit;
		}
	}
	public function Eliminar()
	{
		try 
		{
			if ($this->ComprobarDatos() == true) 
			{
				$Cadena = '';
				foreach ($this->Condicion as $Sentencia) 
				{
					$Cadena = $Cadena.$Sentencia[0].$Sentencia[1]."'".$Sentencia[2]."'"." AND ";
				}
				$Cadena = substr($Cadena, 0, -4);
				$Consulta = "DELETE FROM $this->Tabla WHERE $Cadena";
				$this->Ejecutar($Consulta,"");	
			}
		}
		catch (PDOException $ex) 
		{
			echo $ex->getMessage();
			exit;
		}
	}
	public function ObtenerFila()
	{
		try 
		{
			$Columnas = '';
			$Matriz = array(array());
			$Contador = 0;
			if (is_array($this->Datos)) 
			{
				foreach ($this->Datos as $Nombre) 
				{
					$Columnas = $Columnas.$Nombre.", ";
				}
				$Columnas = substr($Columnas, 0, -2);
			}
			else
			{
				$Columnas = $this->Datos;
			}
			/*if ($this->Condicion <> '') 
			{*/
				$Consulta = "SELECT $Columnas FROM $this->Tabla WHERE $this->Condicion";
			/*}
			else
			{
				$Consulta = "SELECT $Columnas FROM $this->Tabla";
			}*/
			if ($Columnas == '*') 
			{
				$NumeroDeColumnas = "SELECT COUNT(*) FROM information_schema.columns WHERE table_name = '$this->Tabla'";
				$this->Comando = $this->Ejecutar($NumeroDeColumnas,'');
				while($datos = $this->Comando->fetch())
				{			
					$NumeroDeColumnas = $datos[0];
				}
			}
			else
			{
				$NumeroDeColumnas = count($this->Datos);
			}
			$this->Comando = $this->Ejecutar($Consulta,'');
			while($datos = $this->Comando->fetch())
			{			
				for ($i=0; $i < $NumeroDeColumnas; $i++) 
				{ 
					$Matriz[$Contador][$i] = $datos[$i];
				}
				++$Contador;
			}
			return $Matriz;
		}
		catch (PDOException $ex) 
		{
			echo $ex->getMessage();
			exit;
		}
	}
	public function CantidadRegistro()
	{
		try 
		{
			$Columnas = '';
			$Cantidad = '';
			if (is_array($this->Datos)) 
			{
				foreach ($this->Datos as $Nombre) 
				{
					$Columnas = $Columnas.$Nombre.", ";
				}
				$Columnas = substr($Columnas, 0, -2);
			}
			else
			{
				$Columnas = $this->Datos;
			}
			$Consulta = "SELECT COUNT($Columnas) FROM $this->Tabla WHERE $this->Condicion";
			$this->Comando = $this->Ejecutar($Consulta,'');
			while ($datos = $this->Comando->fetch())
			{
				$Cantidad = $datos[0];
			}
			return $Cantidad;
		}
		catch (PDOException $ex) 
		{
			echo $ex->getMessage();
			exit;
		}
	}
}