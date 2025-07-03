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
  <!-- Filtro con búsqueda y selección de columna -->
  <div class="row mb-3">
  <!-- Selector de columna -->
  <div class="col-12 col-md-3 mb-2 mb-md-0">
    <select id="columnaFiltro" class="form-select">
      <option value="1">Reportante</option>
      <option value="2">No. Colaborador</option>
      <option value="3">Correo</option>
      <option value="4">Fecha</option>
      <option value="5">Hotel</option>
      <option value="6">Categoría</option>
      <option value="8">Estado</option>
    </select>
  </div>

  <!-- Input con botones al lado -->
  <div class="col-12 col-md-9">
    <div class="input-group">
      <input type="text" id="busqueda" class="form-control" placeholder="Buscar...">
      <button class="btn btn-danger" onclick="limpiarBusqueda()">Limpiar</button>
      <a href="admin_panel.php" class="btn btn-secondary">Menú</a>
    </div>
  </div>
</div>

  <!-- Filtro con búsqueda y selección de columna -->
  <div class="row mb-3">
    <div class="col-md-4">
      <select id="columnaFiltro" class="form-select">
        <option value="1">Reportante</option>
        <option value="2">No. Colaborador</option>
        <option value="3">Correo</option>
        <option value="4">Fecha</option>
        <option value="5">Hotel</option>
        <option value="6">Categoría</option>
        <option value="8">Estado</option>
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
    <table id="tablaObjetos" class="table table-hover table-bordered table-light">
      <thead class="table-dark">
        <tr>
          <th>Reportante</th>
          <th>No. Colaborador</th>
          <th>Correo</th>
          <th>Fecha</th>
          <th>Hotel</th>
          <th>Categoría</th>
          <th>Descripción</th>
          <th>Estado</th>
<<<<<<< HEAD
          <th>Evidencia</th>
=======
>>>>>>> 24ce9a5496f593a428f532302aa81d41bcf3343a
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($resultado->num_rows > 0) {
          $i = 1;
          while ($fila = $resultado->fetch_assoc()) {
            $estado = htmlspecialchars($fila['estado']);
            echo "<tr>";
            echo "<td>" . htmlspecialchars($fila['nombre_reportante']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['numero_colaborador']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['correo']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['fecha_perdida']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['hotel']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['categoria']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['descripcion']) . "</td>";
            echo "<td>" . $estado . "</td>";
            echo "<td>";
<<<<<<< HEAD
            if (!empty($fila['foto_nombre'])) {
                $rutaImagen = 'uploads/' . htmlspecialchars($fila['foto_nombre']);
                echo "<a href='$rutaImagen' target='_blank'>";
                echo "<img src='$rutaImagen' alt='Evidencia' width='100' height='100' style='object-fit:cover; border-radius:8px;'>";
                echo "</a>";
            } else {
                echo "Sin evidencia";
            }
            echo "</td>";

            echo "<td>";
            echo "<div class='d-flex justify-content-center gap-2'>";

            // Botón ENCONTRADO
            echo "<form method='POST' action='acciones_objeto.php'>";
=======

            // Botón ENCONTRADO
            echo "<form method='POST' action='acciones_objeto.php' style='display:inline-block;'>";
>>>>>>> 24ce9a5496f593a428f532302aa81d41bcf3343a
            echo "<input type='hidden' name='id' value='" . $fila['id'] . "'>";
            echo "<input type='hidden' name='accion' value='encontrado'>";
            if ($estado === 'encontrado') {
              echo "<button type='submit' class='btn btn-secondary btn-sm' disabled>Encontrado</button>";
            } else {
              echo "<button type='submit' class='btn btn-success btn-sm'>Encontrado</button>";
            }
<<<<<<< HEAD
            echo "</form>";

            // Botón ELIMINAR
            echo "<form method='POST' action='acciones_objeto.php'>";
=======
            echo "</form> ";

            // Botón ELIMINAR
            echo "<form method='POST' action='acciones_objeto.php' style='display:inline-block; margin-left:5px;'>";
>>>>>>> 24ce9a5496f593a428f532302aa81d41bcf3343a
            echo "<input type='hidden' name='id' value='" . $fila['id'] . "'>";
            echo "<input type='hidden' name='accion' value='eliminar'>";
            echo "<button type='submit' class='btn btn-danger btn-sm'>Eliminar</button>";
            echo "</form>";

<<<<<<< HEAD
            echo "</div>";
            echo "</td>";

=======
            echo "</td>";
>>>>>>> 24ce9a5496f593a428f532302aa81d41bcf3343a
            echo "</tr>";
            $i++;
          }
        } else {
          echo "<tr><td colspan='10' class='text-center'>No hay objetos reportados.</td></tr>";
        }
        ?>
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
    const filas = document.querySelectorAll("#tablaObjetos tbody tr");

    filas.forEach(fila => {
      const celda = fila.children[columna]?.innerText.toLowerCase() || "";
      fila.style.display = celda.includes(filtro) ? "" : "none";
    });
  });

  function limpiarBusqueda() {
    inputBusqueda.value = "";
    document.querySelectorAll("#tablaObjetos tbody tr").forEach(fila => {
      fila.style.display = "";
    });
  }
</script>

</body>
</html>
