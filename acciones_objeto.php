<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $accion = $_POST['accion'];

    if ($accion === 'encontrado') {
        $stmt = $conexion->prepare("UPDATE reportes_objetos SET estado = 'encontrado' WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    } elseif ($accion === 'eliminar') {
        $stmt = $conexion->prepare("DELETE FROM reportes_objetos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}

header("Location: tabla_objetos.php");
exit;
