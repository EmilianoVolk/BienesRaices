<div class="contenedor-anuncios contenedor">
    <?php foreach ($propiedades as $propiedad) : ?>
        <div class="anuncio">
            <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen ?>" alt="anuncio" class="imagen-anuncio">

            <div class="contenido-anuncio">
                <h3><?php
                    if (strlen($propiedad->titulo) > 26) {
                        echo substr($propiedad->titulo, 0, 26) . "...";
                    } else {
                        echo $propiedad->titulo;
                    }
                    ?></h3>
                <p><?php
                    if (strlen($propiedad->descripcion) > 100) {
                        echo substr($propiedad->descripcion, 0, 100) . "...";
                    } else {
                        echo $propiedad->descripcion;
                    }

                    ?></p>
                <p class="precio">$<?php echo $propiedad->precio ?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p><?php echo $propiedad->wc ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p><?php echo $propiedad->estacionamiento ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono wc">
                        <p> <?php echo $propiedad->wc ?></p>
                    </li>
                </ul>

                <a href="/propiedad?id=<?php echo $propiedad->id; ?>" class="boton boton-amarillo">
                    Ver propiedad
                </a>
            </div> <!-- termina conteniod-anuncio -->
        </div><!-- termina anuncio -->
    <?php endforeach; ?>
</div>