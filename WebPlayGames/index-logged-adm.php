<?php 
	include 'PHP/Clases.php'; 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Ecommerce Video Game</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:100,300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="fonts/lineo-icon/style.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="styleeze.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>


	<body class="slider-collapse">

		<div id="site-content">

			<div class="site-header">

				<div class="container">
					<a href="index-logged.php" id="branding">
						<img src="images/logo5.png" alt="" class="logo">
						<div class="logo-text">
							<h1 class="site-title">PLAY GAMES</h1>
							<small class="site-description">Venta de Videojuegos y Accesorios</small>
						</div>
					</a> <!-- #branding -->
					<div class="left-section pull-left">
						<div class="widget">
							<h3 class="widget-title"> Bienvenido: <?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} ?></h3>
						</div>
					</div>
					<div class="right-section pull-right">
						<a href="cart.php" class="cart"><i class="icon-cart"></i> 0 items in cart</a>
						<a href="acciones-adm.php" class="cart">Acciones</a>
						<a href="index.php">(Cerrar Sesión)</a>
					</div> <!-- .right-section -->

					<div class="main-navigation">
						<button class="toggle-menu"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item home current-menu-item"><a href="index-logged.php"><i class="icon-home"></i></a></li>
							<li class="menu-item"><a href="productoaccesorio.php">Accesorios</a></li>
							<li class="menu-item"><a href="productoconsola.php">Consolas</a></li>
							<li class="menu-item"><a href="productoplaystation.php">Playstation</a></li>
							<li class="menu-item"><a href="productoxbox.php">Xbox</a></li>
							<li class="menu-item"><a href="productonintendo.php">Nintendo</a></li>
							<li class="menu-item"><a href="productomerchandising.php">Merchandising</a></li>
							<li class="menu-item"><a href="productofiguradeaccion.php">Figuras de Accion</a></li>
						</ul> <!-- .menu -->
						<div class="search-form">
							<label><img src="images/icon-search.png"></label>
							<input type="text" placeholder="Search...">
						</div> <!-- .search-form -->

						<div class="mobile-navigation"></div> <!-- .mobile-navigation -->
					</div> <!-- .main-navigation -->
				</div> <!-- .container -->
			</div> <!-- .site-header -->

			<div class="home-slider">
				<ul class="slides">
					<li data-bg-image="dummy/slide-1.jpg">
						<div class="container">
							<div class="slide-content">
								<h2 class="slide-title">FIFA 17</h2>
								<small class="slide-subtitle">$1.400</small>
								
								<p>FIFA 17 es un videojuego de fútbol desarrollado por EA Electronic publicado por EA Sports EA. y Es el 24.º de la serie y salió a la venta el 28 de septiembre del 2016 en Norteamérica y el 29 de septiembre para el resto del mundo.2 Este será el primer juego de la FIFA en la serie en emplear el motor de juego Frostbite..</p>
								
								<a href="cart.php" class="button">Reservar</a>
							</div>
															<!-- 16:9 aspect ratio -->
							<iframe width="560" height="315" src="https://www.youtube.com/embed/-3fjoe5Njpc" frameborder="0" allowfullscreen class="iframe-video"></iframe>
						</div>
					</li>
					<li data-bg-image="dummy/slide-2.jpg">
						<div class="container">
							<div class="slide-content">
								<h2 class="slide-title">Kill Zone 3</h2>
								<small class="slide-subtitle">$1.900</small>
								
								<p>Killzone 3 es un videojuego de acción en primera persona para PlayStation 3, desarrollado por Guerrilla Games y publicado por Sony Computer Entertainment. Es el cuarto juego de la serie Killzone.</p>
								
								<a href="cart.php" class="button">Reservar</a>
							</div>

							<iframe width="560" height="315" src="https://www.youtube.com/embed/jqF1jlhW1fE" frameborder="0" allowfullscreen class="iframe-video"></iframe>
						</div>
					</li>
					<li data-bg-image="dummy/slide-3.jpg">
						<div class="container">
							<div class="slide-content">
								<h2 class="slide-title">GTA V</h2>
								<small class="slide-subtitle">$1.500</small>
								
								<p>Grand Theft Auto V (abreviado como GTA V o GTA5) es un videojuego de acción-aventura de mundo abierto desarrollado por la compañía británica Rockstar North y distribuido por Rockstar Games. Fue lanzado el 17 de septiembre de 2013 para las consolas PlayStation 3 y Xbox 360.5 Posteriormente, fue lanzado para las consolas de nueva generación PlayStation 4 y Xbox One el 18 de noviembre de 2014 y finalmente para Microsoft Windows el 14 de abril de 2015. Se trató del primer gran título en la serie Grand Theft Auto desde que se estrenara Grand Theft Auto IV en 2008, el cual estrenó la «era HD» de la mencionada serie de videojuegos.</p>
								
								<a href="cart.php" class="button">Reservar</a>
								
							</div>

								<iframe width="560" height="315" src="https://www.youtube.com/embed/QkkoHAzjnUs" frameborder="0" allowfullscreen class="iframe-video"></iframe>						
						</div>		
					<li data-bg-image="dummy/slide-3.jpg">
						<div class="container">
							<div class="slide-content">
								<h2 class="slide-title">Dirt Rally</h2>
								<small class="slide-subtitle">$1.500</small>
								
								<p>Dirt Rally (escrito como DiRT Rally) es un videojuego de carreras desarrollado y publicado por Codemasters para Windows de Microsoft. Una versión de acceso anticipado del juego se liberó el 27 de abril de 2015, a través del servicio de distribución digital Steam. La versión final del juego se publicó el 7 de diciembre de 2015. El juego se publicó para las consolas de octava generación PlayStation 4 y Xbox One el 5 de abril de 2016. Está anunciada la versión para Linux/SteamOS.</p>
								
								<a href="cart.php" class="button">Reservar</a>
								
							</div>

								<iframe width="560" height="315" src="https://www.youtube.com/embed/3j7T6-YPXMQ" frameborder="0" allowfullscreen class="iframe-video"></iframe>						
						</div>
						<li data-bg-image="dummy/slide-3.jpg">
						<div class="container">
							<div class="slide-content">
								<h2 class="slide-title">Forza Horizon 3</h2>
								<small class="slide-subtitle">$1.500</small>
								
								<p>Forza Horizon 3 es un videojuego de carreras de mundo abierto desarrollado por Playground Games y Turn 10 Studios y distribuido por Microsoft Studios para Xbox One y Microsoft Windows 10. Fue revelado en el E3 2016 el 14 de junio de 2016. Es el tercer título de la saga Forza Horizon y estará ambientado en Australia.</p>
								
								<a href="cart.php" class="button">Reservar</a>
								
							</div>

								<iframe width="560" height="315" src="https://www.youtube.com/embed/vD1ccSM9qiA" frameborder="0" allowfullscreen class="iframe-video"></iframe>						
						</div>
				</ul> <!-- .slides -->
			</div> <!-- .home-slider -->

			<main class="main-content">
				<div class="container">
					<div class="page">
						<section>
							<header>
								<h2 class="section-title">Nuevos Productos</h2>
								<a href="#" class="all">Show All</a>
							</header>

							<div class="product-list">
							<?php FIltrarNuevosProductos(); ?>
								

							</div> <!-- .product-list -->

						</section>

						<section>
							<header>
								<h2 class="section-title">Promociones</h2>
								<a href="#" class="all">Show All</a>
							</header>

							<div class="product-list">
								
								<div class="product">
									<div class="inner-product">
										<div class="figure-image">
											<a href="single.php"><img src="dummy/game-5.jpg" alt="Game 1"></a>
										</div>
										<h3 class="product-title"><a href="#">Watch Dogs</a></h3>
										<small class="price">$19.00</small>
										<p>Lorem ipsum dolor sit consectetur adipiscing elit do eiusmod tempor...</p>
										<a href="cart.php" class="button">Reservar</a>
										<a href="#" class="button muted">Read Details</a>
									</div>
								</div> <!-- .product -->
								
								
								<div class="product">
									<div class="inner-product">
										<div class="figure-image">
											<a href="single.php"><img src="dummy/game-6.jpg" alt="Game 2"></a>
										</div>
										<h3 class="product-title"><a href="#">Mortal Kombat X</a></h3>
										<small class="price">$19.00</small>
										<p>Lorem ipsum dolor sit consectetur adipiscing elit do eiusmod tempor...</p>
										<a href="cart.php" class="button">Reservar</a>
										<a href="#" class="button muted">Read Details</a>
									</div>
								</div> <!-- .product -->
								
								
								<div class="product">
									<div class="inner-product">
										<div class="figure-image">
											<a href="single.php"><img src="dummy/game-7.jpg" alt="Game 3"></a>
										</div>
										<h3 class="product-title"><a href="#">Metal Gear Solid V</a></h3>
										<small class="price">$19.00</small>
										<p>Lorem ipsum dolor sit consectetur adipiscing elit do eiusmod tempor...</p>
										<a href="cart.php" class="button">Add to cart</a>
										<a href="#" class="button muted">Read Details</a>
									</div>
								</div> <!-- .product -->
								
								
								<div class="product">
									<div class="inner-product">
										<div class="figure-image">
											<a href="single.php"><img src="dummy/game-8.jpg" alt="Game 4"></a>
										</div>
										<h3 class="product-title"><a href="#">Nascar '14</a></h3>
										<small class="price">$19.00</small>
										<p>Lorem ipsum dolor sit consectetur adipiscing elit do eiusmod tempor...</p>
										<a href="cart.php" class="button">Reservar</a>
										<a href="#" class="button muted">Read Details</a>
									</div>
								</div> <!-- .product -->
								
							</div> <!-- .product-list -->

						</section>
					</div>
				</div> <!-- .container -->
			</main> <!-- .main-content -->

			<div class="site-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-2">
							<div class="widget">
								<h3 class="widget-title">Information</h3>
								<ul class="no-bullet">
									<li><a href="#">Site map</a></li>
									<li><a href="#">About us</a></li>
									<li><a href="#">FAQ</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Contact</a></li>
								</ul>
							</div> <!-- .widget -->
						</div> <!-- column -->
						<div class="col-md-2">
							<div class="widget">
								<h3 class="widget-title">Consumer Service</h3>
								<ul class="no-bullet">
									<li><a href="#">Secure</a></li>
									<li><a href="#">Shipping &amp; Returns</a></li>
									<li><a href="#">Shipping</a></li>
									<li><a href="#">Orders &amp; Returns</a></li>
									<li><a href="#">Group Sales</a></li>
								</ul>
							</div> <!-- .widget -->
						</div> <!-- column -->
						<div class="col-md-2">
							<div class="widget">
								<h3 class="widget-title">My Account</h3>
								<ul class="no-bullet">
									<li><a href="#">Login/Register</a></li>
									<li><a href="#">Settings</a></li>
									<li><a href="#">Cart</a></li>
									<li><a href="#">Order Tracking</a></li>
									<li><a href="#">Logout</a></li>
								</ul>
							</div> <!-- .widget -->
						</div> <!-- column -->
						<div class="col-md-6">
							<div class="widget">
								<h3 class="widget-title">Join our newsletter</h3>
								<form action="#" class="newsletter-form">
									<input type="text" placeholder="Enter your email...">
									<input type="submit" value="Subsribe">
								</form>
							</div> <!-- .widget -->
						</div> <!-- column -->
					</div><!-- .row --> 

					<div class="colophon">
						<div class="copy">Copyright 2014 Company name. Designed by Themezy. All rights reserved.</div>
						<div class="social-links square">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-google-plus"></i></a>
							<a href="#"><i class="fa fa-pinterest"></i></a>
						</div> <!-- .social-links -->
					</div> <!-- .colophon -->
				</div> <!-- .container -->
			</div> <!-- .site-footer -->
		</div>

		<div class="overlay"></div>

		<div class="auth-popup popup">
			<a href="#" class="close"><i class="fa fa-times"></i></a>
			<div class="row">
				<div class="col-md-6">
					<h2 class="section-title">Login</h2>
					<form action="#">
						<input type="text" placeholder="Username...">
						<input type="password" placeholder="Password...">
						<input type="submit" value="Login">
					</form>
				</div> <!-- .column -->
				<div class="col-md-6">
					<h2 class="section-title">Create an account</h2>
					<form action="#">
						<input type="text" placeholder="Username...">
						<input type="text" placeholder="Email address...">
						<input type="submit" value="register">
					</form>
				</div> <!-- .column -->
			</div> <!-- .row -->
		</div> <!-- .auth-popup -->

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>