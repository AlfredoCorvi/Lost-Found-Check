<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel Administrativo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #1f1c2c, #928dab);
      min-height: 100vh;
      color: white;
    }

    .dashboard-container {
      padding-top: 80px;
    }

    .card-option {
      transition: transform 0.3s, box-shadow 0.3s;
      border: none;
      border-radius: 15px;
      overflow: hidden;
    }

    .card-option:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.3);
    }

    .card-icon {
      font-size: 3rem;
      color: #ffffffcc;
    }

    .btn-logout {
      position: absolute;
      top: 20px;
      right: 20px;
    }

    .card-body {
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 0 0 15px 15px;
    }
  </style>
</head>
<body>

<!-- Botón de cerrar sesión o volver -->
<a href="admin_reporte.php" class="btn btn-danger btn-logout">Volver</a>

<div class="container dashboard-container text-center">
  <h1 class="mb-5 fw-bold">Panel Administrativo</h1>

  <div class="row g-4 justify-content-center">
    
    <!-- Opción 1: Usuarios -->
    <div class="col-md-4 col-sm-6">
      <a href="tabla_usuarios.php" class="text-decoration-none">
        <div class="card card-option bg-primary text-white">
          <div class="card-body py-5">
            <i class="bi bi-people card-icon"></i>
            <h4 class="mt-3">Ver Usuarios</h4>
          </div>
        </div>
      </a>
    </div>

    <!-- Opción 2: Objetos Reportados -->
    <div class="col-md-4 col-sm-6">
      <a href="tabla_objetos.php" class="text-decoration-none">
        <div class="card card-option bg-success text-white">
          <div class="card-body py-5">
            <i class="bi bi-box-seam card-icon"></i>
            <h4 class="mt-3">Ver Objetos Reportados</h4>
          </div>
        </div>
      </a>
    </div>

        <!-- Opción 3:Formulario Registro -->
    <div class="col-md-4 col-sm-6">
      <a href="reg_admin.php" class="text-decoration-none">
        <div class="card card-option bg-warning  text-white">
          <div class="card-body py-5">
            <i class="bi bi-journal-text card-icon"></i>
            <h4 class="mt-3">Formulario Registro</h4>
          </div>
        </div>
      </a>
    </div>
    <!-- Puedes agregar más opciones si es necesario -->
    
  </div>
</div>

</body>
</html>
