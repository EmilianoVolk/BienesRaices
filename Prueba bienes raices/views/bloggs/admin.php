<main class="contenedor seccion main-content">
    <h1>Administrador de Bloggs</h1>
    <?php

    use Model\Bloggers;

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
                <th>Portada</th>
                <th>Blogger</th>
                <th>Acciones</th>
            </tr>
        <tbody> <!-- Mostrar los resultados-->
            <h2>Bloggs</h2>
            <div class="botones-admin">
                <div class="tables">
                    <a href="../bloggs/crear" class="boton-amarillo">Nuevo Blogg</a>
                    <a href="../bloggers/crear" class="boton-amarillo">Nuevo Blogger</a>
                </div>
                <div class="bloggs">
                    <a href="/admin" class="boton-verde">Administrar Propiedades</a>
                </div>
            </div>
            <?php $i = 1;
            foreach ($bloggs::all() as $blogg) : ?>


                <tr class="propiedades-info">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $blogg->titulo; ?></td>
                    <td><img class="imagen-tabla" src="/imagenes/<?php echo $blogg->portada; ?>" alt="imagen portada blogg"></td>
                    <td> <?php
                            $idBlogger = $blogg->bloggers_id;
                            $nameBlogger = $bloggers::find($idBlogger);
                            $fullName = $nameBlogger->nombre  . ' ' . $nameBlogger->apellido;

                            if (!$nameBlogger) {
                                echo "Bienes Raices";
                            }

                            if (strlen($fullName) > 15) {
                                // Dividir la cadena en segmentos de $maxCaracteresPorLinea caracteres
                                $segmentos = str_split($fullName, 15);
                                // Unir los segmentos con un salto de línea
                                $nombreFormateado = implode("<br>", $segmentos);

                                // Imprimir la cadena formateada
                                echo $nombreFormateado;
                            } else {
                                // Si la longitud no es mayor que $maxCaracteresPorLinea, imprimir la cadena sin cambios
                                echo $fullName;
                            }

                            ?></td>
                    <td>
                        <form method="post" class="w-100" action="/bloggs/eliminar">
                            <input type="hidden" name="id" value="<?php echo $blogg->id ?>">
                            <input type="hidden" name="tipo" value="blog">

                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/bloggs/actualizar?id=<?php echo $blogg->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php $i++;
            endforeach; ?>
        </tbody>
        </thead>
    </table>

    <table class="tables">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        <tbody> <!-- Mostrar los resultados-->
            <h2>Bloggers</h2>
            <?php $i = 1;
            foreach ($bloggers::all() as $blogger) : ?>

                <tr class="propiedades-info">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $blogger->nombre . " " . "$blogger->apellido"; ?></td>
                    <td><?php
                        if (strlen($blogger->correo) > 15) {
                            // Dividir la cadena en segmentos de 15 caracteres
                            $segmentos = str_split($blogger->correo, 15);

                            // Unir los segmentos con la etiqueta <br>
                            $correoFormateado = implode("<br>", $segmentos);

                            // Imprimir la cadena formateada
                            echo $correoFormateado;
                        } else {
                            // Si la longitud no es mayor que 15, imprimir la cadena sin cambios
                            echo $blogger->correo;
                        }
                        ?></td>
                    <td>
                        <form method="post" class="w-100" action="/bloggers/eliminar">
                            <input type="hidden" name="id" value="<?php echo $blogger->id ?>">
                            <input type="hidden" name="tipo" value="blogger">

                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/bloggers/actualizar?id=<?php echo $blogger->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php $i++;
            endforeach; ?>
        </tbody>
        </thead>
    </table>

</main>