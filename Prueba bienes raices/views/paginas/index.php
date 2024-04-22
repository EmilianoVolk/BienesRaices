<?php $inicio = true ?>
<main class="contenedor seccion">
    <h1>Más sobre nosotros</h1>
    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere maiores perspiciatis rerum obcaecati recusandae veritatis quas hic quod, ipsam vero aut explicabo expedita doloremque blanditiis nulla facilis ut minima dignissimos.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
            <h3>Precio</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere maiores perspiciatis rerum obcaecati recusandae veritatis quas hic quod, ipsam vero aut explicabo expedita doloremque blanditiis nulla facilis ut minima dignissimos.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
            <h3>Tiempo</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere maiores perspiciatis rerum obcaecati recusandae veritatis quas hic quod, ipsam vero aut explicabo expedita doloremque blanditiis nulla facilis ut minima dignissimos.</p>
        </div>
    </div>
</main>

<section class="seccion contenedor">
    <h2>Casas y Depas en venta</h2>

    <?php include 'listado.php';?>

    <div class="ver-todas">
        <a href="/propiedades" class="boton-verde">Ver Todo</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad!</p>
    <a href="contacto.html" class="boton-contactanos boton-amarillo">Contactanos</a>
</section>

<div class="contenedor seccion contenedor-seccion">
    <section class="blog">
        <h3>Nuestrso blog</h3>
        <article class="entrada-blog">
            <div class="imagen">
                <piture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.webp" alt="Imagen de Blog">
                </piture>
            </div>
            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el <span class="color-amarillo">29/10/2023</span> por <span class="color-amarillo">Admin</span></p>

                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales</p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <piture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.webp" alt="Imagen de Blog">
                </piture>
            </div>
            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Guía para la decoración de tu hogar</h4>
                    <p>Escrito el <span class="color-amarillo">29/10/2023</span> por <span class="color-amarillo">Admin</span></p>

                    <p>Maximiza el espacio de tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                </a>
            </div>
        </article>
    </section>
    <section>
        <h3> Testimoniales</h3>

        <div class="testimonial">
            <blockquote>
                El personal se comportó de una excelente forma, muy biena atención y la casa que me ofrecieron cumple con la mayoria de mis expectativas.
            </blockquote>
            <p>-Juan de la torre</p>
        </div>
    </section>
</div>