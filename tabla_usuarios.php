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

  <!-- Filtro de búsqueda -->
  <div class="row mb-3">
    <div class="col-md-4">
      <select id="columnaFiltro" class="form-select">
        <option value="1">Nombre</option>
        <option value="2">Correo</option>
        <option value="3">Fecha Registro</option>
      </select>
    </div>
    <div class="col-md-6">
      <input type="text" id="busqueda" class="form-control" placeholder="Buscar...">
    </div>
    <div class="col-md-2">
      <button class="btn btn-secondary w-100" onclick="limpiarBusqueda()">Limpiar</button>
    </div>
  </div>

  <div class="table-responsive">
    <table id="tablaUsuarios" class="table table-hover table-bordered table-light">
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

<!-- Script de filtro -->
<script>
  const inputBusqueda = document.getElementById("busqueda");
  const columnaFiltro = document.getElementById("columnaFiltro");

  inputBusqueda.addEventListener("keyup", function () {
    const filtro = inputBusqueda.value.toLowerCase();
    const columna = parseInt(columnaFiltro.value);
    const filas = document.querySelectorAll("#tablaUsuarios tbody tr");

    filas.forEach(fila => {
      const celda = fila.children[columna]?.innerText.toLowerCase() || "";
      fila.style.display = celda.includes(filtro) ? "" : "none";
    });
  });

  function limpiarBusqueda() {
    inputBusqueda.value = "";
    document.querySelectorAll("#tablaUsuarios tbody tr").forEach(fila => {
      fila.style.display = "";
    });
  }
</script>

</body>
</html>
