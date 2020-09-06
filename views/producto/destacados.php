            <!--CONTENIDO CENTRAL-->
           
                <div  id="title-product">
                    <h1>Productos</h1>
                </div>
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
