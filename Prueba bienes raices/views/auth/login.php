<main class="contenedor seccion main-content contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <p>
                <?php echo $error ?>
            </p>
        </div>
    <?php endforeach; ?>
    <form method="post" class="formulario" action="/login">
        <fieldset>
            <legend>E-mail y Password</legend>

            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu E-mail" id="email" name="email" value="<?php echo $auth->email ?>">

            <label for="password">Password</label>
            <input type="password" placeholder="Tu Password" id="password" name="password">
        </fieldset>
        <input type="submit" value="Iniciar sesión" class="boton boton-verde">
    </form>

</main>