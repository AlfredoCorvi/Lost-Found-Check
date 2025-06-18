<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte</title>
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
<body id="info">

<div class="center-wrapper">

  <!-- FORMULARIO DE REGISTRO -->
  <div class="glass-box mb-5" style="max-width: 600px; width: 100%;">
    <form class="needs-validation" novalidate id="registro-cuenta" method="POST" action="registro.php">
      <h4 class="mb-4 text-center">Crear Nueva Cuenta</h4>

      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre Completo</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
        <div class="invalid-feedback">Ingrese su nombre.</div>
      </div>

      <div class="mb-3">
        <label for="correo" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" id="correo" name="correo" required>
        <div class="invalid-feedback">Ingrese un correo válido.</div>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" required minlength="6">
        <div class="invalid-feedback">Mínimo 6 caracteres.</div>
      </div>

      <div class="d-flex justify-content-between">
        <button class="btn btn-danger" type="reset">Limpiar</button>
        <button class="btn btn-success" type="submit">Registrarse</button>
      </div>
    </form>
  </div>

  <!-- TABLA -->
  <div class="glass-box table-responsive" style="max-width: 900px; width: 100%;">
    <table class="table table-hover table-bordered text-white mb-0 col-4">
      <thead class="table-light text-dark">
        <h2>USUARIOS</h2>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Usuario</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <!-- Más filas si deseas -->
      </tbody>
    </table>
  </div>

  <br><br>

  <!-- TABLA -->
  <div class="glass-box table-responsive" style="max-width: 900px; width: 100%;">
    <table class="table table-hover table-bordered text-white mb-0 col-4">
      <thead class="table-light text-dark">
        <h2>OBJETOS</h2>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Usuario</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <!-- Más filas si deseas -->
      </tbody>
    </table>
  </div>

</div>

<!-- Botón Volver -->
<a class="btn btn-danger btn-volver" href="admin_reporte.php">Volver</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
