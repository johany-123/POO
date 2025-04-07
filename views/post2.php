<?php
 session_start();

 if (!isset($_SESSION['user_id'])) {
     header("Location: ../login.html"); 
     exit();
 }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post del Blog</title>
    <link rel="stylesheet" href="../css/style-post2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/main.home.js"></script>
</head>
<header>
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="../views/usuario.php">
    <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Navbar'; ?>
</a>

            </h>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="../views/home.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">configuración</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../views/usuario.php">🛠 usuario</a></li>
                            <li><a class="dropdown-item" href="../backend/logout.php">cerrar sesion</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">alguna otra acción</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</header>
<body>

    <div class="container">
        <article class="post">
            <h1 class="post-title">El nuevo dolor de cabeza de los hospitales y clínicas: la facturación electrónica</h1>
            <p class="post-meta">Publicado el <span>16/2/2025</span> por <span>Autor desconocido</span></p>
            <img class="one" src="../assets/hospital_blog.avif" alt="" class="post-image">
            <p class="post-content">
            El Ministerio de Salud planteó la implementación de la factura electrónica en el sistema de salud mediante un proceso escalonado. 

            </p>
            <p class="post-content">
            En medio de la ya difícil situación de liquidez que está enfrentando el sistema de salud, un nuevo factor ha generado inquietud en las directivas y gremios de hospitales y clínicas en las últimas semanas: la implementación de la facturación electrónica. Este mecanismo, según explicó el ministro de Salud, Guillermo Alfonso Jaramillo, el pasado 20 de marzo durante la instalación de la mesa sobre la UPC, busca aportar mayor transparencia al sistema. “La factura electrónica nos va a demostrar cosas. Ver los servicios que se están prestando y no...
            </p>
        </article>
        </div>

</body>
</html>
