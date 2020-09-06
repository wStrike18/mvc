 <!--BARRA LATERAL-->
 <aside id="lateral">
     <div id="login" class="block_aside">
     <?php if(!isset($_SESSION['usuario'])): ?>
         <h3>Iniciar sesión</h3>
     <?php else:?>
        <h3>Bienvenido</h3>
     <?php endif;?>
    <?php if(isset($_SESSION['usuario'])): ?>
        <p class="alerta alerta-exito" >
           <?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos'] ?>
        </p> 
    <?php elseif(isset($_SESSION['errores-login']['login'])):?>
        <p class="alerta alerta-error">
            <?=$_SESSION['errores-login']['login']?>
        </p>
    <?php endif; ?>
        
        <?php if(!isset($_SESSION['usuario'])): ?>
         <form action="<?=base_url?>usuario/login" method="POST">
             <label for="email" class="icon">U</label>
             <input type="email" name="email" />
             <label for="password" class="icon pass">w</label>
             <input type="password" name="password" />
             <input type="submit" id="btnLogin" value="INICIAR SESION">
             <?php Utils::deleteSesion('errores-login'); ?>
            <a href="<?=base_url?>usuario/registrar" id="registerLink">Crear cuenta</a>
         </form>
        <?php else:?>
        <a href="<?=base_url?>usuario/logout" id="registerLink">Cerrar sesión</a>
        <?php endif;?>
    </div>
    <div id="gestion" class="block_aside">
            <ul>
            <?php if(isset($_SESSION['usuario'])):?>
                <li>
                    <a href="#">Mis pedidos</a>
                </li>
            <?php endif; ?>
        <?php if(isset($_SESSION['admin'])): ?>
                <li>
                    <a href="<?=base_url?>categoria/index">Gestionar categorías</a>
                </li>
                <li>
                    <a href="<?=base_url?>producto/gestionar">Gestionar productos</a>
                </li>
                <li>
                    <a href="#">Gestionar pedidos</a>
                </li>
        <?php endif;?>
            </ul>
    </div>

     
 </aside>

 <div id="central">
