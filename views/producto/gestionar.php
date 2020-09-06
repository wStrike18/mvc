<div  id="title-product">
    <h1>Gestionar productos</h1>
</div>
<?php if(isset($_SESSION['delete'])): ?>
    <p class="alerta alerta-exito" >
    <?=$_SESSION['delete']?>
</p> 
<?php elseif(isset($_SESSION['actualizar-producto'])): ?>
    <p class="alerta alerta-exito" >
    <?=$_SESSION['actualizar-producto']?>
</p> 
 <?php elseif(isset($_SESSION['errores']['general'])):?>
    <p class="alerta alerta-error">
    <?=$_SESSION['errores']['general']?>
 </p>
<?php endif; ?>
<?php Utils::deleteSesion('delete');
 Utils::deleteSesion('actualizar-producto');
Utils::deleteSesion('errores'); ?>
<a  class="button button-small" href="<?=base_url?>producto/crear">Crear producto</a>
<table id="tb_productos" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">DESCRIPCIÓN</th>
            <th scope="col">PRECIO</th>
            <th scope="col">STOCK</th>
            <th scope="col">IMAGEN</th>
            <th scope="col">FECHA</th>
            <th scope="col">ACCION</th>


        </tr>
    </thead>

    <tbody id="tbl_body_table">
    <?php while($pro = $productos->fetch_object()):?>
            <tr>
                <td><?=$pro->id ?></td>
                <td><?=$pro->nombre ?></td>
                <td><?=$pro->descripcion ?></td>
                <td><?=$pro->precio ?></td>
                <td><?=$pro->stock ?></td>
                <td><?=$pro->imagen ?></td>
                <td><?=$pro->fecha ?></td>
                <td>
                    <a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" type="button" title="Editar" class="icon-pencil btnEditar" ></a>
                    <a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" type="button" id="" class="icon-bin btnDelete"  title="Eliminar" ></a>
                </td>
            </tr>
    <?php endwhile; ?>
    </tbody>
    <tfoot>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">DESCRIPCIÓN</th>
            <th scope="col">PRECIO</th>
            <th scope="col">STOCK</th>
            <th scope="col">IMAGEN</th>
            <th scope="col">FECHA</th>
            <th scope="col">ACCION</th>

        </tr>
    </tfoot>
</table>