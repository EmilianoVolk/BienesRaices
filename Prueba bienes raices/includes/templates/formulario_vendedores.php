<fieldset>
    <legend>Informacion del Vendedor</legend>

    <label for="nombre">Nombre</label>
    <input type="text" placeholder="Nombre del Vendedor" id="nombre" name="vendedor[nombre]" value="<?php echo s($vendedor->nombre); ?>">

    <label for="apellido">apellido</label>
    <input type="text" placeholder="apellido del Vendedor" id="apellido" name="vendedor[apellido]" value="<?php echo s($vendedor->apellido); ?>">

    <label for="telefono">Telefono</label>
    <input type="number" placeholder="Telefono del Vendedor" id="telefono" name="vendedor[telefono]" value="<?php echo s($vendedor->telefono); ?>">
</fieldset>