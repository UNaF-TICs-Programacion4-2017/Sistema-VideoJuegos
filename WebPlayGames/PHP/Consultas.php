<?php 
error_reporting(0);
/////////////////////////
function ComprobarUsuario()
{
	$Array = array();
	$Registro = new Conexion();
	$Registro->Tabla = 'usuario';
	$Registro->Datos = array('user','password');
	if ($Registro->ComprobarDatos() == true) 
	{
		$User = $_POST['user'];
		$Pass = $_POST['password'];
		$ComprobarUser = new Conexion();
		$ComprobarUser->Tabla = 'usuario';
		$ComprobarUser->Datos = array('nombre');
		$ComprobarUser->Condicion = "nombre = '$User'";
		$Consulta = $ComprobarUser->CantidadRegistro();
		if ($Consulta <> '0') 
		{
			header('location: index.php');
		}
		else
		{
			$Array[0] = $User;
			$Array[1] = $Pass;
		}
	}
	else
	{
		$Array[0] = 'NULL';
		$Array[1] = 'NULL';
	}
	return $Array;
}
/////////////////////////
function CargarConsolas()
{
	$oConsola = new Conexion();
	$oConsola->Tabla = 'consola';
	$oConsola->Datos = array('id','descripcion');
	$oConsola->Condicion ="id < '100'";
	$Consulta = $oConsola->ObtenerFila();
	$ID = '';
	$Descripcion = '';

	foreach ($Consulta as $key => $Columna) 
	{

 		foreach ($Columna as $Fila) 
 		{
 			if(!is_numeric($Fila))
 			{
 				$Descripcion = $Fila;
 	    	}
 	    	else
 	    	{
 	    		$ID = $Fila;
 	    	}
	 	}
	 	echo "<option value='$ID'>$Descripcion</option>";
	}
}
function CargarPlay()
{
	$oPlay = new Conexion();
	$oPlay->Tabla = 'consola';
	$oPlay->Datos = array('id','descripcion');
	$oPlay->Condicion = "id = 1 OR id = 2";
	$Play = $oPlay->ObtenerFila();
	$ID = '';
	$Descripcion = '';

	foreach ($Play as $key => $Columna) 
	{

 		foreach ($Columna as $Fila) 
 		{
 			if(!is_numeric($Fila))
 			{
 				$Descripcion = $Fila;
 	    	}
 	    	else
 	    	{
 	    		$ID = $Fila;
 	    	}
	 	}
	 	echo "<option value='$ID'>$Descripcion</option>";
	}
}
function CargarXBOX()
{
	$oPlay = new Conexion();
	$oPlay->Tabla = 'consola';
	$oPlay->Datos = array('id','descripcion');
	$oPlay->Condicion = "id = 3 OR id = 4";
	$Play = $oPlay->ObtenerFila();
	$ID = '';
	$Descripcion = '';

	foreach ($Play as $key => $Columna) 
	{

 		foreach ($Columna as $Fila) 
 		{
 			if(!is_numeric($Fila))
 			{
 				$Descripcion = $Fila;
 	    	}
 	    	else
 	    	{
 	    		$ID = $Fila;
 	    	}
	 	}
	 	echo "<option value='$ID'>$Descripcion</option>";
	}
}
function CargarNintendo()
{
	$oPlay = new Conexion();
	$oPlay->Tabla = 'consola';
	$oPlay->Datos = array('id','descripcion');
	$oPlay->Condicion = "id = 5 OR id = 6";
	$Play = $oPlay->ObtenerFila();
	$ID = '';
	$Descripcion = '';

	foreach ($Play as $key => $Columna) 
	{

 		foreach ($Columna as $Fila) 
 		{
 			if(!is_numeric($Fila))
 			{
 				$Descripcion = $Fila;
 	    	}
 	    	else
 	    	{
 	    		$ID = $Fila;
 	    	}
	 	}
	 	echo "<option value='$ID'>$Descripcion</option>";
	}
}
function CargarGeneros()
{
	$oGenero = new Conexion();
	$oGenero->Tabla ='genero';
    $oGenero->Datos = array('id','descripcion');
    $oGenero->Condicion ="id < '100'";
    $Consulta = $oGenero->ObtenerFila();
    $ID='';
    $Descripcion = '';
    foreach ($Consulta as $key => $Columna) 
	{
	 	foreach ($Columna as $Fila) 
	 	{
	 		if(!is_numeric($Fila))
	 		{
	 			$Descripcion = $Fila;
	 	    }
	 	    else
	 	    {
	 	    	$ID = $Fila;
	 	    }
	 	}
	 	echo "<option value='$ID'>$Descripcion</option>";
	}
}
////////////////////////////
function FiltrarAccesorios()
{
	$oCantidad = new Conexion();
	$oCantidad->Tabla = 'producto';
	$oCantidad->Datos = '*';
	$oCantidad->Condicion = 'rela_tipo_producto = 3';
	$Cantidad = $oCantidad->CantidadRegistro();
	if ($Cantidad > 0) 
	{
		if(isset($_POST['consolas']))
		{
			$NumeroColumnas = 0;
			$Consola = $_POST['consolas'];
			$oFiltro = new Conexion();
			$oFiltro->Tabla = 'producto';
			$oFiltro->Datos = array('precio','descripcion','nombre','imagen');
			if($Consola == '0')
			{
				$oFiltro->Condicion = "rela_tipo_producto = '3'";
			}
			else
			{
				$oFiltro->Condicion = "rela_tipo_producto = '3' AND rela_consola = '$Consola'";
			}
			$Tabla = $oFiltro->ObtenerFila();
			foreach ($Tabla as $Columnas) 
			{
				++$NumeroColumnas;
			}
			if(!$Tabla[0][2] == '')
			{
				for ($i=0; $i < $NumeroColumnas; $i++) 
				{ 
					echo "<div class='product'>
							<div class='inner-product'>
								<div class='figure-image'>
									<a href='single.php'><img src='".$Tabla[$i][3]."' alt='Game 1'></a>
								</div>
								<h3 class='product-title'><a href='#'>".$Tabla[$i][2]."</a></h3>
								<small class='price'>$".$Tabla[$i][0]."</small>
								<p>".$Tabla[$i][1]."</p>
								<a href='cart.php' class='button'>Reservar</a>
								<a href='#' class='button muted'>Read Details</a>
							</div>
						</div> ";
				}
			}
			else
			{
				echo "<div class='pagination-bar'>
							
								<span>No se obtuvieron resultados</span>
							
						</div>";
			}
		}
	}
}
function FiltrarConsolas()
{
	$oCantidad = new Conexion();
	$oCantidad->Tabla = 'producto';
	$oCantidad->Datos = '*';
	$oCantidad->Condicion = 'rela_tipo_producto = 1';
	$Cantidad = $oCantidad->CantidadRegistro();
	if ($Cantidad > 0) 
	{
		if(isset($_POST['consolas']))
		{
			$NumeroColumnas = 0;
			$Consola = $_POST['consolas'];
			$oFiltro = new Conexion();
			$oFiltro->Tabla = 'producto';
			$oFiltro->Datos = array('precio','descripcion','nombre','imagen');
			if($Consola == '0')
			{
				$oFiltro->Condicion = "rela_tipo_producto = '1'";
			}
			else
			{
				$oFiltro->Condicion = "rela_tipo_producto = '1' AND rela_consola = '$Consola'";
			}
			$Tabla = $oFiltro->ObtenerFila();
			foreach ($Tabla as $Columnas) 
			{
				++$NumeroColumnas;
			}
			if(!$Tabla[0][2] == '')
			{
				for ($i=0; $i < $NumeroColumnas; $i++) 
				{ 
					echo "<div class='product'>
							<div class='inner-product'>
								<div class='figure-image'>
									<a href='single.php'><img src='".$Tabla[$i][3]."' alt='Game 1'></a>
								</div>
								<h3 class='product-title'><a href='#'>".$Tabla[$i][2]."</a></h3>
								<small class='price'>$".$Tabla[$i][0]."</small>
								<p>".$Tabla[$i][1]."</p>
								<a href='cart.php' class='button'>Reservar</a>
								<a href='#' class='button muted'>Read Details</a>
							</div>
						</div> ";
				}
			}
			else
			{
				echo "<div class='pagination-bar'>
							
								<span>No se obtuvieron resultados</span>
							
						</div>";
			}
		}
	}
}
function FiltrarJuegoPlay()
{
	$oCantidad = new Conexion();
	$oCantidad->Tabla = 'producto';
	$oCantidad->Datos = '*';
	$oCantidad->Condicion = "rela_tipo_producto = '4'";
	$Cantidad = $oCantidad->CantidadRegistro();
	if ($Cantidad > 0) 
	{
		if(isset($_POST['plays']))
		{
			$NumeroColumnas = 0;
			$Plays = $_POST['plays'];
			$Generos = $_POST['generos'];
			$oFiltro = new Conexion();
			$oFiltro->Tabla = 'producto';
			$oFiltro->Datos = array('precio','descripcion','nombre','imagen');
			$oFiltro->Condicion = "rela_tipo_producto = '4' AND rela_consola = $Plays AND rela_genero = $Generos";
			$Tabla = $oFiltro->ObtenerFila();
			foreach ($Tabla as $Columnas) 
			{
				++$NumeroColumnas;
			}
			if(!$Tabla[0][2] == '')
			{
				for ($i=0; $i < $NumeroColumnas; $i++) 
				{ 
					echo "<div class='product'>
							<div class='inner-product'>
								<div class='figure-image'>
									<a href='single.php'><img src='".$Tabla[$i][3]."' alt='Game 1'></a>
								</div>
								<h3 class='product-title'><a href='#'>".$Tabla[$i][2]."</a></h3>
								<small class='price'>$".$Tabla[$i][0]."</small>
								<p>".$Tabla[$i][1]."</p>
								<a href='cart.php' class='button'>Reservar</a>
								<a href='#' class='button muted'>Read Details</a>
							</div>
						</div> ";
				}
			}
			else
			{
				echo "<div class='pagination-bar'>
							
								<span>No se obtuvieron resultados</span>
							
						</div>";
			}
		}
	}
}
function FiltrarJuegoXBOX()
{
	$oCantidad = new Conexion();
	$oCantidad->Tabla = 'producto';
	$oCantidad->Datos = '*';
	$oCantidad->Condicion = "rela_tipo_producto = '4'";
	$Cantidad = $oCantidad->CantidadRegistro();
	if ($Cantidad > 0) 
	{
		if(isset($_POST['xboxs']))
		{
			$NumeroColumnas = 0;
			$Plays = $_POST['xboxs'];
			$Generos = $_POST['generos'];
			$oFiltro = new Conexion();
			$oFiltro->Tabla = 'producto';
			$oFiltro->Datos = array('precio','descripcion','nombre','imagen');
			$oFiltro->Condicion = "rela_tipo_producto = '4' AND rela_consola = $Plays AND rela_genero = $Generos";
			$Tabla = $oFiltro->ObtenerFila();
			foreach ($Tabla as $Columnas) 
			{
				++$NumeroColumnas;
			}
			if(!$Tabla[0][2] == '')
			{
				for ($i=0; $i < $NumeroColumnas; $i++) 
				{ 
					echo "<div class='product'>
							<div class='inner-product'>
								<div class='figure-image'>
									<a href='single.php'><img src='".$Tabla[$i][3]."' alt='Game 1'></a>
								</div>
								<h3 class='product-title'><a href='#'>".$Tabla[$i][2]."</a></h3>
								<small class='price'>$".$Tabla[$i][0]."</small>
								<p>".$Tabla[$i][1]."</p>
								<a href='cart.php' class='button'>Reservar</a>
								<a href='#' class='button muted'>Read Details</a>
							</div>
						</div> ";
				}
			}
			else
			{
				echo "<div class='pagination-bar'>
							
								<span>No se obtuvieron resultados</span>
							
						</div>";
			}
		}
	}
}
function FiltrarJuegoNintendo()
{
	$oCantidad = new Conexion();
	$oCantidad->Tabla = 'producto';
	$oCantidad->Datos = '*';
	$oCantidad->Condicion = "rela_tipo_producto = '4'";
	$Cantidad = $oCantidad->CantidadRegistro();
	if ($Cantidad > 0) 
	{
		if(isset($_POST['nintendo']))
		{
			$NumeroColumnas = 0;
			$Plays = $_POST['nintendo'];
			$Generos = $_POST['generos'];
			$oFiltro = new Conexion();
			$oFiltro->Tabla = 'producto';
			$oFiltro->Datos = array('precio','descripcion','nombre','imagen');
			$oFiltro->Condicion = "rela_tipo_producto = '4' AND rela_consola = $Plays AND rela_genero = $Generos";
			$Tabla = $oFiltro->ObtenerFila();
			foreach ($Tabla as $Columnas) 
			{
				++$NumeroColumnas;
			}
			if(!$Tabla[0][2] == '')
			{
				for ($i=0; $i < $NumeroColumnas; $i++) 
				{ 
					echo "<div class='product'>
							<div class='inner-product'>
								<div class='figure-image'>
									<a href='single.php'><img src='".$Tabla[$i][3]."' alt='Game 1'></a>
								</div>
								<h3 class='product-title'><a href='#'>".$Tabla[$i][2]."</a></h3>
								<small class='price'>$".$Tabla[$i][0]."</small>
								<p>".$Tabla[$i][1]."</p>
								<a href='cart.php' class='button'>Reservar</a>
								<a href='#' class='button muted'>Read Details</a>
							</div>
						</div> ";
				}
			}
			else
			{
				echo "<div class='pagination-bar'>
							
								<span>No se obtuvieron resultados</span>
							
						</div>";
			}
		}
	}
}
function FiltrarMerchandising()
{
	$oCantidad = new Conexion();
	$oCantidad->Tabla = 'producto';
	$oCantidad->Datos = '*';
	$oCantidad->Condicion = "rela_tipo_producto = '2'";
	$Cantidad = $oCantidad->CantidadRegistro();
	if ($Cantidad > 0) 
	{
		$NumeroColumnas = 0;
		$oFiltro = new Conexion();
		$oFiltro->Tabla = 'producto';
		$oFiltro->Datos = array('precio','descripcion','nombre','imagen');		
		$oFiltro->Condicion = "rela_tipo_producto = '2'";
		$Tabla = $oFiltro->ObtenerFila();
		foreach ($Tabla as $Columnas) 
		{
			++$NumeroColumnas;
		}
		if(!$Tabla[0][2] == '')
		{
			for ($i=0; $i < $NumeroColumnas; $i++) 
			{ 
				echo "<div class='product'>
						<div class='inner-product'>
							<div class='figure-image'>
								<a href='single.php'><img src='".$Tabla[$i][3]."' alt='Game 1'></a>
							</div>
							<h3 class='product-title'><a href='#'>".$Tabla[$i][2]."</a></h3>
							<small class='price'>$".$Tabla[$i][0]."</small>
							<p>".$Tabla[$i][1]."</p>
							<a href='cart.php' class='button'>Reservar</a>
							<a href='#' class='button muted'>Read Details</a>
						</div>
					</div> ";
			}
		}
		else
		{
			echo "<div class='pagination-bar'>
						
							<span>No se obtuvieron resultados</span>
						
					</div>";
		}
	}
}
function FiltrarFAccion()
{
	$oCantidad = new Conexion();
	$oCantidad->Tabla = 'producto';
	$oCantidad->Datos = '*';
	$oCantidad->Condicion = "rela_tipo_producto = '5'";
	$Cantidad = $oCantidad->CantidadRegistro();
	if ($Cantidad > 0) 
	{
		$NumeroColumnas = 0;
		$oFiltro = new Conexion();
		$oFiltro->Tabla = 'producto';
		$oFiltro->Datos = array('precio','descripcion','nombre','imagen');		
		$oFiltro->Condicion = "rela_tipo_producto = '5'";
		$Tabla = $oFiltro->ObtenerFila();
		foreach ($Tabla as $Columnas) 
		{
			++$NumeroColumnas;
		}
		if(!$Tabla[0][2] == '')
		{
			for ($i=0; $i < $NumeroColumnas; $i++) 
			{ 
				echo "<div class='product'>
						<div class='inner-product'>
							<div class='figure-image'>
								<a href='single.php'><img src='".$Tabla[$i][3]."' alt='Game 1'></a>
							</div>
							<h3 class='product-title'><a href='#'>".$Tabla[$i][2]."</a></h3>
							<small class='price'>$".$Tabla[$i][0]."</small>
							<p>".$Tabla[$i][1]."</p>
							<a href='cart.php' class='button'>Reservar</a>
							<a href='#' class='button muted'>Read Details</a>
						</div>
					</div> ";
			}
		}
		else
		{
			echo "<div class='pagination-bar'>
						
							<span>No se obtuvieron resultados</span>
						
					</div>";
		}
	}
}
/////////////////////////////////
function CargarProductoCompleto($A,$B,$C)
{
	$oCantidad = new Conexion();
	$oCantidad->Tabla = 'producto';
	$oCantidad->Datos = '*';
	$oCantidad->Condicion = "rela_tipo_producto = '$A'";
	$Cantidad = $oCantidad->CantidadRegistro();
	if ($Cantidad > 0) 
	{
		if(!isset($_POST[$C]))
		{
			$NumeroColumnas = 0;
			$Consola = $_POST[$C];
			$oFiltro = new Conexion();
			$oFiltro->Tabla = 'producto';
			$oFiltro->Datos = array('precio','descripcion','nombre','imagen');	
			$oFiltro->Condicion = "rela_tipo_producto = '$A'";
			$Tabla = $oFiltro->ObtenerFila();
			foreach ($Tabla as $Columnas) 
			{
				++$NumeroColumnas;
			}
			if(!$Tabla[0][2] == '')
			{
				for ($i=0; $i < $NumeroColumnas; $i++) 
				{ 
					echo "<div class='product'>
							<div class='inner-product'>
								<div class='figure-image'>
									<a href='single.php'><img src='".$Tabla[$i][3]."' alt='Game 1'></a>
								</div>
								<h3 class='product-title'><a href='#'>".$Tabla[$i][2]."</a></h3>
								<small class='price'>$".$Tabla[$i][0]."</small>
								<p>".$Tabla[$i][1]."</p>
								<a href='cart.php' class='button'>Reservar</a>
								<a href='#' class='button muted'>Read Details</a>
							</div>
						</div> ";
				}
			}
			else
			{
				echo "<div class='pagination-bar'>
							
								<span>No se obtuvieron resultados</span>
							
						</div>";
			}
		}
		else
		{
			if ($A == 3) 
			{
				FiltrarAccesorios();
			}
			elseif($A == 1)
			{
				FiltrarConsolas();
			}
			elseif($A == 2)
			{
				FiltrarMerchandising();
			}
			elseif($A == 4 && $B == 1)
			{
				FiltrarJuegoPlay();
			}
			elseif($A == 4 && $B == 2)
			{
				FiltrarJuegoXBOX();
			}
			elseif($A == 4 && $B == 3)
			{
				FiltrarJuegoNintendo();
			}
			else
			{
				FiltrarFAccion();
			}
		}
	}
}
/////////////////////////////////
function FIltrarNuevosProductos()
{
	$FechaActual = date('Ymd');
	$FechaLimite = strtotime ('-15 day',strtotime($FechaActual));
	$FechaLimite = date ('Ymd',$FechaLimite);
	$oCantidad = new Conexion();
	$oCantidad->Tabla = 'producto';
	$oCantidad->Datos = '*';
	$oCantidad->Condicion = "fechaingreso BETWEEN '$FechaLimite' AND '$FechaActual'";
	$Cantidad = $oCantidad->CantidadRegistro();
	$Cantidad = 1;
	if ($Cantidad > 0) 
	{
		$NumeroColumnas = 0;
		$oFiltro = new Conexion();
		$oFiltro->Tabla = 'producto';
		$oFiltro->Datos = array('precio','descripcion','nombre','imagen');	
		$oFiltro->Condicion = "fechaingreso BETWEEN '$FechaLimite' AND '$FechaActual' ORDER BY fechaingreso DESC";
		$Tabla = $oFiltro->ObtenerFila();
		foreach ($Tabla as $Columnas) 
		{
			++$NumeroColumnas;
		}
		if(!$Tabla[0][2] == '')
		{
			for ($i=0; $i < $NumeroColumnas; $i++) 
			{ 
				echo "<div class='product'>
						<div class='inner-product'>
							<div class='figure-image'>
								<a href='single.php'><img src='".$Tabla[$i][3]."' alt='Game 1'></a>
							</div>
							<h3 class='product-title'><a href='#''>".$Tabla[$i][2]."</a></h3>
							<small class='price'>$".$Tabla[$i][0]."</small>
							<p>".$Tabla[$i][1]."</p>
							<a href='cart.php' class='button'>Reservar</a>
							<a href='#' class='button muted'>Read Details</a>
						</div>
					</div>";
			}
		}
		else
		{
			echo "<div class='pagination-bar'>
					<span>No se obtuvieron resultados</span>
				</div>";
		}
	}
}
/////////////////////////////////
function CargarPesonas()
{
	$oPersona = new Conexion();
	$oPersona->Tabla = 'persona';
	$oPersona->Datos = array('id','nombre_apellido');
	$oPersona->Condicion = "";
	$Consulta = $oPersona->ObtenerFila();
	$ID = '';
	$Nombre = '';
	foreach ($Consulta as $key => $Columna) 
	{

 		foreach ($Columna as $Fila) 
 		{
 			if(!is_numeric($Fila))
 			{
 				$Nombre = $Fila;
 	    	}
 	    	else
 	    	{
 	    		$ID = $Fila;
 	    	}
	 	}
	 	echo "<option value='$ID'>$Nombre</option>";
	}
}
function CargarProdJuegos()
{
	$oJuego = new Conexion();
	$oJuego->Tabla = 'producto';
	$oJuego->Datos = array('id','nombre');
	$oJuego->Condicion = "rela_tipo_producto = '4'";
	$Consulta = $oJuego->ObtenerFila();
	$ID = '';
	$Nombre = '';
	foreach ($Consulta as $key => $Columna) 
	{

 		foreach ($Columna as $Fila) 
 		{
 			if(!is_numeric($Fila))
 			{
 				$Nombre = $Fila;
 	    	}
 	    	else
 	    	{
 	    		$ID = $Fila;
 	    	}
	 	}
	 	echo "<option value='$ID'>$Nombre</option>";
	}
}
function CargarProdConsolas()
{
	$oConsola = new Conexion();
	$oConsola->Tabla = 'producto';
	$oConsola->Datos = array('id','nombre');
	$oConsola->Condicion = "rela_tipo_producto = '1'";
	$Consulta = $oConsola->ObtenerFila();
	$ID = '';
	$Nombre = '';
	foreach ($Consulta as $key => $Columna) 
	{

 		foreach ($Columna as $Fila) 
 		{
 			if(!is_numeric($Fila))
 			{
 				$Nombre = $Fila;
 	    	}
 	    	else
 	    	{
 	    		$ID = $Fila;
 	    	}
	 	}
	 	echo "<option value='$ID'>$Nombre</option>";
	}
}
function CargarProdAccesorio()
{
	$oAcc = new Conexion();
	$oAcc->Tabla = 'producto';
	$oAcc->Datos = array('id','nombre');
	$oAcc->Condicion = "rela_tipo_producto = '3'";
	$Consulta = $oAcc->ObtenerFila();
	$ID = '';
	$Nombre = '';
	foreach ($Consulta as $key => $Columna) 
	{

 		foreach ($Columna as $Fila) 
 		{
 			if(!is_numeric($Fila))
 			{
 				$Nombre = $Fila;
 	    	}
 	    	else
 	    	{
 	    		$ID = $Fila;
 	    	}
	 	}
	 	echo "<option value='$ID'>$Nombre</option>";
	}
}
function CargarProdMercha()
{
	$oMercha = new Conexion();
	$oMercha->Tabla = 'producto';
	$oMercha->Datos = array('id','nombre');
	$oMercha->Condicion = "rela_tipo_producto = '2'";
	$Consulta = $oMercha->ObtenerFila();
	$ID = '';
	$Nombre = '';
	foreach ($Consulta as $key => $Columna) 
	{

 		foreach ($Columna as $Fila) 
 		{
 			if(!is_numeric($Fila))
 			{
 				$Nombre = $Fila;
 	    	}
 	    	else
 	    	{
 	    		$ID = $Fila;
 	    	}
	 	}
	 	echo "<option value='$ID'>$Nombre</option>";
	}
}
function CargarProdFAccion()
{
	$oAccion = new Conexion();
	$oAccion->Tabla = 'producto';
	$oAccion->Datos = array('id','nombre');
	$oAccion->Condicion = "rela_tipo_producto = '5'";
	$Consulta = $oAccion->ObtenerFila();
	$ID = '';
	$Nombre = '';
	foreach ($Consulta as $key => $Columna) 
	{

 		foreach ($Columna as $Fila) 
 		{
 			if(!is_numeric($Fila))
 			{
 				$Nombre = $Fila;
 	    	}
 	    	else
 	    	{
 	    		$ID = $Fila;
 	    	}
	 	}
	 	echo "<option value='$ID'>$Nombre</option>";
	}
}