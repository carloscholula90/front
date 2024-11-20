<?php
// Llamar al CRUD/UTILS
include 'crud/utils.php';
// Llamar al CRUD/GET
include 'crud/get.php';
?> 
<!-- Boton nuevo  -->
<div id="buton_nuevo" class="btn btn-secondary" data-titulo="Agregar nuevo módulo"><i class="fas fa-plus"></i> Nuevo</div>
<!-- Tabla de registros  -->
<table id="tabla_modulos" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Icono</th>
            <th>Alias</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($get__response->modulos as $item){ ?>   
            <tr>
                <td><?= $item->idModulo ?></td>
                <td><?= $item->descripcion ?></td>
                <td><?= ($item->icono == null)? "--" : $item->icono ?></td>
                <td><?= ($item->alias == null)? "--" : $item->alias ?></td>
                <td class="td_botones">
                    <div class="btn btn-light" id="buton_editar"    data-titulo="Editar el modulo <?= $item->idModulo ?>"                           data-id="<?= $item->idModulo ?>" data-descripcion="<?= $item->descripcion ?>" data-icono="<?= $item->icono ?>" data-alias="<?= $item->alias ?>"><i class="fas fa-edit"></i> Editar</div>
                    <div class="btn btn-light" id="buton_eliminar"  data-mensaje="Realmente desea eliminar módulo con el ID <?= $item->idModulo ?>" data-id="<?= $item->idModulo ?>"><i class="fas fa-trash-alt"></i> Eliminar</div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<!-- CRUD/POST Formulario de nuevo registro -->
<template id="post">
    <form id="post_formulario"> 
        <label for="descripcion">Descripción</label> 
        <input class="form-control" type="text" name="descripcion"/>   
        <label for="icono">Icono</label> 
        <input class="form-control" type="text" name="icono"/>  
        <label for="alias">Alias</label> 
        <input class="form-control" type="text" name="alias"/>   
        <div id="post__guardar" class="btn btn-success" data-endpoint="<?= $config->endpoint ?>">Guardar</div>
        <div id="post__respuesta" style="display:none;"></div>
    </form>
</template>
<!-- CRUD/PUT Formulario de editar registro  -->
<template id="put">
    <form id="put_formulario"> 
        <label for="descripcion">Descripción</label> 
        <input class="form-control" type="text" name="descripcion"/>   
        <label for="icono">Icono</label> 
        <input class="form-control" type="text" name="icono"/>  
        <label for="alias">Alias</label> 
        <input class="form-control" type="text" name="alias"/>   
        <div id="put__guardar" class="btn btn-success" data-endpoint="<?= $config->endpoint ?>">Actualizar</div>
        <div id="put__respuesta" style="display:none;"></div>
    </form>
</template>
<!-- CRUD/DELETE Eliminar registro  -->
<template id="delete">
    <div id="delete__mensaje"></div> 
    <div id="delete__guardar" class="btn btn-success" data-endpoint="<?= $config->endpoint ?>">Eliminar</div>
    <div id="delete__respuesta" style="display:none;"></div> 
</template>
<!-- CRUD  -->
<script src="js/crud/utils.js?v=<?= time(); ?>"></script> 
<script src="js/crud/post.js?v=<?= time(); ?>"></script> 
<script src="js/crud/put.js?v=<?= time(); ?>"></script> 
<script src="js/crud/delete.js?v=<?= time(); ?>"></script> 
<script> 
    <?= DataTable('tabla_modulos') ?>
</script>