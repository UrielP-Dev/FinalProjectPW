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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
<div class="container mt-5">
        <table class="table  table-bordered  table-hover">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Desarrollador</th>
                    <th>Fecha de Lanzamiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody  id="table-group-divider">
                <!-- Filas se insertarán aquí -->
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="infoGamemodal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModalLabel">Información del Juego</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body-content">
                    <!-- Información del juego se mostrará aquí -->
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: '../videogames/getAllGames.php', // Asegúrate de que la ruta es correcta
                method: 'GET',
                success: function(response) {
                    console.log(response); // Depura la respuesta
                    var data;
                    try {
                        data = JSON.parse(response);
                    } catch (e) {
                        console.error("Error parsing JSON:", e);
                        return;
                    }
                    var games = data.games; // Accede a la lista de juegos
                    var tableBody = $('#table-group-divider');
                    tableBody.empty(); // Limpia el cuerpo de la tabla

                    games.forEach(function(game) {
                        var row = '<tr>' +
                                  '<td>' + game.id + '</td>' +
                                  '<td>' + game.titulo + '</td>' +
                                  '<td>' + game.desarrollador + '</td>' +
                                  '<td>' + game.fecha_lanzamiento + '</td>' +
                                  '<td>' + '<button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#infoGamemodal" data-id="' + game.id + '">Detalles</button>' + '</td>' +
                                  '</tr>';
                        tableBody.append(row);
                    });
// Agregar evento click a los botones de detalles
$('#table-group-divider').on('click', 'button[data-bs-toggle="modal"]', function() {
                        var gameId = $(this).data('id');
                        $.ajax({
                            url: '../videogames/getIdgame.php',
                            type: 'GET',
                            data: { id: gameId },
                            dataType: 'json',
                            success: function(data) {
                                console.log(data); // Depura la respuesta
                                var gameData;
                                
                                if (data.error) {
                                    console.log(data.error);
                                } else {
                                    // Manejar los datos de juego recibidos
                                    console.log(data.game);
                                gameData=data.game;
                                if (gameData.error) {
                                    $('#modal-body-content').html('<p>' + gameData.error + '</p>');
                                } else {
                                    var gameDetails = '<p><strong>ID:</strong> ' + gameData.id + '</p>' +
                                                      '<p><strong>Título:</strong> ' + gameData.titulo + '</p>' +
                                                      '<p><strong>Desarrollador:</strong> ' + gameData.desarrollador + '</p>' +
                                                      '<p><strong>Fecha de Lanzamiento:</strong> ' + gameData.fecha_lanzamiento + '</p>' +
                                                      '<p><strong>Género:</strong> ' + gameData.genero + '</p>' +
                                                      '<p><strong>Plataformas:</strong> ' + gameData.plataformas + '</p>' +
                                                      '<p><strong>Puntuación:</strong> ' + gameData.puntuacion + '</p>' +
                                                      '<p><strong>Descripción:</strong> ' + gameData.descripcion + '</p>';
                                    $('#modal-body-content').html(gameDetails);
                                }}
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.error("Error: " + textStatus + " - " + errorThrown);
                                $('#modal-body-content').html('<p>Error al cargar los detalles del juego.</p>');
                            }
                        });
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Error: " + textStatus + " - " + errorThrown);
                    console.error("Response text:", jqXHR.responseText);
                }
            });
        });
    </script>
    </script>
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
                    
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
            </div>
    
            <?php
            include '../Home/footer.php';
            ?>