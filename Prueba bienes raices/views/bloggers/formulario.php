<fieldset class="formulario">
    <legend>Crear Nuevo Blogger</legend>

    <label for="name">Nombre</label>
    <input type="text" placeholder="Nombre" name="bloggers[nombre]" value="<?php echo s($blogger->nombre); ?>" id="name">

    <label for="lastname">Apellido</label>
    <input type="text" placeholder="Apellido" name="bloggers[apellido]" value="<?php echo s($blogger->apellido); ?>" id="lastname">

    <label for="email">Correo</label>
    <input type="email" placeholder="Correo Electronico" name="bloggers[correo]" value="<?php echo s($blogger->correo); ?>" id="email">
</fieldset>