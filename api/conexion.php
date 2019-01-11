<?php

$conexion=mysqli_connect('localhost','root','','bd_api');
mysqli_select_db($conexion,'bd_api');
session_start();

if (!$conexion)
	{
		die("Error de conexion a la BD: ".mysqli_connect_error());
	}
?>