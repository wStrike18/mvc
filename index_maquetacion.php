<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/styles-grid.css">
    <title>Tienda de abarrotes</title>
</head>

<body>
    <div id="container">
        <!--CABECERA-->
        <header id="header">
            <div id="logo">
                <a class="text-logo a" href="index.php">A</a>
                <a class="text-logo b"  href="index.php">B</a>
                <a class="text-logo aa"  href="index.php">A</a>
                <a class="text-logo r"  href="index.php">R</a>
                <a class="text-logo rr"  href="index.php">R</a>
                <a class="text-logo o"  href="index.php">O</a>
                <a class="text-logo t"  href="index.php">T</a>
                <a class="text-logo e"  href="index.php">E</a>
                <a class="text-logo s"  href="index.php">S</a>
                <a class="text-logo c"  href="index.php">C</a> 
                <a class="text-logo i"  href="index.php">I</a> 
                <a class="text-logo x"  href="index.php">X</a>                
           
                <!--img src="assets/img/abarrotes.png" alt="CAMISETA LOGO" /-->
                </div>
        </header>
        <!--MENU-->
        <nav id="menu" class="menu-border">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>
                <li>
                    <a href="index.php">Categoria 1</a>
                </li>
                <li>
                    <a href="index.php">Categoria 2</a>
                </li>
                <li>
                    <a href="index.php">Categoria 3</a>
                </li>
                <li>
                    <a href="index.php">Categoria 4</a>
                </li>
            </ul>
        </nav>

        <div id="content">
            <!--BARRA LATERAL-->
            <aside id="lateral">
                <div id="login" class="block_aside">
                    <h3>Entrar a la web</h3>
                    <form action="#" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email" />
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" />
                        <input type="submit" value="Iniciar Sesion">
                    </form>
                    <ul>
                        <li>
                            <a href="#">Mis pedidos</a>
                        </li>
                        <li>
                            <a href="#">Gestionar pedidos</a>
                        </li>
                        <li>
                            <a href="#">Gestionar categorías</a>
                        </li>
                    </ul>
                   

                </div>
            </aside>
            <!--CONTENIDO CENTRAL-->
            <div id="central">

                <div id="title-product">
                    <h1>Productos destacados</h1>
                </div>

                <div id="products">
                    <div class="product">
                        <img src="assets/img/camiseta.png" alt="" />
                        <h2>Camiseta azul ancha</h2>
                        <p>30 S/.</p>
                        <a href="#" class="button">Comprar</a>
                    </div>
                    <div class="product">
                        <img src="assets/img/camiseta.png" alt="" />
                        <h2>Camiseta azul ancha</h2>
                        <p>30 S/.</p>
                        <a href="#" class="button" >Comprar</a>
                    </div>
                    <div class="product">
                        <img src="assets/img/camiseta.png" alt="" />
                        <h2>Camiseta azul ancha</h2>
                        <p>30 S/.</p>
                        <a href="#" class="button">Comprar</a>
                    </div>
                </div>
                
            </div>

        </div>

        <!--FOOTER-->
        <footer id="footer">
            <p>Desarrollado por Wilson Vasquez &copy; <?= date('Y'); ?></p>
        </footer>
    </div>

</body>

</html>