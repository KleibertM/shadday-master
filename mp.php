<?php 

require __DIR__ . '/vendor/autoload.php';

// Set Mercado Pago credentials
MercadoPago\SDK::setAccessToken("APP_USR-7186132166490018-060213-d5938229cd04736873fe83547fa77505-1388941507");

// Create preference
$preference = new MercadoPago\Preference();

$item = new MercadoPago\Item();
$item->id = '001';
$item->title = 'Producto 1';
$item->quantity = 1;
$item->unit_price= 150.00;
$item->currency_id = "MXN";

$preference->items = array($item);

$preference->save();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testMP</title>

    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>
<body>
    <h4>Mercado pago</h4>
    <div id="pago-btn" ></div>

    <script>
        const mp = new MercadoPago('APP_USR-149d11dd-07f9-4a28-8c5c-bcd64df385cc');
        const bricksBuilder = mp.bricks();

        mp.bricks().create("wallet", "pago-btn", {
        initialization: {
            preferenceId: "<?php echo $preference->id; ?>",
        }, });
    </script>

</body>
</html>