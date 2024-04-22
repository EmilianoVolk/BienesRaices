<main class="contenedor seccion contenido-centrado">
    <h1>Crear Nuevo Blog</h1>


    <?php foreach ($errores as $error) { ?>
        <p class="alerta error">
            <?php echo $error ?>
        </p>
    <?php } ?>
    <form method="post" class="contenedor contenido-centrado formulario" enctype="multipart/form-data">
        <a href=" /admin" class="boton-verde">Regresar</a>
        <?php include __DIR__ . '/formulario.php' ?>
        <input type="submit" value="Crear" class="boton-verde">
    </form>
</main>