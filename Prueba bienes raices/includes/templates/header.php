<?php
if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? null;
?>

<!DOCTYPE html>
<html lang="en" data-page="index">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/PROYECTO5/build/css/app.css">
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra mobile-barra">
                <a href="/PROYECTO5/index.php">
                    <img src="/PROYECTO5/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <div class="movil-menu">
                    <img src="/PROYECTO5/build/img/barras.svg" alt="icon menu responsive">
                </div>

                <nav class="navegacion">
                    <a href="/PROYECTO5/nosotros.php">Nosotros</a>
                    <a href="/PROYECTO5/anuncios.php">Anuncios</a>
                    <a href="/PROYECTO5/blog.php">Blog</a>
                    <a href="/PROYECTO5/contacto.php">Contacto</a>
                    <?php if ($auth) : ?>
                        <a href="/PROYECTO5/cerar-sesion.php">Cerrar Sesión</a>
                    <?php endif; ?>
                </nav>
            </div> <!-- cierre de la barra -->
            <?php echo $inicio ? '<h1>Venta de Casas Y Departamentos Exclusivos de Lujo</h1>' : ''; ?>
        </div>
    </header>