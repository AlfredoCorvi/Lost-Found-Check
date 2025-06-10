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
  <div class="d-flex justify-content-end" style="margin-bottom: 8%;">
    <form action="logout.php" method="post">
      <button class="btn btn-danger" type="submit" id="cerrar">Cerrar Sesión</button>
    </form>
  </div>
</div>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <form class="row g-3 needs-validation p-4 rounded shadow" novalidate id="registro-cosas" enctype="multipart/form-data" action="guardar_reporte.php" method="POST">
      <h2 class="mb-4 text-center">Reporte de Objeto Perdido</h2>

      <div class="col-md-6">
        <label for="nombre" class="form-label">Nombre <span style="color: red;">*</span></label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
        <div class="invalid-feedback">Por favor ingrese su nombre.</div>
      </div>

      <div class="col-md-6">
        <label for="nombre" class="form-label">No. Colaborador</label>
        <input type="number" class="form-control" id="numero-col" name="numero-col">
        <div class="invalid-feedback">Por favor ingrese su numero de colaborador.</div>
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
        <label for="lugar" class="form-label">Hotel <span style="color: red;">*</span></label>
        <select class="form-select" id="lugar" name="hotel" required>
          <option selected disabled value="">Seleccione...</option>
          <option>Dreams Golf Spa & Resort, Playa Mujeres</option>
          <option>Secret Golf Spa & Resort, Playa Mujeres</option>
        </select>
        <div class="invalid-feedback">Seleccione una ubicación. <span style="color: red;">*</span></div>
      </div>

        <div class="col-md-6">
            <label for="lugar" class="form-label">Categoria <span style="color: red;">*</span></label>
            <select class="form-select" id="categoria" name="categoria" required>
            <option selected disabled value="">Seleccione...</option>
            <option>Accesorios</option>
            <option>Articulo Personal</option>
            <option>Documentos</option>
            <option>Electronico</option>
            <option>Joyeria</option>
            <option>Ropa</option>
            </select>
            <div class="invalid-feedback">Seleccione una categoria. <span style="color: red;">*</span></div>
        </div>

      <div class="col-12">
        <label for="descripcion" class="form-label">Descripción del objeto <span style="color: red;">*</span></label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
        <div class="invalid-feedback">Describa el objeto extraviado.</div>
      </div>

      <div class="col-12">
        <label for="foto" class="form-label">Foto del objeto <span style="color: red;">*</span></label>
        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
        <div class="invalid-feedback">Suba una imagen del objeto.</div>
      </div>

      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="acepto" required>
          <label class="form-check-label" for="acepto">Confirmo que la información es verídica. <span style="color: red;">*</span></label>
          <div class="invalid-feedback">Debe confirmar para continuar.</div>
        </div>
      </div>

      <div class="col-12 d-flex justify-content-between">
        <div class="col-12 d-flex justify-content-between">
        <button class="btn btn-danger" type="reset">Limpiar</button>
        <a class="btn btn-warning" href="report.php">Registros</a>
        <button class="btn btn-success" type="submit">Enviar</button>
      </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
