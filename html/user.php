<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
	header("Location: index.php");
	exit();
}
?>
<?php
require '../procesos/conexion.php';

$sql = "SELECT * FROM item LIMIT 4";
$result = $conexion->query($sql);

if ($result->rowCount() > 0) {
    // Crear un array vacío para almacenar los datos de las películas
    $items = array();

    // Recorrer los resultados de la consulta y almacenar los datos de las películas en el array
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $items[] = $row;
    }
} else {
    echo "No se encontraron películas";
}
// Cerrar la conexión con la base de datos
$pdo = null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Venta de Biblias - SHADDAI. Explora nuestra amplia selección de Biblias y encuentra la que mejor se adapte a tus necesidades espirituales.">
    <meta name="keywords" content="Venta de Biblias, SHADDAI, Biblias de estudio, Biblia devocional, Biblia infantil, Comprar Biblias, Fe y espiritualidad, Palabra de Dios, Guía espiritual, Lectura de la Biblia, Reflexiones espirituales">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/ctlg.css">
    <!-- CSS personalizado -->
    

    <title>Shadday - Venta de Biblias</title>
</head>
<body>
<?php include 'navbar.php';?>

    <section class="home" >
    <section class="main-section">
    <div class="container">
        <div id="carouselExample" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExample" data-slide-to="1"></li>
                <li data-target="#carouselExample" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../img/4.jpg" alt="Biblia 1" class="w-100">
                    <div class="carousel-caption">
                        
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../img/3.jpg" alt="Biblia 2" class="w-100">
                    <div class="carousel-caption">
                        <h3>Biblia devocional</h3>
                        <p>Una Biblia que te acompaña en tu camino espiritual diario, ofreciendo reflexiones y oraciones para fortalecer tu fe.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../img/2.jpg" alt="Biblia 3" class="w-100">
                    <div class="carousel-caption">
                        <h3>Biblia infantil</h3>
                        <p>Una Biblia adaptada para los más pequeños, con ilustraciones y lenguaje sencillo para introducirlos a la Palabra de Dios.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    </section>

    <header class="main-header">
        <div class="container">
            <h1>Venta de Biblias</h1>
            <h2>Encuentra la Biblia perfecta para ti</h2>
            <p>Explora nuestra amplia selección de Biblias y encuentra la que mejor se adapte a tus necesidades espirituales.</p>
            
            <div class="container">
            <div class="row">
                <div class="container">
                  <?php foreach ($items as $item): ?>
                    <div class="box-book" data-id="<?php echo $item['coditem']; ?>">
                      <img src="<?php echo $item['foto']; ?>" alt="<?php echo $item['nombre']; ?>">
                      <div class="book-info">
                        <h3 class="book-title"><?php echo $item['nombre']; ?></h3>
                        <p class="book-author"><?php echo $item['version']; ?></p>
                        <p class="book-author"><?php echo $item['cat']; ?></p>
                        <p class="book-price">S/ <?php echo $item['precio']; ?></p>
                      </div>
                      <form action="categoria/carrito/AccionCarta.php?action=addToCart" method="POST">
                        <input type="hidden" name="coditem" value="<?php echo $item['coditem']; ?>">
                        <input type="hidden" name="nombre" value="<?php echo $item['nombre']; ?>">
                        <input type="hidden" name="precio" value="<?php echo $item['precio']; ?>">
                        <select name="cantidad" class="cant-select" >
                          <?php for ($cont = 1; $cont <= 100; $cont++): ?>
                            <option value="<?php echo $cont; ?>"><?php echo $cont; ?></option>
                          <?php endfor; ?>
                        </select>
                        <div class="btn-buy" >
                          <button type="submit" class="a-buy"> comprar </button>
                        </div>
                      </form>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
          </div>
            <a href="categoria/all.php" class="btn btn-light">Ver productos</a>
        </div>
    </header>



    <section class="secondary-container">
        <div class="container">
            <div class="row">
                <div class="col-md-6 secondary-img">
                    <img src="../img/3.jpg" alt="Biblia">
                </div>
                <div class="col-md-6 secondary-text">
                    <h2>Descubre la Palabra de Dios</h2>
                    <p>Sumérgete en las enseñanzas sagradas y encuentra la guía espiritual que necesitas en tu vida.</p>
                    <a href="categoria/all.php" class="secondary-link">Explorar Biblias</a>
                </div>
            </div>
        </div>
    </section>

    <section class="main-section">
    <div class="container">
        <h2 class="main-section-title">Nuestras Biblias destacadas</h2>
        <div class="main-section-content">
            <div class="col-md-4 main-section-item">
                <img src="../img//damas/BIBLIA DE ESTUDIO DIARIO VIVIR NTV – TAMAÑO PERSONAL.jpg" alt="Biblia 1">
                <h3>Biblia de estudio</h3>
                <p>Una Biblia diseñada para profundizar en el estudio de las Escrituras y entender su significado en contexto.</p>
            </div>
            <div class="col-md-4 main-section-item">
                <img src="../img/damas/BIBLIA DE ESTUDIO DIARIO VIVIR LETRA GRANDE.jpg" alt="Biblia 2">
                <h3>Biblia devocional</h3>
                <p>Una Biblia que te acompaña en tu camino espiritual diario, ofreciendo reflexiones y oraciones para fortalecer tu fe.</p>
            </div>
            <div class="col-md-4 main-section-item">
                <img src="../img/caballeros/BIBLIA DE ESTUDIO RYRIE.jpg" alt="Biblia 3">
                <h3>Biblia infantil</h3>
                <p>Una Biblia adaptada para los más pequeños, con ilustraciones y lenguaje sencillo para introducirlos a la Palabra de Dios.</p>
            </div>
        </div>
    </div>
</section>


    <footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>Shaddai</h4>
                <p>Tienda de Biblias online</p>
                <ul class="footer-social-icons">
                    <li><a href="#"><i class='bx bxl-facebook'></i>Facebook</a></li>
                    <li><a href="#"><i class='bx bxl-twitter'></i>Twitter</a></li>
                    <li><a href="#"><i class='bx bxl-instagram'></i>Instagram</a></li>
                    <li><a href="#"><i class='bx bxl-pinterest'></i>Pinterest</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Enlaces útiles</h4>
                <ul class="footer-links-page">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Productos</a></li>
                    <li><a href="#">Regístrate</a></li>
                    <li><a href="#">Login</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Contacto</h4>
                <p class="footer-address"><i class='bx bx-map'></i> Dirección de la tienda, Ciudad, País</p>
                <p class="footer-email"><i class='bx bx-envelope'></i> info@shaddai.com</p>
                <p class="footer-phone"><i class='bx bx-phone'></i> +1234567890</p>
            </div>
        </div>
    </div>
</footer>
  <!----===== JS ===== -->
  <script src="../js/navbar.js"></script>
  <script>
    fetch(`jestt.php?coditem=${item['coditem']}`)
  </script>
    <!-- JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </section>
</body>
</html>

