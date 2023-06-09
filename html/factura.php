
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Factura de compra</title>
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="../css/init.css">
    <link rel="stylesheet" href="../css/style.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body><?php
include '../procesos/conexion.php';
$stmt = "SELECT * FROM detalleventa INNER JOIN item ON nombre = item.nombre inner join venta on idventa = venta.idventa ";
$result = $conexion->query($stmt);

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
<?php include 'navadmin.php'; ?>
	 <div class="home" >
     <div class="main-container" >
     <div class="tite-table" > 
        <h1>Facturas</h1>
    </div>
     <div class="edit">
        <a href="detVenta.php">Detalles de venta</a>
     </div>
	<table class="styled-table" >
        <thead>
            <tr>
                <td class="table__header">N. Venta</td>
                <td class="table__header">N. Det. Venta</td>
                <td class="table__header">N. Cliente</td>
                <td class="table__header">Fecha y Hora</td>
                <td class="table__header">N. Producto</td>
                <td class="table__header">Nom. Producto</td>
                <td class="table__header">Cantidad</td>
                <td class="table__header">Precio Unitario</td>
                <td class="table__header">Total</td>
            </tr>
        </thead>
        <?php foreach ($items as $row) : ?>
        <tbody>
            <tr>
                <td class="table__item"><?php echo $row['idventa']; ?></td>
                <td class="table__item"><?php echo $row['idDetVenta']; ?></td>
                <td class="table__item"><?php echo $row['idcliente']; ?></td>
                <td class="table__item"><?php echo $row['fecha_hora']; ?></td>
                <td class="table__item"><?php echo $row['item_FK']; ?></td>
                <td class="table__item"><?php echo $row['nombre']; ?></td>
                <td class="table__item"><?php echo $row['cantidad']; ?></td>
                <td class="table__item"><?php echo $row['precio']; ?></td>
                <td class="table__item"><?php echo $row['total']; ?></td>
            </tr>
        </tbody>
        <?php endforeach; ?>
    </table>
     </div>
     </div>

      <!----===== JS ===== -->
      <script src="../js/navbar.js"></script>
</body>
</html>
