<?php

session_start();

?>
<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="https://sun6-22.userapi.com/s/v1/if1/iucnC5GAhyAYkCVVwGENQaAX09zQDFOGWzpxGqwUWPIh1GylJuhvY_Y5ssDrE9IETUx7VhbX.jpg?size=957x957&quality=96&crop=33,33,957,957&ava=1"
                    alt="">
            </span>

            <div class="text logo-text">
                <span class="name">Shadday</span>
                <span class="profession">Bienvenido <?php echo $_SESSION['user']; ?></span>
            </div>
        </div>

        <i class='bx bx-chevron-right toggle'></i>
    </header>
    <div class="menu-bar">
        <div class="menu">

            <li class="search-box">
                <i class='bx bx-search icon'></i>
                <input type="text" placeholder="Search...">
            </li>

            <ul class="menu-links">
                <li class="nav-link">
                    <a href="admin.php" id="inicio-link">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Inicio</span>
                    </a>
                </li>

                <div class="menu-categoria">
                    <ul>
                        <li class="iocn-link nav-link">
                            <a  id="libros-link">
                                <i class='bx bx-book-alt icon'></i>
                                <span class="text nav-text">Catalogo</span>
                                <i class='bx bxs-chevron-down arrow'></i>
                            </a>
                            <ul class="sub-menu blank">
                                <li><a href="categoria/all.php">Todos</a></li>
                                <li><a href="categoria/damas.php">Damas</a></li>
                                <li><a href="categoria/men.php">Caballeros</a></li>
                                <li><a href="categoria/niños.php">Niños</a></li>
                                <li><a href="categoria/bolsillos.php">Bolsillo</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>



                <li class="nav-link">
                    <a href="items.php">
                        <i class='bx bxs-grid bx-rotate-90 icon' ></i>
                        <span class="text nav-text">Productos</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="ventas.php">
                        <i class='bx bx-wallet icon'></i>
                        <span class="text nav-text">Ventas</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="https://www.tidio.com/panel/visitors" target="_blank">
                        <i class='bx bx-chat icon'  ></i>
                        <span class="text nav-text">Mensajes</span>
                    </a>
                </li>
                <!--<li class="nav-link">
                    <a href="ventas.php">
                        <i class='bx bx-wallet icon'></i>
                        <span class="text nav-text">Ventas</span>
                    </a>
                </li>-->
                

            </ul>
        </div>

        <div class="bottom-content">

            <li class="">
                <a href="clientes.php">
                    <i class='bx bxs-group icon'></i>
                    <span class="text nav-text">Clientes</span>
                </a>
            </li>

            <li class="">
                <a href="provee.php">
                    <i class='bx bx-detail icon'></i>
                    <span class="text nav-text">Proveedores</span>
                </a>
            </li>

            <li class="">
                <a href="../procesos/cerrar.php">
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
