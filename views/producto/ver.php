<?php if(isset($pro)): ?>
    <div id="title-product">
        <h1><?=$pro->nombre?></h1>
    </div>
    <div id="detalle-producto">
        <div id="producto-img">
            <?php if( $pro->imagen != 'product-default.jpg'): ?>
            <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" alt="" />
            <?php else:?>
            <img src="<?=base_url?>assets/img/default/<?=$pro->imagen?>" alt="" />
            <?php endif; ?>
        </div>
        <div id="producto-datos">
            <h2><?=$pro->nombre?></h2>
            <p><?=$pro->precio?> S/.</p>
            <a href="<?=base_url?>carrito/add&id=<?=$pro->id?>" class="button">Comprar</a>
        </div>
       
    </div>
            
    
<?php else: ?>
    <div id="title-product">
        <h1>El producto no existe</h1>
    </div>
<?php endif; ?>