<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/bootstrap-4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/css/styles-grid.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/icon/style.css">

    
    <title>Abarrotes Chiclayo</title>
</head>

<body>
    <div id="container">
        <!--CABECERA-->
        <header id="header">
            <div id="logo">
                <a class="text-logo a" href="<?=base_url?>">A</a>
                <a class="text-logo b" href="<?=base_url?>">B</a>
                <a class="text-logo aa" href="<?=base_url?>">A</a>
                <a class="text-logo r" href="<?=base_url?>">R</a>
                <a class="text-logo rr" href="<?=base_url?>">R</a>
                <a class="text-logo o" href="<?=base_url?>">O</a>
                <a class="text-logo t" href="<?=base_url?>">T</a>
                <a class="text-logo e" href="<?=base_url?>">E</a>
                <a class="text-logo s" href="<?=base_url?>">S</a>
                <a class="text-logo c" href="<?=base_url?>">C</a>
                <a class="text-logo i" href="<?=base_url?>">I</a>
                <a class="text-logo x" href="<?=base_url?>">X</a>

                <!--img src="assets/img/abarrotes.png" alt="CAMISETA LOGO" /-->
            </div>
        </header>
        <!--header id="header">
            <div id="logo">
                <img src="<?= base_url ?>assets/img/camiseta.png" alt="ABROTES LOGO" />
                <a href="<?=base_url?>">
                    Tienda de camisetas
                </a>
            </div>
        </header-->
        <!--MENU-->
        <?php $categorias = Utils::getAllCategoria(); ?>
        <nav id="menu" class="menu-border">
            <ul>
                <li>
                    <a href="<?=base_url?>">Inicio</a>
                </li>
            <?php while($cat = $categorias->fetch_object()): ?>
                <li>
                    <a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a>
                </li>
            <?php endwhile;?>
            </ul>
        </nav>

        <div id="content">