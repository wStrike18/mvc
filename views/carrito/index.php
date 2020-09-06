<div  id="title-product">
    <h1>Tu carrito</h1>
</div>
<table id="tb_carrito" class="table">
    <thead  class="bg-success">
        <tr>
            <td>Imagen</td>
            <td>Nombre</td>
            <td>Precio</td>
            <td>Unidades</td>
        </tr>
    </thead>
    <tbody id="tbl_body_table">
        <?php foreach($carrito as $indice => $producto):  
                $prod = $producto['producto'];
                
            ?>
            
            <tr>
                <td><?php if($prod->imagen != null): ?>
                            <img src="<?=base_url?>uploads/images/<?=$prod->imagen?>" alt="" class="img_carrito" />
                            <?php else:?>
                            <img src="<?=base_url?>assets/img/default/<?=$prod->imagen?>" alt="" class="img_carrito" />
                            <?php endif; ?></td>
                <td><?= $prod->nombre ?></td>
                <td><?= $prod->precio ?></td>
                <td><?= $producto['unidades'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        
        <tr>
            <th scope="col">Imagen</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Unidades</th>
        </tr>
    </tfoot>

</table>
