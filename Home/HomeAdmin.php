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
        <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#infoAdmmodal">Información Administrador</button>
      </div>

    </div>
  </div>
</header>
<div class="container mt-5">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertGameModal">
            Insertar Juego
        </button>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Desarrollador</th>
                    <th>Fecha de Lanzamiento</th>
                    <th>Detalles</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody id="table-group-divider">
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
            url: '../videogames/getAllGames.php',
            method: 'GET',
            success: function(response) {
                var data;
                try {
                    data = JSON.parse(response);
                } catch (e) {
                    console.error("Error parsing JSON:", e);
                    return;
                }
                var games = data.games;
                var tableBody = $('#table-group-divider');
                tableBody.empty();

                games.forEach(function(game) {
                    var row = '<tr>' +
                              '<td>' + game.id + '</td>' +
                              '<td>' + game.titulo + '</td>' +
                              '<td>' + game.desarrollador + '</td>' +
                              '<td>' + game.fecha_lanzamiento + '</td>' +
                              '<td>' + '<button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#infoGamemodal" data-id="' + game.id + '">Detalles</button>' + '</td>' +
                              '<td>' + '<button type="button" class="btn btn-lg btn-warning" data-bs-toggle="modal" data-bs-target="#editmodal" data-id="' + game.id + '">Editar</button>' + '</td>' +
                              '<td>' + '<button type="button" class="btn btn-lg btn-danger" data-bs-toggle="modal" data-bs-target="#dropmodal" data-id="' + game.id + '">Eliminar</button>' + '</td>' +
                              '</tr>';
                    tableBody.append(row);
                });

                // Agregar evento click al botón Editar
                $('#table-group-divider').on('click', 'button.btn-warning', function() {
                    var gameId = $(this).data('id');
                    $.ajax({
                        url: '../videogames/getIdgame.php',
                        type: 'GET',
                        data: { id: gameId },
                        dataType: 'json',
                        success: function(data) {
                            var gameData = data.game;
                            if (gameData) {
                                $('#edit-id').val(gameData.id);
                                $('#edit-titulo').val(gameData.titulo);
                                $('#edit-desarrollador').val(gameData.desarrollador);
                                $('#edit-fecha_lanzamiento').val(gameData.fecha_lanzamiento);
                                $('#edit-genero').val(gameData.genero);
                                $('#edit-plataformas').val(gameData.plataformas);
                                $('#edit-puntuacion').val(gameData.puntuacion);
                                $('#edit-descripcion').val(gameData.descripcion);
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error("Error: " + textStatus + " - " + errorThrown);
                        }
                    });
                });

                // Manejar el envío del formulario de edición
                $('#editGameForm').on('submit', function(event) {
                    event.preventDefault();
                    var formData = $(this).serialize();
                    $.ajax({
                        url: '../videogames/updateGame.php',
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            alert('Juego actualizado exitosamente');
                            $('#editmodal').modal('hide');
                            setTimeout(function() {
                                location.reload();
                            }, 500);
                        },
                        error: function(xhr, status, error) {
                            alert('Error al actualizar el juego');
                        }
                    });
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error: " + textStatus + " - " + errorThrown);
            }
        });

        // Manejar el botón Eliminar
        $('#table-group-divider').on('click', 'button.btn-danger', function(event) {
            event.preventDefault();
            var gameId = $(this).data('id');
            if (confirm('¿Estás seguro de que deseas eliminar este juego?')) {
                $.ajax({
                    url: '../videogames/deleteGames.php',
                    type: 'GET',
                    data: { id: gameId },
                    success: function(response) {
                        alert('Juego eliminado exitosamente');
                        setTimeout(function() {
                            location.reload();
                        }, 500);
                    },
                    error: function(xhr, status, error) {
                        alert('Error al eliminar el juego');
                    }
                });
            }
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
                    var gameData = data.game;
                    if (gameData) {
                        var gameDetails = '<p><strong>ID:</strong> ' + gameData.id + '</p>' +
                                          '<p><strong>Título:</strong> ' + gameData.titulo + '</p>' +
                                          '<p><strong>Desarrollador:</strong> ' + gameData.desarrollador + '</p>' +
                                          '<p><strong>Fecha de Lanzamiento:</strong> ' + gameData.fecha_lanzamiento + '</p>' +
                                          '<p><strong>Género:</strong> ' + gameData.genero + '</p>' +
                                          '<p><strong>Plataformas:</strong> ' + gameData.plataformas + '</p>' +
                                          '<p><strong>Puntuación:</strong> ' + gameData.puntuacion + '</p>' +
                                          '<p><strong>Descripción:</strong> ' + gameData.descripcion + '</p>';
                        $('#modal-body-content').html(gameDetails);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#modal-body-content').html('<p>Error al cargar los detalles del juego.</p>');
                }
            });
        });
    });
</script>
    </script>
</div>

 <!-- Modal -->
        <div class="modal fade" id="insertGameModal" tabindex="-1" aria-labelledby="insertGameModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="insertGameModalLabel">Insertar Nuevo Juego</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="insertGameForm">
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" required>
                            </div>
                            <div class="form-group">
                                <label for="desarrollador">Desarrollador</label>
                                <input type="text" class="form-control" id="desarrollador" name="desarrollador" required>
                            </div>
                            <div class="form-group">
                                <label for="fecha_lanzamiento">Fecha de Lanzamiento</label>
                                <input type="date" class="form-control" id="fecha_lanzamiento" name="fecha_lanzamiento" required>
                            </div>
                            <div class="form-group">
                                <label for="genero">Género</label>
                                <input type="text" class="form-control" id="genero" name="genero" required>
                            </div>
                            <div class="form-group">
                                <label for="plataformas">Plataformas</label>
                                <input type="text" class="form-control" id="plataformas" name="plataformas" required>
                            </div>
                            <div class="form-group">
                                <label for="puntuacion">Puntuación</label>
                                <input type="number" step="0.1" class="form-control" id="puntuacion" name="puntuacion" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Insertar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    <script>
        $(document).ready(function() {
            $('#insertGameForm').on('submit', function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: '../videogames/insertgames.php',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('Juego insertado exitosamente');
                        $('#insertGameModal').modal('hide');
                        setTimeout(function() {
                            location.reload();
                        }, 500);
                    },
                    error: function(xhr, status, error) {
                        alert('Error al insertar el juego');
                    }
                });
            });
        });
    </script>   
                <!-- Modal Info usuario-->
            <div class="modal fade" id="infoAdmmodal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-3" id="ModalLabel">Información Administrador</h1>
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

            <!-- Modal Editar -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Juego</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editGameForm">
                    <input type="hidden" id="edit-id" name="id">
                    <div class="form-group">
                        <label for="edit-titulo">Título</label>
                        <input type="text" class="form-control" id="edit-titulo" name="titulo" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-desarrollador">Desarrollador</label>
                        <input type="text" class="form-control" id="edit-desarrollador" name="desarrollador" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-fecha_lanzamiento">Fecha de Lanzamiento</label>
                        <input type="date" class="form-control" id="edit-fecha_lanzamiento" name="fecha_lanzamiento" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-genero">Género</label>
                        <input type="text" class="form-control" id="edit-genero" name="genero" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-plataformas">Plataformas</label>
                        <input type="text" class="form-control" id="edit-plataformas" name="plataformas" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-puntuacion">Puntuación</label>
                        <input type="number" step="0.1" class="form-control" id="edit-puntuacion" name="puntuacion" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-descripcion">Descripción</label>
                        <textarea class="form-control" id="edit-descripcion" name="descripcion" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

    
</body>
</html>
