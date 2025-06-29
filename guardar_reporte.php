<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $numero_col = !empty($_POST['numero_col']) ? intval($_POST['numero_col']) : null;
    $correo = trim($_POST['correo'] ?? '');
    $fecha = $_POST['fecha'] ?? '';
    $hotel = $_POST['hotel'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $descripcion = trim($_POST['descripcion'] ?? '');
    $fotoNombre = "";
    $origen = $_POST['origen'] ?? 'admin_reporte.php'; // Por defecto

    // Validar campos requeridos
    if (empty($nombre) || empty($correo) || empty($fecha) || empty($hotel) || empty($categoria) || empty($descripcion)) {
        header("Location: $origen?error=" . urlencode("Faltan campos obligatorios."));
        exit;
    }

    // Procesar imagen si fue cargada
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $fotoTmp = $_FILES['foto']['tmp_name'];
        $fotoNombre = uniqid() . '_' . basename($_FILES['foto']['name']);
        $rutaDestino = 'uploads/' . $fotoNombre;

        if (!file_exists('uploads')) {
            mkdir('uploads', 0777, true);
        }

        if (!move_uploaded_file($fotoTmp, $rutaDestino)) {
            header("Location: $origen?error=" . urlencode("Error al subir la imagen."));
            exit;
        }
    }

    // Insertar en base de datos
    $stmt = $conexion->prepare("INSERT INTO reportes_objetos 
        (nombre_reportante, numero_colaborador, correo, fecha_perdida, hotel, categoria, descripcion, foto_nombre)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        header("Location: $origen?error=" . urlencode("Error en la preparación: " . $conexion->error));
        exit;
    }

    $stmt->bind_param("sissssss", $nombre, $numero_col, $correo, $fecha, $hotel, $categoria, $descripcion, $fotoNombre);

    if ($stmt->execute()) {
        header("Location: $origen?success=1");
        exit;
    } else {
        header("Location: $origen?error=" . urlencode("Error al guardar el reporte."));
        exit;
    }

    $stmt->close();
    $conexion->close();
} else {
    echo "Acceso no permitido.";
}
?>
