<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #6f95ff; /* Color de fondo azul */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }
    </style>
    <script>
        setTimeout(function(){
            window.location.href = '/index.php'; // Redirige al login después de 5 segundos
        }, 5000);
    </script>
</head>
<body>
    <div class="container">
        <h1>¡Gracias por registrarte!</h1>
        <p>Serás redirigido al login en unos momentos...</p>
    </div>
</body>
</html>
