<?php
session_start();
require 'conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte de Objeto Perdido</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="disenos/resportes.css">
</head>
<body>

<div class="container pt-3">
  <div class="d-flex justify-content-end mb-0">
    <form action="logout.php" method="post">
      <button class="btn btn-danger" type="submit" id="cerrar">Cerrar Sesión</button>
    </form>
  </div>
</div>

<div class="container d-flex justify-content-center py-5">
  <form class="row g-3 needs-validation p-4 rounded shadow" novalidate id="registro-cosas" action="guardar_reporte.php" method="POST" enctype="multipart/form-data">
    <h2 class="mb-4 text-center">Reporte de Objeto Perdido</h2>

    <div class="col-md-6">
      <label for="nombre" class="form-label">Nombre <span style="color: red;">*</span></label>
      <input type="text" class="form-control" id="nombre" name="nombre" required>
      <div class="invalid-feedback">Por favor ingrese su nombre.</div>
    </div>

    <div class="col-md-6">
      <label for="correo" class="form-label">Correo electrónico <span style="color: red;">*</span></label>
      <input type="email" class="form-control" id="correo" name="correo" required>
      <div class="invalid-feedback">Ingrese un correo electrónico válido.</div>
    </div>

    <div class="col-md-6">
      <label for="fecha" class="form-label">Fecha de pérdida <span style="color: red;">*</span></label>
      <input type="date" class="form-control" id="fecha" name="fecha" required>
      <div class="invalid-feedback">Seleccione una fecha válida.</div>
    </div>

    <div class="col-md-6">
      <label for="hotel" class="form-label">Hotel <span style="color: red;">*</span></label>
      <select class="form-select" id="hotel" name="hotel" required>
        <option selected disabled value="">Seleccione...</option>
        <option>Dreams Golf & Spa Resort, Playa Mujeres</option>
        <option>Secret Golf & Spa Resort, Playa Mujeres</option>
      </select>
      <div class="invalid-feedback">Seleccione una ubicación.</div>
    </div>

    <div class="col-md-6">
      <label for="categoria" class="form-label">Categoría <span style="color: red;">*</span></label>
      <select class="form-select" id="categoria" name="categoria" required>
        <option selected disabled value="">Seleccione...</option>
        <option>Accesorios</option>
        <option>Articulo Personal</option>
        <option>Documentos</option>
        <option>Electronico</option>
        <option>Joyeria</option>
        <option>Ropa</option>
      </select>
      <div class="invalid-feedback">Seleccione una categoría.</div>
    </div>

    <div class="col-12">
      <label for="descripcion" class="form-label">Descripción del objeto <span style="color: red;">*</span></label>
      <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
      <div class="invalid-feedback">Describa el objeto extraviado.</div>
    </div>

    <div class="col-12">
      <label for="foto" class="form-label">Foto del objeto (opcional)</label>
      <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
      <div class="invalid-feedback">Suba una imagen del objeto.</div>
    </div>

    <div class="col-12 d-flex justify-content-between">
      <button class="btn btn-danger" type="reset">Limpiar</button>
      <a class="btn btn-warning" href="objetusuario.php">Reportes</a>
      <input type="hidden" name="origen" value="huesped_reporte.php">
      <button class="btn btn-success" type="submit">Enviar</button>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

<?php if (isset($_GET['error']) || isset($_GET['success'])): ?>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    Swal.fire({
      icon: <?= isset($_GET['success']) ? "'success'" : "'error'" ?>,
      title: <?= isset($_GET['success']) ? "'Éxito'" : "'Error'" ?>,
      text: <?= json_encode($_GET['success'] ?? $_GET['error']) ?>,
      confirmButtonColor: <?= isset($_GET['success']) ? "'#3085d6'" : "'#d33'" ?>
    });
  </script>
<?php endif; ?>

</body>
</html>
