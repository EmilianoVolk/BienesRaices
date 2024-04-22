<main class="contenedor seccion main-content">
    <h1>Administrador de Bienes Raices</h1>
    <?php
    if ($resultado) {
        $mensaje = mostrarNotificacion(intval($resultado));
        if ($mensaje) {  ?>
            <p class="alerta exito"><?php echo s($mensaje) ?> </p>
    <?php }
    } ?>


    <table class="tables">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!-- Mostrar los resultados-->
            <h2>Propiedades</h2>
            <div class="botones-admin">
                <div class="tables">
                    <a href="propiedades/crear" class="boton-amarillo">Nueva Propiedad</a>
                    <a href="vendedores/crear" class="boton-amarillo">Nuevo Vendedor</a>
                </div>
                <div class="bloggs">
                    <a href="/admin/bloggs" class="boton-verde">Administrar bloggs</a>
                </div>
            </div>
            <?php $i = 1;
            foreach ($propiedades as $propiedad) : ?>

                <tr class="propiedades-info">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img src="imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen casa" class="imagen-tabla"></td>
                    <td>$<?php echo $propiedad->precio; ?></td>
                    <td>
                        <form method="post" action="/propiedades/eliminar" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
                            <input type="hidden" name="tipo" value="propiedad">

                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php $i++;
            endforeach; ?>
        </tbody>
    </table>

    <table class="tables">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!-- Mostrar los resultados-->
            <h2>Vendedores</h2>
            <?php $i = 1;
            foreach ($vendedores as $vendedor) : ?>

                <tr class="propiedades-info">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $vendedor->nombre . " " . "$vendedor->apellido"; ?></td>
                    <td><?php echo $vendedor->telefono; ?></td>
                    <td>
                        <form method="post" class="w-100" action="/vendedores/eliminar">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id ?>">
                            <input type="hidden" name="tipo" value="vendedor">

                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php $i++;
            endforeach; ?>
        </tbody>
    </table>

</main>