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
<<<<<<< HEAD
  <!-- Input con botones al lado -->
  <div class="col-12 col-md-5">
    <div class="input-group">
      <input type="text" id="busqueda" class="form-control" placeholder="Buscar...">
      <button class="btn btn-danger" onclick="limpiarBusqueda()">Limpiar</button>
      <a href="admin_panel.php" class="btn btn-secondary">Menú</a>
    </div>
  </div>
</div>
=======
    <div class="col-md-6">
      <input type="text" id="busqueda" class="form-control" placeholder="Buscar...">
    </div>
    <div class="col-md-2">
      <button class="btn btn-secondary w-100" onclick="limpiarBusqueda()">Limpiar</button>
    </div>
  </div>
>>>>>>> 24ce9a5496f593a428f532302aa81d41bcf3343a

  <div class="table-responsive">
    <table id="tablaUsuarios" class="table table-hover table-bordered table-light">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Fecha Registro</th>
          <th>Acciones</th> <!-- Nueva columna -->
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
              <td>
                <form method="POST" action="eliminar_usuario.php" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                  <input type="hidden" name="id" value="<?= $fila['id'] ?>">
                  <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="5" class="text-center">No hay usuarios.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
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
