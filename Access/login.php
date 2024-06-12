<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
        /* Estilos personalizados para el modal */
        .modal-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Fondo semitransparente */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            /* Asegura que el modal esté por encima de otros elementos */
        }

        .formulario {
            background-color: white;
            /* Fondo blanco */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            /* Sombra */
        }

        .formulario form {
            color: black;
            /* Texto negro */
        }

        .fondo-secundario {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #6f95ff;
            /* Fondo azul */
            z-index: -1;
            /* Coloca el fondo detrás del modal */
        }
    </style>
</head>

<body>

    <div class="fondo-secundario">
        <div class="modal-container">
            <div class="formulario">
                <h1 class="text-center mb-4">Inicio de Sesión</h1>
                <form id="login-form" name="login-form">
                    <div class="mb-3" id="error-container" style="display: none">
                        <div class="alert alert-danger" role="alert" id="error-alert">
                        </div>
                    </div>
                    <div class="mb-3" id="success-container" style="display: none">
                        <div class="alert alert-success" role="alert" id="success-alert">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="user-email" class="form-label">Correo Electronico</label>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="user-email" id="user-email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="mb-3">
                        <input class="form-check-input" type="checkbox" value="" name="admin-login" id="admin-login">
                        <label class="form-check-label" for="admin-login">
                            Iniciar Sesion como Administrador
                        </label>
                    </div>
                    <div class="d-grid">
                        <input type="submit" value="Iniciar Sesion" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../src/login.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>