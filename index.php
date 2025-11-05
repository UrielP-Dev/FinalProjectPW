<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
        .sidebar {
            width: 300px;
            background-color: rgba(0, 170, 255, 1); 
            padding: 20px;
            overflow-y: auto;
            position: relative; 
        }
        .sidebar img {
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
            background-color: rgba(233, 236, 239, 0.9);
            border-radius: 0.3rem;
            min-height: 300px;
        }
        .jumbotron-content {
            text-align: center;
        }
        .jumbotron h1 {
            font-size: 2.5rem;
        }
        .ad-container .jumbotron {
            padding: 1rem 1rem;
            background-color: rgba(233, 236, 239, 0.9);
            border-radius: 0.3rem;
            min-height: 200px;
        }
        .ad-container .jumbotron h2 {
            font-size: 1.5rem;
        }
        footer {
            width: 100%;
            background-color: rgba(0, 170, 255, 0.9);
            text-align: center;
            padding: 1rem;
            position: relative;
            clear: both;
        }
        .sidebar-toggle {
            display: none;
        }
        
        /* Responsive styles */
        @media (max-width: 991px) {
            .container-fluid {
                flex-direction: column;
            }
            .sidebar {
                display: none;
            }
            .sidebar-toggle {
                display: inline-block;
            }
            .content {
                padding: 15px;
            }
            .jumbotron h1 {
                font-size: 2rem;
            }
            .ad-container .jumbotron h2 {
                font-size: 1.25rem;
            }
        }
        
        @media (max-width: 767px) {
            .jumbotron {
                padding: 1.5rem 1rem;
                min-height: 250px;
            }
            .jumbotron h1 {
                font-size: 1.75rem;
            }
            .jumbotron p {
                font-size: 1rem;
            }
            .ad-container .jumbotron {
                min-height: 180px;
                margin-bottom: 15px;
            }
            .ad-container .jumbotron h2 {
                font-size: 1.1rem;
            }
            .ad-container .jumbotron p {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
<header class="p-3 mb-2 bg-primary text-white" style="background-color: rgba(0, 170, 255, 0.9);">
  <div class="container-fluid">
    <div class="d-flex flex-wrap align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <button class="btn btn-outline-light me-2 sidebar-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas">
          <span class="navbar-toggler-icon"></span>☰
        </button>
        <img src="/resoures/logo.jpg" alt="logo" style="height: 50px;">
        <h1 class="ms-2 mb-0 d-none d-md-block">GameZone</h1>
        <h1 class="ms-2 mb-0 d-md-none" style="font-size: 1.5rem;">GameZone</h1>
      </div>
      <div class="d-flex align-items-center flex-wrap gap-2">
        <button type="button" class="btn btn-outline-light btn-sm" onclick="window.location.href = '/Access/login.php';">Login</button>
        <button type="button" class="btn btn-outline-warning btn-sm" onclick="window.location.href = '/Access/signup.php';">Sign-up</button>
        <div class="btn-group">
          <button type="button" class="btn btn-outline-dark btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Acerca de
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


<!-- Offcanvas Sidebar for Mobile -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarOffcanvasLabel" style="background-color: rgba(0, 170, 255, 1);">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title text-white" id="sidebarOffcanvasLabel">Juegos más vendidos</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="game-item mb-3">
            <img src="/resoures/FINAL.avif" alt="Juego 1" class="img-fluid rounded">
            <p class="text-white mt-2">FINAL FANTASY VII REBIRTH</p>
        </div>
        <div class="game-item mb-3">
            <img src="/resoures/mario-vs-donkey-kong-logo-1.webp" alt="Juego 2" class="img-fluid rounded">
            <p class="text-white mt-2">MARIO VS. DONKEY KONG</p>
        </div>
        <div class="game-item mb-3">
            <img src="/resoures/fc24.jpg" alt="Juego 3" class="img-fluid rounded">
            <p class="text-white mt-2">EA SPORTS FC 24</p>
        </div>
        <div class="game-item mb-3">
            <img src="/resoures/mariokr.avif" alt="Juego 4" class="img-fluid rounded">
            <p class="text-white mt-2">MARIO KART 8 DELUXE</p>
        </div>
        <div class="game-item mb-3">
            <img src="/resoures/aGhopp3MHppi7kooGE2Dtt8C.avif" alt="Juego 5" class="img-fluid rounded">
            <p class="text-white mt-2">Elden Ring</p>
        </div>
    </div>
</div>

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
            <div class="col-12 col-md-6 mb-3">
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
            <div class="col-12 col-md-6 mb-3">
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
            <div class="col-12 col-md-6 mb-3">
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
            <div class="col-12 col-md-6 mb-3">
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

    <div class="sidebar d-none d-lg-block">
        <h3 class="text-white mb-3">Juegos más vendidos</h3>
        <div class="game-item mb-3">
            <img src="/resoures/FINAL.avif" alt="Juego 1" class="img-fluid rounded">
            <p class="text-white mt-2">FINAL FANTASY VII REBIRTH</p>
        </div>
        <div class="game-item mb-3">
            <img src="/resoures/mario-vs-donkey-kong-logo-1.webp" alt="Juego 2" class="img-fluid rounded">
            <p class="text-white mt-2">MARIO VS. DONKEY KONG</p>
        </div>
        <div class="game-item mb-3">
            <img src="/resoures/fc24.jpg" alt="Juego 3" class="img-fluid rounded">
            <p class="text-white mt-2">EA SPORTS FC 24</p>
        </div>
        <div class="game-item mb-3">
            <img src="/resoures/mariokr.avif" alt="Juego 4" class="img-fluid rounded">
            <p class="text-white mt-2">MARIO KART 8 DELUXE</p>
        </div>
        <div class="game-item mb-3">
            <img src="/resoures/aGhopp3MHppi7kooGE2Dtt8C.avif" alt="Juego 5" class="img-fluid rounded">
            <p class="text-white mt-2">Elden Ring</p>
        </div>
    </div>
</div>

<footer class="footer-container">
    <div class="footer-content">
        <p>&copy; <span id="current-year"></span> Derechos de autor. Todos los derechos reservados.</p>
        <p>Equipo 6</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    document.getElementById("current-year").textContent = new Date().getFullYear();
</script>
</body>
</html>
