<main class="contenedor seccion main-content contenido-centrado">
    <h1>Nuestro Blog</h1>

    <?php 
    foreach ($bloggs as $blog) : 
    ?>
       
       <a href="/entrada?<?php echo 'id=' . $blog->id ?>">
           <article class="entrada-blog">
               <div class="imagen">
                   <piture>
                       <source srcset="imagenes/<?php echo $blog->portada ?>" type="image/webp">
                       <source srcset="imagenes/<?php echo $blog->portada ?>" type="image/jpeg">
                       <img loading="lazy" src="imagenes/<?php echo $blog->portada ?>" alt="Imagen de Blog">
                   </piture>
               </div>
               <div class="texto-entrada">
                   <h4><?php echo $blog->titulo ?></h4>
                   <p>Escrito el <span><?php echo $blog->fecha ?></span> por <span>
                    <?php 
                        $idBlogger = $blog->bloggers_id;
                        $nameBlogger = $blogger::find($idBlogger);
                        $fullName = $nameBlogger->nombre  . ' ' . $nameBlogger->apellido;
                        if (!$nameBlogger->nombre) {
                            echo "Bienes Raices";
                        } else {
                            echo $fullName;
                        }
                    ?></span></p>
   
                   <p><?php 
                        if (strlen($blog->contenido) > 100) {
                            echo substr($blog->contenido, 0, 100) . "...";
                        } else {
                            echo $blog->contenido;
                        }
            
                   ?></p>
               </div>
           </article>
       </a>
    <?php endforeach ?>
</main>