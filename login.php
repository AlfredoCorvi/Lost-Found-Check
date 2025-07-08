<?php
session_start();
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['correo']);
    $password = $_POST['password'];
    $origen = isset($_POST['origen']) ? $_POST['origen'] : 'registro.php';

    if (empty($correo) || empty($password)) {
        header("Location: $origen?error=Tienes que llenar todos los campos.");
        exit;
    }

    $stmt = $conexion->prepare("SELECT id, password_hash FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($password, $usuario['password_hash'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['correo'] = $correo;

            if (str_ends_with($correo, '@secpm.onmicrosoft.com') || str_ends_with($correo, '@drepm.onmicrosoft.com')) {
                header("Location: admin_reporte.php");
            } else {
                header("Location: huesped_reporte.php");
            }
            exit;
        } else {
            header("Location: $origen?error=Contraseña incorrecta.");
            exit;
        }
    } else {
        header("Location: $origen?error=Usuario no encontrado.");
        exit;
    }
} else {
    header("Location: registro.php");
    exit;
}
?>
