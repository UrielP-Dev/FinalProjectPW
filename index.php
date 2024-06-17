<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesjumbo.css">
    <title>Home</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        .container-fluid {
            display: flex;
            flex-direction: row; 
            min-height: 100vh;
            background: url('/resoures/fondo.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .navbar {
            width: 300px;
            background-color: rgba(0, 170, 255, 1); 
            padding: 20px;
            overflow-y: auto;
            position: relative; 
        }
        .navbar img {
            width: 100%;
            height: auto;
        }
        .content {
            flex: 1; 
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.5); 
            height: 100%;
        }
        .jumbotron {
            padding: 2rem 1rem;
            margin-bottom: 20px;
            background-color: rgba(233, 236, 239, 0.9); /* Color de fondo con transparencia */
            border-radius: 0.3rem;
            height: 50vh;
        }
        .jumbotron-content {
            text-align: center;
        }
        .ad-container .jumbotron {
            padding: 1rem 1rem;
            background-color: rgba(233, 236, 239, 0.9); /* Color de fondo con transparencia */
            border-radius: 0.3rem;
            height: 20vh;
        }
        footer {
            width: 100%;
            background-color: rgba(0, 170, 255, 0.9); /* Color de fondo igual al navbar y header */
            text-align: center;
            padding: 1rem;
            position: relative;
            clear: both;
        }
    </style>
</head>
<body>
<header class="p-3 mb-2 bg-primary text-white" style="background-color: rgba(0, 170, 255, 0.9);">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <img src="/resoures/logo.jpg" alt="logo" class="ml-2" style="height: 50px;">
        <h1 class="ms-3 mb-0">GameZone</h1>
      </div>
      <div class="d-flex align-items-center">
        <button type="button" class="btn btn-outline-light me-2" onclick="window.location.href = '/Access/login.php';">Login</button>
        <button type="button" class="btn btn-outline-warning me-2" onclick="window.location.href = '/Access/signup.php';">Sign-up</button>
        <div class="btn-group">
          <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Acerca de Nosotros
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#integrantesmodal">Integrantes</a></li>
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#objetivomodal">Objetivo</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>


<div class="container-fluid">
    <div class="content">
        <div class="jumbotron">
            <div class="jumbotron-content">
                <h1>Bienvenidos a GameZone</h1>
                <p>Aquí encontrarás información de una gran variedad de videojuegos</p>
                <a href="/Access/signup.php" class="btn">Más Información</a>
            </div>
        </div>

        <div class="row">
            <!-- Publicidad 1 -->
            <div class="col-md-6">
                <div class="ad-container">
                    <div class="jumbotron">
                        <div class="jumbotron-content">
                            <h2>Mejores Juegos del año</h2>
                            <p>Descubre los mejores juegos del año en nuestra sección especial.</p>
                            <a href="#" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Publicidad 2 -->
            <div class="col-md-6">
                <div class="ad-container">
                    <div class="jumbotron">
                        <div class="jumbotron-content">
                            <h2>Ofertas exclusivas!</h2>
                            <p>Aprovecha las ofertas exclusivas en nuestra tienda online.</p>
                            <a href="#" class="btn btn-primary">Comprar ahora</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Publicidad 3 -->
            <div class="col-md-6">
                <div class="ad-container">
                    <div class="jumbotron">
                        <div class="jumbotron-content">
                            <h2>Inscríbete ahora y recibe información de las mejores ofertas!</h2>
                            <p>Únete a nuestra comunidad de gamers y participa en eventos únicos.</p>
                            <a href="#" class="btn btn-primary">Únete ahora</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Publicidad 4 -->
            <div class="col-md-6">
                <div class="ad-container">
                    <div class="jumbotron">
                        <div class="jumbotron-content">
                            <h2>Los mejores juegos solo aquí</h2>
                            <p>Compra ya!</p>
                            <a href="#" class="btn btn-primary">Comprar ahora</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Integrantes -->
        <div class="modal fade" id="integrantesmodal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModalLabel">Integrantes</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Jonatan Gustavo Eslava Atenogenes<br>
                        Bruno Mejía Maya<br>
                        Jose Francisco Martinez Tapia<br>
                        Antonio Uriel Perez Pichardo<br>
                        Yoshua Daruma Vargas Moran
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Objetivo -->
        <div class="modal fade" id="objetivomodal" tabindex="-1" aria-labelledby="ModalLabel1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModalLabel1">Objetivo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        El objetivo principal de nuestra página web es proporcionar información completa y actualizada sobre los diferentes videojuegos existentes.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="navbar">
        <h3 class="ms-3 mb-0">Juegos más vendidos</h3>
        <div class="game-item">
            <img src="/resoures/FINAL.avif" alt="Juego 1">
            <p>FINAL FANTASY VII REBIRTH</p>
        </div>
        <div class="game-item">
            <img src="/resoures/mario-vs-donkey-kong-logo-1.webp" alt="Juego 2">
            <p>MARIO VS. DONKEY KONG</p>
        </div>
        <div class="game-item">
            <img src="/resoures/fc24.jpg" alt="Juego 3">
            <p>EA SPORTS FC 24</p>
        </div>
        <div class="game-item">
            <img src="/resoures/mariokr.avif" alt="Juego 4">
            <p>MARIO KART 8 DELUXE</p>
        </div>
        <div class="game-item">
            <img src="/resoures/aGhopp3MHppi7kooGE2Dtt8C.avif" alt="Juego 5">
            <p>Elden Ring</p>
        </div>
    </div>
</div>

<footer class="footer-container">
        <div class="footer-content">
            <p>&copy; <span id="current-year"></span> Derechos de autor. Todos los derechos reservados.</p>
            <p>Equipo 6 </p>
        </div>
    </div>
</footer>

<script>
    // Script para obtener el año actual
    document.getElementById("current-year").textContent = new Date().getFullYear();
</script>
</body>
</html>
