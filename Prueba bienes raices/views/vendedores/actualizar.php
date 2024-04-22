<main class="contenedor seccion contenido-centrado">
    <h1>Crear</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <p>
                <?php echo $error ?>
            </p>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario contenedor contenido-centrado">
        <a href="/admin" class="boton-verde">Regresar</a>
        <?php include __DIR__ . '/formulario.php' ?>
        <input type="submit" value="Actualizar" class="boton-verde">
    </form>
</main>