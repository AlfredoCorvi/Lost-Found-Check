<?php
require 'conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registro / Iniciar Sesión</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="disenos/formularios.css"/>
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow p-4 w-100" style="max-width: 500px;">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs mb-4" id="formTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="registro-tab" data-bs-toggle="tab" data-bs-target="#registro" type="button" role="tab">Registro</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab">Iniciar Sesión</button>
        </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Registro -->
        <div class="tab-pane fade show active" id="registro" role="tabpanel">
          <form class="needs-validation" novalidate id="registro-cuenta">
            <h4 class="mb-3 text-center">Crear Nueva Cuenta</h4>

            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre Completo</label>
              <input type="text" class="form-control" id="nombre" required>
              <div class="invalid-feedback">Ingrese su nombre.</div>
            </div>

            <div class="mb-3">
              <label for="correo" class="form-label">Correo electrónico</label>
              <input type="email" class="form-control" id="correo" required>
              <div class="invalid-feedback">Ingrese un correo válido.</div>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="password" required minlength="6">
              <div class="invalid-feedback">Mínimo 6 caracteres.</div>
            </div>

            <div class="d-flex justify-content-between">
              <button class="btn btn-outline-secondary" type="reset">Limpiar</button>
              <button class="btn btn-success" type="submit">Registrarse</button>
            </div>
          </form>
        </div>

        <!-- Inicio de sesión -->
        <div class="tab-pane fade" id="login" role="tabpanel">
          <form class="needs-validation" novalidate id="inicio-sesion">
            <h4 class="mb-3 text-center">Iniciar Sesión</h4>

            <div class="mb-3">
              <label for="correo-login" class="form-label">Correo electrónico</label>
              <input type="email" class="form-control" id="correo-login" required>
              <div class="invalid-feedback">Ingrese su correo.</div>
            </div>

            <div class="mb-3">
              <label for="password-login" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="password-login" required>
              <div class="invalid-feedback">Ingrese su contraseña.</div>
            </div>

            <div class="d-flex justify-content-between">
              <button class="btn btn-outline-secondary" type="reset">Limpiar</button>
              <button class="btn btn-success" type="submit">Entrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    
    <a href="reg_huesp.php"><input type="button" value="reg_huesp"></a>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
