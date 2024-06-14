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
</head>
<body>


<header class="p-3 mb-2 bg-primary text-primary-emphasis">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <div class="text-end order-lg-0 order-1">
        <img src="/resoures/logo.jpg" alt="logo" class="ml-2" style="height: 50px;">
        <button type="button" class="btn btn-outline-light me-2" onclick="window.location.href = '/Access/login.php';">Login</button>
        <button type="button" class="btn btn-outline-warning me-2" onclick="window.location.href = '/Access/signup.php';">Sign-up</button>
      </div>
      <div class="btn-group" style="float: right;">
          <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Acerca de Nosotros
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#integrantesmodal">Integrantes</a></li>
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#objetivomodal">Objetivo</a></li>
          </ul>
        </div>
    </div>
  </div>
</header>
    <div class="jumbotron" >
      <div class="jumbotron-content">
            <h1>Bienvenidos a GameZone</h1>
            <p>Aqui encontraras información de una gran variedad de videojuegos</p>
            <a href="/Access/signup.php" class="btn">Más Información</a>
        </div>
    </div>

              <!-- Modal Integrantes-->
              <div class="modal fade" id="integrantesmodal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="ModalLabel">Integrantes</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Antonio Uriel Perez Pichardo <br>
                      Bruno Mejía Maya
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal Objetivo-->
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

              <?php include('Home/footer.php'); ?>
 