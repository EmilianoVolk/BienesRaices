<main>
    <h1>Crear Nuevo Blog</h1>
    <form method="post" class="contenedor contenido-centrado">
        <a href="/admin" class="boton-verde">Regresar</a>

        <?php foreach ($errores as $error) : ?>
            <div class="alerta error">
                <p>
                    <?php echo $error ?>
                </p>
            </div>
        <?php endforeach; ?>

        <?php include __DIR__ . '/formulario.php' ?>
        <input type="submit" value="Crear" class="boton-verde">
    </form>
</main>