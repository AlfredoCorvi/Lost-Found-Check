<?php
session_start();
require 'conexion.php';

$alerta = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $password = $_POST['password'];

    if (empty($nombre) || empty($correo) || empty($password)) {
        $alerta = ['tipo' => 'error', 'mensaje' => 'Por favor complete todos los campos.'];
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $alerta = ['tipo' => 'error', 'mensaje' => 'Correo electrónico inválido.'];
    } elseif (strlen($password) < 6) {
        $alerta = ['tipo' => 'error', 'mensaje' => 'La contraseña debe tener al menos 6 caracteres.'];
    } else {
        $stmt = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $alerta = ['tipo' => 'error', 'mensaje' => 'El correo ya está registrado.'];
        } else {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, correo, password_hash) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nombre, $correo, $password_hash);

            if ($stmt->execute()) {
                $alerta = ['tipo' => 'success', 'mensaje' => 'Registro completado. Ahora puede iniciar sesión.'];
            } else {
                $alerta = ['tipo' => 'error', 'mensaje' => 'Error al registrar usuario.'];
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registro / Iniciar Sesión</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="disenos/formularios.css"/>
</head>
<body>
  <video autoplay muted loop id="videoFondo">
    <source src="images/playa.mp4" type="video/mp4">
    Tu navegador no soporta video HTML5.
  </video>
  <div style="position: fixed; top:0; left:0; width:100%; height:100vh; background: rgba(0,0,0,0.3); z-index:-1;"></div>

  <div id="LFC">
    <div id="lfch1" class="mt-2">
      <center><strong><h1>LOST & FOUND CHECK</h1></strong></center>
    </div>
  </div>
  <div class="container d-flex justify-content-center align-items-center min-vh-90 mt-4">
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
          <form class="needs-validation" novalidate id="registro-cuenta" method="POST" action="registro.php">
            <h4 class="mb-3 text-center">Crear Nueva Cuenta</h4>

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

        <!-- Inicio de sesión -->
        <div class="tab-pane fade" id="login" role="tabpanel">
          <form class="needs-validation" novalidate id="inicio-sesion" method="POST" action="login.php">
            <input type="hidden" name="origen" value="registro.php">
            <h4 class="mb-3 text-center">Iniciar Sesión</h4>

            <div class="mb-3">
              <label for="correo-login" class="form-label">Correo electrónico</label>
              <input type="email" class="form-control" id="correo-login" name="correo" required>
              <div class="invalid-feedback">Ingrese su correo.</div>
            </div>

            <div class="mb-3">
              <label for="password-login" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="password-login" name="password" required>
              <div class="invalid-feedback">Ingrese su contraseña.</div>
            </div>

            <div class="d-flex justify-content-between">
              <button class="btn btn-danger" type="reset">Limpiar</button>
              <button class="btn btn-success" type="submit">Entrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

<?php if ($alerta): ?>
<script>
  Swal.fire({
    icon: '<?= $alerta['tipo'] ?>',
    title: '<?= $alerta['tipo'] === 'success' ? 'Éxito' : 'Error' ?>',
    text: <?= json_encode($alerta['mensaje']) ?>,
    confirmButtonColor: '<?= $alerta['tipo'] === 'success' ? '#3085d6' : '#d33' ?>'
  });
</script>
<?php endif; ?>
<?php if (isset($_GET['error'])): ?>
<script>
  Swal.fire({
    icon: 'error',
    title: 'Error',
    text: <?= json_encode($_GET['error']) ?>,
    confirmButtonColor: '#d33'
  });
</script>
<?php endif; ?>

</body>
</html>
