<?php
session_start();
// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.html"); // Redirigir si no ha iniciado sesión
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Dinámico</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/main.home.js"></script>
</head>
<header> <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="usuario.php">
    <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Navbar'; ?>
</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="../views/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">todos los post</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">🛠 configuración</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../backend/logout.php">cerrar sesion</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">alguna otra acción</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </div>
   </header>
<body>
    <header>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </header>
    <div class="content" id="content">
        <h1></h1>
        <p></p>
    </div>
    <main>
        <article class="article1">
            <img class="papá" src="../assets/francisco.avif" alt="">
            <h2>El médico que trató al papa Francisco en el hospital Gemelli: “Hubo que elegir entre dejarlo ir o probar con todo”</h2>
            <p><small>2025-02-26</small></p>
            <p>El doctor Sergio Alfieri señaló que el Pontífice se dio cuenta de que podía morir. El peor momento fue el 28 de febrero, cuando tuvo un episodio de broncoespasmo</p>
            <a href="post1.php">Leer más</a>
        </article>
        <article class="article2">
            <img class="enfermera" src="../assets/hospital_blog.avif" alt="">
            <h2>El nuevo dolor de cabeza de los hospitales y clínicas: la facturación electrónica</h2>
            <p><small>2025-02-25</small></p>
            <p>La facturación electrónica llegó al sistema de salud, pero su implementación no ha sido fácil. Hospitales y clínicas reportan...</p>
            <a href="post2.php">Leer más</a>
        </article>
    </main>
</body>
</html>
