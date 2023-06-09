<?php
include '../procesos/conexion.php';

// Verificar si se ha proporcionado el ID de la venta en la URL
if(isset($_GET['idventa'])) {
    $idVenta = $_GET['idventa'];
    
    // Consulta SQL modificada para filtrar por el ID de la venta
    $stmt = $conexion->prepare("SELECT dv.*, i.nombre AS item_FK
                               FROM detalleventa dv
                               INNER JOIN item i ON dv.item_FK = i.coditem
                               WHERE dv.venta_FK = :idventa ");
    $stmt->bindParam(':idventa', $idVenta);
    $stmt->execute();
} else {
    // Redireccionar a la página de ventas si no se proporciona el ID de la venta
    header("Location: ventas.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Ventas</title>
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="../css/init.css">
    <link rel="stylesheet" href="../css/style.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php include 'navadmin.php'; ?>
   <div class="main-container" >
   <div class="tite-table" > 
        <h1>Detalles de las Ventas</h1>
    </div> 
    <div class="edit">
        <a href="factura.php">Facturas</a>
     </div>

    <table class="styled-table"  >
        <thead>
            <tr>
                <td class="table__header">ID Detalle Venta</td>
                <td class="table__header">ID Venta</td>
                <td class="table__header">Nombre del Item</td>
                <td class="table__header">Cantidad</td>
                <td class="table__header">Precio Unidad</td>
            </tr>
        </thead>
        <tbody>
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td class="table__item"><?php echo $row['idDetVenta']; ?></td>
                <td class="table__item"><?php echo $row['venta_FK']; ?></td>
                <td class="table__item"><?php echo $row['item_FK']; ?></td>
                <td class="table__item"><?php echo $row['cantidad']; ?></td>
                <td class="table__item" style="color: green; font-weight: bold; ">S/ <?php echo $row['precio']; ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
   </div>
      <!----===== JS ===== -->
      <script src="../js/navbar.js"></script>
</body>
</html>
