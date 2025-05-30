<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form class="row g-3 needs-validation" novalidate>
  <div class="col-md-6">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" required>
    <div class="invalid-feedback">
      Por favor ingrese su nombre.
    </div>
  </div>

  <div class="col-md-6">
    <label for="correo" class="form-label">Correo electrónico</label>
    <input type="email" class="form-control" id="correo" required>
    <div class="invalid-feedback">
      Ingrese un correo electrónico válido.
    </div>
  </div>

  <div class="col-md-6">
    <label for="fecha" class="form-label">Fecha de pérdida</label>
    <input type="date" class="form-control" id="fecha" required>
    <div class="invalid-feedback">
      Seleccione una fecha válida.
    </div>
  </div>

  <div class="col-md-6">
    <label for="lugar" class="form-label">Lugar (Dreams o Secret)</label>
    <select class="form-select" id="lugar" required>
      <option selected disabled value="">Seleccione...</option>
      <option>Dreams</option>
      <option>Secret</option>
    </select>
    <div class="invalid-feedback">
      Seleccione una ubicación.
    </div>
  </div>

  <div class="col-md-12">
    <label for="descripcion" class="form-label">Descripción del objeto</label>
    <textarea class="form-control" id="descripcion" rows="3" required></textarea>
    <div class="invalid-feedback">
      Describa el objeto extraviado.
    </div>
  </div>

  <div class="col-md-12">
    <label for="foto" class="form-label">Foto del objeto</label>
    <input type="file" class="form-control" id="foto" accept="image/*" required>
    <div class="invalid-feedback">
      Suba una imagen del objeto.
    </div>
  </div>

  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="acepto" required>
      <label class="form-check-label" for="acepto">
        Confirmo que la información es verídica.
      </label>
      <div class="invalid-feedback">
        Debe confirmar para continuar.
      </div>
    </div>
  </div>

  <div class="col-12 d-flex justify-content-between">
    <button class="btn btn-secondary" type="reset">Limpiar</button>
    <button class="btn btn-primary" type="submit">Enviar Reporte</button>
  </div>
</form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>