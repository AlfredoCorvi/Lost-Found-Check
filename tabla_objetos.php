<?php
require 'conexion.php';
$resultado = $conexion->query("SELECT * FROM reportes_objetos");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Objetos Reportados</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container my-5">
  <h2 class="text-center mb-4">Objetos Reportados</h2>

  <div class="table-responsive">
    <table class="table table-hover table-bordered table-light">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Reportante</th>
          <th>No. Colaborador</th>
          <th>Correo</th>
          <th>Fecha</th>
          <th>Hotel</th>
          <th>Categoría</th>
          <th>Descripción</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($resultado->num_rows > 0) {
          $i = 1;
          while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>$i</td>";
            echo "<td>" . htmlspecialchars($fila['nombre_reportante']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['numero_colaborador']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['correo']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['fecha_perdida']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['hotel']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['categoria']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['descripcion']) . "</td>";
            echo "</tr>";
            $i++;
          }
        } else {
          echo "<tr><td colspan='8' class='text-center'>No hay objetos reportados.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <a href="admin_panel.php" class="btn btn-danger mt-3">Volver al Panel</a>
</div>

</body>
</html>
