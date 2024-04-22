<fieldset>
    <legend>Informacion General</legend>

    <label for="titulo">Nombre</label>
    <input type="text" placeholder="Titulo de la Propiedad" id="titulo" name="propiedad[titulo]" value="<?php echo s($propiedad->titulo); ?>">

    <label for="precio">Precio</label>
    <input type="number" placeholder="Precio Propiedad" id="precio" name="propiedad[precio]" value="<?php echo s($propiedad->precio); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">

    <?php if ($propiedad->imagen) : ?>
        <img src="/imagenes/<?php echo $propiedad->imagen ?>" alt="imagen casa" class="small-image">
    <?php endif ?>

    <label for="descripción">Descripcion</label>
    <textarea id="descripcion" name="propiedad[descripcion]"><?php echo s($propiedad->descripcion); ?></textarea>
</fieldset>

<fieldset>
    <legend>Informacion de la Propiedad</legend>

    <label for="habitaciones">Habitaciones</label>
    <input type="number" placeholder="Numero de habitaciones" id="habitaciones" min="1" max="9" name="propiedad[habitaciones]" value="<?php echo s($propiedad->habitaciones); ?>">

    <label for="wc">Baños</label>
    <input type="number" placeholder="Numero de baños" id="wc" min="1" max="9" name="propiedad[wc]" value="<?php echo s($propiedad->wc); ?>">

    <label for="estacionamiento">Estacionamiento</label>
    <input type="number" placeholder="Numero de estacionamiento" id="estacionamiento" min="1" max="9" name="propiedad[estacionamiento]" value="<?php echo s($propiedad->estacionamiento); ?>">

</fieldset>

<fieldset>
    <legend>Vendedor</legend>
    <label for="vendedores_id">Vendedor</label>
    <select name="propiedad[vendedores_id]" id="vendedores_id">

        <option selected disabled value="">--Seleccione-- </option>

        <?php foreach ($vendedores as $vendedor) { ?>
            <option <?php
                    echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : '' ?> value="<?php echo s($vendedor->id); ?>">
                <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?>
            </option>
        <?php } ?>
    </select>
</fieldset>