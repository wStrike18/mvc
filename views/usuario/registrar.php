<div id="title-user">
    <h1>Crear Registrarse</h1>
</div>
<?php if(isset($_SESSION['registrar'])): ?>
    <p class="alerta alerta-exito" >
    <?=$_SESSION['registrar']?>
</p> 
 <?php elseif(isset($_SESSION['errores']['general'])):?>
    <p class="alerta alerta-error">
    <?=$_SESSION['errores']['general']?>
 </p>
<?php endif; ?>
<?php Utils::deleteSesion('registrar'); 
?>

<form id="formRegistro" action="<?=base_url?>usuario/save" method="POST">

    <label for="nombre">Nombres</label>
    <input type="text" name="nombre"  />
    <?php echo isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'],'nombre') : '' ?>

    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos"   />
    <?php echo isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'],'apellidos')  : ''  ?>

    <label for="email">Email</label>
    <input type="text" name="email"   />
    <?php echo isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'],'email')  : '' ?>

    <label for="password">Contraseña</label>
    <input type="password" name="password"   />
    <?php echo isset($_SESSION['errores']) ?  Utils::mostrarError($_SESSION['errores'],'password') : '' ?>

    <input type="submit" value="Registrarse">
    <?php Utils::deleteSesion('errores'); ?>

</form>