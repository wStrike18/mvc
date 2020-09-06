<?php if(isset($cat)): ?>
    <div  id="title-categoria">
        <h1><?=$cat->nombre?></h1>
        <?php if($prods->num_rows == 0): ?>
            <h1>No hay productos para mostrar</h1>
        <?php else: ?>
            <div id="products">
                <?php while($prod = $prods->fetch_object()): ?>
                <div class="product">
                <a href="<?=base_url?>producto/ver&id=<?=$prod->id?>"> 
                    <?php if( $prod->imagen != 'product-default.jpg'): ?>
                    <img src="<?=base_url?>uploads/images/<?=$prod->imagen?>" alt="" />
                    <?php else:?>
                    <img src="<?=base_url?>assets/img/default/<?=$prod->imagen?>" alt="" />
                    <?php endif; ?>
                    <h2><?=$prod->nombre?></h2>
                    <p><?=$prod->precio?> S/.</p>
                </a>
                    <a href="#" class="button">Comprar</a>
                </div>
                <?php endwhile; ?>
            </div>
        <?php endif;?>
    </div>
<?php else: ?>
    <div id="title-categoria">
        <h1>La categorìa no existe</h1>
    </div>
<?php endif; ?>
    