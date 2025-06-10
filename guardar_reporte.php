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
    $fotoNombre = ""; // Valor por defecto

    // Validar campos requeridos
    if (empty($nombre) || empty($correo) || empty($fecha) || empty($hotel) || empty($categoria) || empty($descripcion)) {
        die("Error: Faltan campos obligatorios.");
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
            die("Error al subir la imagen.");
        }
    }

    // Inserción en la base de datos
    $stmt = $conexion->prepare("INSERT INTO reportes_objetos 
        (nombre_reportante, numero_colaborador, correo, fecha_perdida, hotel, categoria, descripcion, foto_nombre)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Error en la preparación: " . $conexion->error);
    }

    $stmt->bind_param("sissssss", $nombre, $numero_col, $correo, $fecha, $hotel, $categoria, $descripcion, $fotoNombre);

    if ($stmt->execute()) {
        echo "<h3>✅ Reporte guardado correctamente.</h3>";
        echo "<a href='admin_reporte.php'>Volver</a>";  // HAAAAAYYY QUEEE CHEEECAAAAAAR ESTOOSOSOSOASOASASOASOASOAS saminamina EEE E E E HUACA UACA EEE EE
    } else {
        echo "❌ Error al guardar el reporte: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
} else {
    echo "Acceso no permitido.";
}
?>
