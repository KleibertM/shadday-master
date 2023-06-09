<?php

session_start();

?>

<script src="//code.tidio.co/ibctjonvw31zzxgq0rg1zcekeytmouyu.js" async></script>
<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="https://sun6-22.userapi.com/s/v1/if1/iucnC5GAhyAYkCVVwGENQaAX09zQDFOGWzpxGqwUWPIh1GylJuhvY_Y5ssDrE9IETUx7VhbX.jpg?size=957x957&quality=96&crop=33,33,957,957&ava=1"
                    alt="">
            </span>
            <div class="text logo-text">
                <span class="name">Shadday</span>
                <span class="profession">Hola <?php echo $_SESSION['user']; ?></span>
            </div>
        </div>
        <i class='bx bx-chevron-right toggle'></i>
    </header>
    <div class="menu-bar">
        <div class="menu">
        <li id="search-form" class="search-box">
            <i class='bx bx-search icon'></i>
            <input id="search-input" type="text" placeholder="Search...">
        </li>
            <ul class="menu-links">
                <li class="nav-link">
                    <a href="../user.php" id="inicio-link">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Inicio</span>
                    </a>
                </li>
                <div class="menu-categoria">
                    <ul>
                        <li class="iocn-link nav-link">
                            <a  id="libros-link">
                                <i class='bx bx-book-alt icon'></i>
                                <span class="text nav-text">Libros</span>
                                <i class='bx bxs-chevron-down arrow'></i>
                            </a>
                            <ul class="sub-menu blank">
                                <li><a href="all.php">Todos</a></li>
                                <li><a href="damas.php">Damas</a></li>
                                <li><a href="men.php">Caballeros</a></li>
                                <li><a href="niños.php">Niños</a></li>
                                <li><a href="bolsillos.php">Bolsillo</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <li class="nav-link">
                    <a href="#" id="favoritos-link">
                        <i class='bx bx-heart icon'></i>
                        <span class="text nav-text">Favoritos</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="carrito/VerCarta.php" id="carrito-link">
                        <i class='bx bx-cart icon'></i>
                        <span class="text nav-text">Carrito</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="bottom-content">
            <li class="">
                <a href="../soporte.php">
                    <i class='bx bx-help-circle icon'></i>
                    <span class="text nav-text">Soporte</span>
                </a>
            </li>
            <li class="">
                <a href="../politicas.php">
                    <i class='bx bx-detail icon'></i>
                    <span class="text nav-text">Politicas</span>
                </a>
            </li>
            <li class="">
                <a href="../../procesos/cerrar.php">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text">Cerrar sesión</span>
                </a>
            </li>
            <li class="mode">
                <div class="sun-moon">
                    <i class='bx bx-moon icon moon'></i>
                    <i class='bx bx-sun icon sun'></i>
                </div>
                <span class="mode-text text">Modo oscuro</span>
                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>
        </div>
    </div>
</nav>