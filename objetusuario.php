<?php
session_start();
require 'conexion.php';

// Verificar si hay sesión activa
if (!isset($_SESSION['correo'])) {
    header("Location: login.php");
    exit;
}

$correo_usuario = $_SESSION['correo'];

// Consulta de reportes del usuario logueado
$sql = "SELECT id, nombre_reportante, fecha_perdida, hotel, categoria, descripcion, estado FROM reportes_objetos WHERE correo = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $correo_usuario);
$stmt->execute();
$resultado = $stmt->get_result();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIS REPORTES</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="disenos/resportes.css">
  <style>
    .glass-box {
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border-radius: 20px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
      border: 1px solid rgba(255, 255, 255, 0.3);
      padding: 40px;
      color: white;
    }

    .center-wrapper {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 40px 20px;
    }

    .table thead th {
      background-color: rgba(255, 255, 255, 0.85);
      color: #000;
    }

    .btn-danger, .btn-success {
      font-weight: bold;
      border-radius: 10px;
    }

    h4 {
      color: white;
    }

    .btn-volver {
      position: fixed;
      bottom: 20px;
      left: 20px;
      z-index: 1000;
    }
  </style>
</head>
<body>
  <div class="center-wrapper">
    <div class="glass-box table-responsive text-center" style="max-width: 900px; width: 100%;">
      <h2 class="text-white mb-4">OBJETOS REPORTADOS</h2>
      <table class="table table-hover table-bordered text-white mb-0">
        <thead class="table-light text-dark">
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Objeto</th>
            <th>Fecha</th>
            <th>Hotel</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $contador = 1;
          while ($fila = $resultado->fetch_assoc()) {
              echo "<tr>";
              echo "<th scope='row'>{$contador}</th>";
              echo "<td>" . htmlspecialchars($fila['nombre_reportante']) . "</td>";
              echo "<td>" . htmlspecialchars($fila['descripcion']) . "</td>";
              echo "<td>" . htmlspecialchars($fila['fecha_perdida']) . "</td>";
              echo "<td>" . htmlspecialchars($fila['hotel']) . "</td>";
              echo "<td>" . htmlspecialchars($fila['estado']) . "</td>";
              echo "</tr>";
              $contador++;
          }

          if ($contador === 1) {
              echo "<tr><td colspan='4'>No se encontraron reportes.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

    <!-- Botón volver -->
    <a class="btn btn-danger btn-volver" href="huesped_reporte.php">Volver</a>
  </div>
</body>

</html>