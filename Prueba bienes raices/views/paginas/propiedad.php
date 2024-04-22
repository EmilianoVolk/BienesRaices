<main class="contenedor seccion main-content contenido-centrado propiedad">
    <h1><?php echo $propiedad->titulo ?></h1>
    <div class="anuncio-casa">
        <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen ?>" alt="anuncio">
    </div>
    <p class="precio"><?php echo $propiedad->precio ?></p>
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
            <p><?php echo $propiedad->habitaciones ?></p>
        </li>
    </ul>
    <div class="texto-anuncio">
        <p><?php echo $propiedad->descripcion ?></p>
    </div>
</main>