<?php
$host = "localhost";     // o la IP del servidor de base de datos
$usuario = "root";
$contrasena = "";
$baseDeDatos = "lfc";

// Crear conexión
$conexion = new mysqli($host, $usuario, $contrasena, $baseDeDatos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
