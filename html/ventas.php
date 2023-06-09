
<?php
include '../procesos/conexion.php';
$stmt = $conexion->prepare("SELECT * FROM venta ORDER BY idventa desc");
$stmt->execute();
$cont = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="../css/init.css">
    <link rel="stylesheet" href="../css/style.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php include 'navadmin.php'; ?>
<div class="main-container">
  <div class="title-table">
    <h1>Ventas Totales</h1>
  </div>
  <table class="styled-table">
    <thead>
      <tr>
        <td class="table__header">Número de Orden</td>
        <td class="table__header">Fecha y Hora</td>
        <td class="table__header">Total</td>
        <td class="table__header">Detalles</td>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
          <td class="table__item"><?php echo $row['idventa']; ?></td>
          <td class="table__item"><?php echo $row['fecha_hora']; ?></td>
          <td class="table__item" style="color: green; font-weight: bold; ">S/ <?php echo $row['total']; ?></td>
          <td class="table__item"><a href="detVenta.php?idventa=<?php echo $row['idventa']; ?>">Detalles de venta</a></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

    <!----===== JS ===== -->
    <script src="../js/navbar.js"></script>
</body>
</html>
