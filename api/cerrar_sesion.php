<?php
require_once 'conexion.php';
$conexion->close();
session_destroy();
header("Location:index.php");
?>