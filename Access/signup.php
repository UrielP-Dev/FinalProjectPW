<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Registro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <style>
    /* Estilos personalizados para el modal */
    .modal-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5); /* Fondo semitransparente */
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 1000; /* Asegura que el modal esté por encima de otros elementos */
    }
    .formulario {
      background-color: white; /* Fondo blanco */
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); /* Sombra */
    }
    .formulario form {
      color: black; /* Texto negro */
    }
    .fondo-secundario {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #6f95ff; /* Fondo azul */
      z-index: -1; /* Coloca el fondo detrás del modal */
    }
  </style>
</head>
<body>

<div class="fondo-secundario"></div>

<div class="modal-container">
  <div class="formulario">
    <h1 class="text-center mb-4">Formulario de Registro</h1>
    <form id="userForm" action="Process_register.php" method="post">
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
      <div class="d-grid mb-3">
        <button type="submit" class="btn btn-primary">Registrarse</button>
      </div>
      <div class="text-center">
        <a href="AdminSignUp.php" class="btn btn-link">Registro de Administrador</a>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script>
document.getElementById('userForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Evita el envío del formulario

  var formData = new FormData(this);
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

  fetch(this.action, {
    method: 'POST',
    body: formData
  }).then(response => response.text())
    .then(result => {
      if (result.includes('Success')) { 
        Swal.fire({
          icon: 'success',
          title: 'Registro exitoso',
          text: 'El Usuario ha sido registrado correctamente',
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
