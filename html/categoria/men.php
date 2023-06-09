<?php
require '../../procesos/conexion.php';

$sql = "SELECT * FROM item WHERE cat = 'CABALLEROS' ";
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
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Catálogo de Libros</title>
    <link rel="stylesheet" href="../../css/ctlg.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/init.css">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php include 'nav.php'; ?>
    <script src="../../js/navbar.js"></script>
    <section class="home">
  <div class="ctlg">
    <div class="titulo">
      <h1 style="text-align: center;">Conocimientos de Dios</h1>
    </div>
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
          <form action="carrito/AccionCarta.php?action=addToCart" method="POST">
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
</section>
    <div id="libro-details">
        <i class='bx bx-x cerrar toggle'></i>
        <div class="contenido"></div>
        <!-- Aquí se mostrarán los detalles del libro seleccionado -->
    </div>

    <script>
    const itemList = document.querySelectorAll('.box-book');
    const itemDetails = document.querySelector('#libro-details');
    const contenido = document.querySelector('.contenido');
    const closeButton = document.querySelector('.cerrar');
    const searchInput = document.querySelector('#search-input');

    itemList.forEach((item) => {
      item.addEventListener('click', (e) => {
        const itemId = e.target.closest('.box-book').dataset.id;
        fetch(`jestt.php?coditem=${itemId}`)
          .then(response => response.json())
          .then(data => {
            contenido.innerHTML = `
            <h4>${data.nombre}</h4>
            <img src="${data.foto}" alt="${data.nombre}">
            <p><b>Version: </b>${data.version}</p>
            <p><b>Letra:</b> ${data.letra}</p>
            <p><b>N. Paginas:</b> ${data.npag}</p>
            <p><b>Descripción:</b> ${data.descripcion}</p>
            <p>Precio:<b> S/ ${data.precio}</B></p>
          `;
            itemDetails.classList.add('active');
          });
      });
    });

    closeButton.addEventListener('click', () => {
      itemDetails.classList.remove('active');
    });

    searchInput.addEventListener('input', () => {
      const searchTerm = searchInput.value.toLowerCase();
      itemList.forEach((item) => {
        const bookTitle = item.querySelector('.book-title').textContent.toLowerCase();
        const bookAuthor = item.querySelector('.book-author').textContent.toLowerCase();
        const bookPrice = item.querySelector('.book-price').textContent.toLowerCase();
        if (bookTitle.includes(searchTerm) || bookAuthor.includes(searchTerm) || bookPrice.includes(searchTerm)) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    });
  </script>

  <script>
    fetch(`jestt.php?coditem=${item['coditem']}`)
  </script>
</body>

</html>