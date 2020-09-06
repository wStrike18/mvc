<?php if(isset($editar) && isset($pro) && is_object($pro)):?>
    <div class="title-central" id="title-categoria">
    <h1>Editar producto <?=$pro->nombre?></h1>
    <?php $url_action = 'producto/update&id='.$pro->id;?>

</div>
<?php else: ?>
<div  id="title-product">
    <h1>Crear producto</h1>
    <?php $url_action = 'producto/save'; ?>

</div>
<?php endif; ?>

<?php if(isset($_SESSION['registrar-producto'])): ?>
    <p class="alerta alerta-exito" >
    <?=$_SESSION['registrar-producto']?>
</p> 
 <?php elseif(isset($_SESSION['errores']['general'])):?>
    <p class="alerta alerta-error">
    <?=$_SESSION['errores']['general']?>
 </p>
<?php endif; ?>
<?php Utils::deleteSesion('registrar-producto');
?>

<form id="formRegistroProducto" action="<?=base_url.$url_action ?>" method="POST" enctype="multipart/form-data">

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?= isset($pro) && is_object($pro) ?  $pro->nombre : ''; ?>" />
    <?php echo isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'], 'nombre') : '' ?>

    <label for="descripcion">Descripción</label>
    <textarea type="text" name="descripcion" id="descripcion-products" maxlength="100" ><?= isset($pro) && is_object($pro) ?  $pro->descripcion : ''; ?></textarea>
    <?php echo isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'], 'descripcion')  : ''  ?>

    <label for="precio" id="lprecio">Precio</label>
    <input type="text" name="precio" id="precio" value="<?= isset($pro) && is_object($pro) ?  $pro->precio : ''; ?>" />
    <?php echo isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'], 'precio')  : '' ?>

    <label for="stock" id="lstock">Stock</label>
    <input type="number" name="stock" id="stock" value="<?= isset($pro) && is_object($pro) ?  $pro->stock : '0'; ?>" />
    <?php echo isset($_SESSION['errores']) ?  Utils::mostrarError($_SESSION['errores'], 'stock') : '' ?>

    <?php $categorias = Utils::getAllCategoria(); ?>
    <label for="categoria">Categoria</label>
    <select name="categoria" id="seleccat">
        <option value="0">Seleccione una categoría</option>
        <?php while ($cat = $categorias->fetch_object()) : ?>
        <option value="<?= $cat->id ?>" <?= isset($pro) && is_object($pro) && ($cat->id == $pro->categoria_id) ? 'selected' : ''; ?>><?= $cat->nombre ?></option>
        <?php endwhile; ?>
    </select>
    <?php echo isset($_SESSION['errores']) ?  Utils::mostrarError($_SESSION['errores'], 'categoria') : '' ?>


    <label for="img-produc" id="">Imagen de producto</label>
    <?php if(isset($pro) && is_object($pro) && (!empty($pro->imagen)) && $pro->imagen != 'product-default.jpg'): ?>
            <img src="<?=base_url.'uploads/images/'.$pro->imagen?>" class="thumb" alt="">
    <?php else: ?>
        <img src="<?=base_url.'assets/img/default/'.$pro->imagen?>" class="thumb" alt="">
    <?php endif; ?>
    <input type="file" name="fileToUpload" id="fileToUpload">
    
    <?php echo isset($_SESSION['stock']) ?  Utils::mostrarError($_SESSION['errores'], 'stock') : '' ?>
    <?php echo isset($_SESSION['stock']) ?  Utils::mostrarError($_SESSION['errores'], 'stock') : '' ?>
    <input type="submit" value="Guardar">
    <?php Utils::deleteSesion('errores'); ?>

</form>