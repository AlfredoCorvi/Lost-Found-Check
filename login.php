<?php
session_start();
require 'conexion.php'; // tu conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['correo']);
    $password = $_POST['password'];

    // Aquí puedes hacer la consulta para verificar usuario y contraseña, por ejemplo:
    $stmt = $conexion->prepare("SELECT id, password_hash FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
    // Verifica la contraseña con password_verify si la tienes hasheada
    if (password_verify($password, $usuario['password_hash'])) {
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['correo'] = $correo;

    if (str_ends_with($correo, '@secpm.onmicrosoft.com') || str_ends_with($correo, '@drepm.onmicrosoft.com')) {
        header("Location: admin_reporte.php");
        exit;
    } else {
        header("Location: huesped_reporte.php");
        exit;
    }
    } else {
        header("Location: registro.php?error=Contraseña incorrecta.");
        exit;
    }

    } else {
        header("Location: registro.php?error=Usuario no encontrado.");
        exit;
    }
} else {
    header("Location: registro.php"); // si no es POST, regresar
    exit;
}
?>
