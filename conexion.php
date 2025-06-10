<?php
$host = "localhost";     // o la IP del servidor de base de datos
$usuario = "root";
$contrasena = "";
$baseDeDatos = "lfc";

// Crear conexión
$conn = new mysqli($host, $usuario, $contrasena, $baseDeDatos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "Conexión exitosa";
?>
