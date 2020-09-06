<div  id="title-categoria">
    <h1>Crear categoría</h1>
</div>
<?php if (isset($_SESSION['errores']['general'])) : ?>
    <p class="alerta alerta-error">
        <?= $_SESSION['errores']['general'] ?>
    </p>
<?php endif; ?>
<?php Utils::deleteSesion('categoria');
?>

<form id="formRegistroCategoria" action="<?= base_url ?>categoria/save" method="POST">

    <label for="nombre">Nombre de categoría</label>
    <input type="text" name="nombre" required />
<?php echo isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'], 'categoria') : '' ?>

    <input type="submit" value="Crear">
<?php Utils::deleteSesion('errores'); ?>

</form>