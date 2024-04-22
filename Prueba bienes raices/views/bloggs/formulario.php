<fieldset>
    <legend>Formulario Blog</legend>

    <label for="tittle">Titulo</label>
    <input type="text" value="<?php echo $blog->titulo ?>" placeholder="Titulo" name="blog[titulo]" id="tittle">

    <label for="contenido">Contenido</label>
    <textarea id="contenido" name="blog[contenido]" placeholder="Ingresa el contenido del Blog"><?php echo $blog->contenido ?></textarea>

    <label for="image">Imagen</label>
    <input type="file" id="image" accept="image/jpeg, image/png" name="blog[portada]">

    <?php if ($blog->portada) : ?>
        <img src="/imagenes/<?php echo $blog->portada ?>" alt="imagen casa" class="small-image">
    <?php endif ?>

    <label for="bloggers_id"> </label>
    <select name="blog[bloggers_id]" id="bloggers_id">

    <option selected disabled value="">--Seleccione-- </option>

    <?php foreach ($bloggers as $blogger) { ?>
        <option <?php
                echo $blog->bloggers_id === $blogger->id ? 'selected' : '' ?> value="<?php echo s($blogger->id); ?>">
            <?php echo s($blogger->nombre) . " " . s($blogger->apellido); ?>
        </option>
    <?php } ?>
    </select>
</fieldset>