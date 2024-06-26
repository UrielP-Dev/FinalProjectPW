<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Registro de Administrador</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <style>
    .modal-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }
    .formulario {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    }
    .formulario form {
      color: black;
    }
    .fondo-secundario {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #6f95ff;
      z-index: -1;
    }
    .error-message {
      color: red;
      display: none;
    }
  </style>
</head>
<body>

<div class="fondo-secundario"></div>

<div class="modal-container">
  <div class="formulario">
    <h1 class="text-center mb-4">Formulario de Registro de Administrador</h1>
    <form id="adminForm" action="Process_Admin_registration.php" method="post">
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
      </div>
      <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="mb-3">
        <label for="codigo" class="form-label">Código de Administrador</label>
        <input type="password" class="form-control" id="codigo" name="codigo" required>
        <div id="error-message" class="error-message">Código de administrador incorrecto.</div>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Registrarse</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script>
document.getElementById('adminForm').addEventListener('submit', function(event) {
  event.preventDefault(); 

  var codigo = document.getElementById('codigo').value;
  var codigoCorrecto = 'admin123'; 
  var email = document.getElementById('email').value;
  var password = document.getElementById('password').value;

  // Validar formato de correo electrónico
  if (!validateEmail(email)) {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'El formato del correo electrónico no es válido.'
    });
    return;
  }

  // Validar longitud de la contraseña
  if (password.length < 8) {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'La contraseña debe tener al menos 8 caracteres.'
    });
    return;
  }

  // Validar código de administrador
  if (codigo !== codigoCorrecto) {
    document.getElementById('error-message').style.display = 'block';
    return;
  } else {
    document.getElementById('error-message').style.display = 'none';
  }

  // Envía el formulario con AJAX
  var formData = new FormData(this);
  fetch(this.action, {
    method: 'POST',
    body: formData
  }).then(response => response.text())
    .then(result => {
      if (result.includes('Success')) { 
        Swal.fire({
          icon: 'success',
          title: 'Registro exitoso',
          text: 'El administrador ha sido registrado correctamente',
          showConfirmButton: false,
          timer: 1000
        }).then(() => {
          window.location.href = 'SignUpSuccess.php'; 
        });
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: result // Muestra el mensaje de error devuelto por PHP
        });
      }
    });
});

function validateEmail(email) {
  var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  return re.test(email);
}
</script>

</body>
</html>
