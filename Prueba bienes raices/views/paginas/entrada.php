<main class="contenedor seccion main-content contenido-centrado">
    <h1> <?php echo $blog->titulo ?></h1>

    <div class="blog-imagen">
        <piture>
            <source srcset="imagenes/<?php echo $blog->portada ?>" type="image/webp">
            <source srcset="imagenes/<?php echo $blog->portada ?>" type="image/jpeg">
            <img loading="lazy" src="imagenes/<?php echo $blog->portada ?>" alt="anuncio">
        </piture>
    </div>
    <p>Escrito el <span class="color-amarillo"><?php echo $blog->fecha ?></span> por <span class="color-amarillo">
        <?php 
            $idBlogger = $blog->bloggers_id;
            $nameBlogger = $blogger::find($idBlogger);
            $fullName = $nameBlogger->nombre  . ' ' . $nameBlogger->apellido;
            if (!$nameBlogger->nombre) {
                echo "Bienes Raices";
            } else {
                echo $fullName;
            }
            ?>
        </span></p>
    <div class="texto-anuncio">
        <p><?php echo $blog->contenido ?></p>

    </div>
</main>