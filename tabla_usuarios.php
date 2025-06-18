<?php
require 'conexion.php';
$resultado = $conexion->query("SELECT * FROM usuarios");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Usuarios Registrados</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container my-5">
  <h2 class="text-center mb-4">Usuarios Registrados</h2>

  <div class="table-responsive">
    <table class="table table-hover table-bordered table-light">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Fecha Registro</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($resultado->num_rows > 0): ?>
          <?php while ($fila = $resultado->fetch_assoc()): ?>
            <tr>
              <td><?= $fila['id'] ?></td>
              <td><?= htmlspecialchars($fila['nombre']) ?></td>
              <td><?= htmlspecialchars($fila['correo']) ?></td>
              <td><?= $fila['fecha_registro'] ?></td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="4" class="text-center">No hay usuarios.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <a href="admin_panel.php" class="btn btn-danger mt-3">Volver al Panel</a>
</div>

</body>
</html>
