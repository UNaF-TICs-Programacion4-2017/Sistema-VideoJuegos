<?php
session_start();
session_unset($_SESSION['username']);
session_destroy();
if(empty($_SESSION['username']))
{
	header("location: index.php");
}
else
{
	echo "Debe iniciar sesión nuevamente";
}