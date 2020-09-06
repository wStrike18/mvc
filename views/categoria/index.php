<div  id="title-categoria">
    <h1>Gestionar categorías</h1>
</div>
<?php if(isset($_SESSION['categoria'])): ?>
    <p class="alerta alerta-exito" >
    <?=$_SESSION['categoria']?>
</p> 
 <?php elseif(isset($_SESSION['errores']['general'])):?>
    <p class="alerta alerta-error">
    <?=$_SESSION['errores']['general']?>
 </p>
<?php endif; ?>
<?php Utils::deleteSesion('categoria'); ?>

<a class="button button-small" href="<?= base_url ?>categoria/crear">Crear categoría</a>
<table id="tb_categorias" class="table">
    <thead  class="bg-success">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">ACCION</th>

        </tr>
    </thead>
    <tbody id="tbl_body_table">
        <?php while ($cat = $categorias->fetch_object()) : ?>
            <tr>
                <td><?= $cat->id ?></td>
                <td><?= $cat->nombre ?></td>
                <td><?php echo("<button>editar</butto>" . "<button>eliminar</butto>"); ?></td>
            </tr>
        <?php endwhile; ?>       
    </tbody>
    <tfoot>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">ACCION</th>
        </tr>
    </tfoot>
</table>
