<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="disenos/resportes.css">
</head>
<body>
    
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

<br><br><br>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>John</td>
      <td>Doe</td>
      <td>@social</td>
    </tr>
  </tbody>
</table>

<a class="btn btn-danger" href="admin_reporte.php">Volver</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>