<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <title>Home-client</title>
</head>
<body>
<header class="p-3 mb-2 bg-dark text-primary-emphasis">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <div class="text-end order-lg-0 order-1">
        <img src="/resoures/logo.jpg" alt="logo" class="ml-2" style="height: 50px;">
        <button type="button" class="btn btn-outline-light me-2" onclick="window.location.href = 'logout.php';">
            log out
        </button>
        <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#infoUsumodal">Información Usuario</button>
      </div>

    </div>
  </div>
</header>

<div class="table">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Desarrollador</th>
      <th scope="col">Fecha Lanzamiento</th>
      <th scope="col">Detalles</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

  <script>
        $(document).ready(function() {
            $.ajax({
                url: '/videogames/getAllGames.php',
                method: 'GET',
                success: function(response) {
                    var data = JSON.parse(response);
                    var games = data.games; // Accede a la lista de juegos
                    var tableBody = $('#table-group-divider');
                    tableBody.empty(); // Limpia el cuerpo de la tabla

                    games.forEach(function(game) {
                        var row = '<tr>' +
                                  '<td>' + game.id + '</td>' +
                                  '<td>' + game.titulo + '</td>' +
                                  '<td>' + game.desarrollador + '</td>' +
                                  '<td>' + game.fecha_lanzamiento + '</td>' +
                                  '<td>' + '<button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#infoUsumodal">Detalles</button>' + '</td>' +
                                  '</tr>';
                        tableBody.append(row);
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Error: " + textStatus + " - " + errorThrown);
                }
            });
        });
    </script>
  </tbody>
</table>
</div>

                <!-- Modal Info usuario-->
            <div class="modal fade" id="infoUsumodal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="ModalLabel">Información Usuario</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <?php
                        include '../Context/orm.php';
                        include '../DataBase/Connection.php';
                        include '../Access/users.php';

                        $db1 = new Database();
                        $encontrado = $db1->verificarDriver();

                        if ($encontrado) {
                            $cnn = $db1->getConnection();
                            $UserModelo = new user($cnn);
                            $id_user = $_SESSION['user_id'];
                            $user = $UserModelo->getById($id_user);
                            if ($user == null) {
                                print("No hay un usuario con ese ID:");
                            } else {
                                print("================<br>");
                                print("Usuario <br>");
                                print("================<br>");
                                print("ID: " . $user['id'] . "<br>");
                                print("Nombre: " . $user['nombre'] . "<br>");
                                print("Apellido: " . $user['apellido'] . "<br>");
                                print("Email: " . $user['email'] . "<br>");
                            }
                        }
                        ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
            </div>
    
</body>
</html>