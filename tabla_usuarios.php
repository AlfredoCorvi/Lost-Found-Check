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
  <!-- Input con botones al lado -->
  <div class="col-12 col-md-5">
    <div class="input-group">
      <input type="text" id="busqueda" class="form-control" placeholder="Buscar...">
      <button class="btn btn-danger" onclick="limpiarBusqueda()">Limpiar</button>
      <a href="admin_panel.php" class="btn btn-secondary">Menú</a>
    </div>
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
              <!-- Botón que abre el modal -->
              <button class="btn btn-danger btn-sm" 
                      data-bs-toggle="modal" 
                      data-bs-target="#modalEliminar" 
                      data-id="<?= $fila['id'] ?>" 
                      data-nombre="<?= htmlspecialchars($fila['nombre']) ?>">
                Eliminar
              </button>

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

<!-- Modal de confirmación -->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form method="POST" action="eliminar_usuario.php" class="modal-content bg-dark text-white border-light">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEliminarLabel">Confirmar Eliminación</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <p>¿Estás seguro de que deseas eliminar al usuario <strong id="usuarioNombre"></strong>?</p>
        <input type="hidden" name="id" id="usuarioId">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Eliminar</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

<script>
  const modalEliminar = document.getElementById('modalEliminar');
  modalEliminar.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const userId = button.getAttribute('data-id');
    const userName = button.getAttribute('data-nombre');

    document.getElementById('usuarioId').value = userId;
    document.getElementById('usuarioNombre').textContent = userName;
  });
</script>

</body>
</html>
