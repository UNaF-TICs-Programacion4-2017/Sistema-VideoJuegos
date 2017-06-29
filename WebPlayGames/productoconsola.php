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
		
		<title>Ecommerce Video Game | Products</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:100,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="fonts/lineo-icon/style.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="styleeze.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>


	<body>
		
		<div id="site-content">
			<div class="site-header">
				<div class="container">
					<a href="index.php" id="branding">
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
						<a href="index.php">(Cerrar Sesión)</a>
					</div> <!-- .right-section -->

					<div class="main-navigation">
						<button class="toggle-menu"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item home current-menu-item"><a href="index.php"><i class="icon-home"></i></a></li>
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
							<input type="text" placeholder="Buscar...">
						</div> <!-- .search-form -->

						<div class="mobile-navigation"></div> <!-- .mobile-navigation -->
					</div> <!-- .main-navigation -->


				</div> <!-- .container -->
			</div> <!-- .site-header -->
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="filter-bar">
							<div class="filter">
							<form action="" method="POST">
								<span>
									<label>Ordenar Por:</label>
									<select name="consolas">
										<option value="0">Mostrar Todo</option>
										<?php CargarConsolas(); ?>
									</select>
								</span>
								<span>
									<label>Mostrar:</label>
									<select name="#">
										<option value="#">8</option>
										<option value="#">16</option>
										<option value="#">24</option>
									</select>
								</span>
								<span>
									<input type="submit" value="Filtrar">
								</span>
							</div> <!-- .filter -->
						</form>
							<div class="pagination">
								<a href="#" class="page-number"><i class="fa fa-angle-left"></i></a>
								<span class="page-number current">1</span>
								<a href="#" class="page-number">2</a>
								<a href="#" class="page-number">3</a>
								<a href="#" class="page-number">...</a>
								<a href="#" class="page-number">12</a>
								<a href="#" class="page-number"><i class="fa fa-angle-right"></i></a>
							</div> <!-- .pagination -->
						</div> <!-- .filter-bar -->
						
						<div class="product-list">
								<?php FiltrarConsolas(); ?>
								<!--<div class="product">
									<div class="inner-product">
										<div class="figure-image">
											<a href="single.php"><img src="dummy/game-1.jpg" alt="Game 1"></a>
										</div>
										<h3 class="product-title"><a href="#">Alpha Protocol</a></h3>
										<small class="price">$19.00</small>
										<p>Lorem ipsum dolor sit consectetur adipiscing elit do eiusmod tempor...</p>
										<a href="cart.php" class="button">Reservar</a>
										<a href="#" class="button muted">Read Details</a>
									</div>
								</div> -->

								
								
							</div> <!-- .product-list -->

						<!--<div class="pagination-bar">
							<div class="pagination">
								<a href="#" class="page-number"><i class="fa fa-angle-left"></i></a>
								<span class="page-number current">1</span>
								<a href="#" class="page-number">2</a>
								<a href="#" class="page-number">3</a>
								<a href="#" class="page-number">...</a>
								<a href="#" class="page-number">12</a>
								<a href="#" class="page-number"><i class="fa fa-angle-right"></i></a>
							</div> -->
						</div>
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
			<a href="#" class="close"><i class="fa fa-close"></i></a>
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