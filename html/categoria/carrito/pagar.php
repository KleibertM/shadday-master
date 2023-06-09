<?php
// include database configuration file
include 'conexion.php';

// include MercadoPago library
require __DIR__ . '/../../../vendor/autoload.php';

// initializ shopping cart class
include 'La-carta.php';
$cart = new Cart;

// redirect to home if cart is empty
if ($cart->total_items() <= 0) {
    echo '';
}

// set customer ID in session
if (isset($_SESSION['cliente'])) {
    // get customer details from session
    $custRow = $_SESSION['cliente'];
    $_SESSION['sessCustomerID'] = $custRow->codcliente;
} else {
    // set customer ID in session to default value
    $_SESSION['sessCustomerID'] = 1;
}

// get customer details by session customer ID
$query = $db->query("SELECT * FROM cliente WHERE codcliente = " . $_SESSION['sessCustomerID']);
$custRow = $query->fetch_assoc();

// Set Mercado Pago credentials
MercadoPago\SDK::setAccessToken("TEST-7186132166490018-060213-dc8a6f11c912d552cdc82029e131fd1e-1388941507");

// Create preference
$preference = new MercadoPago\Preference();

$preference->back_urls = array(
    "success" => "http://localhost/shadday-master/html/categoria/carrito/OrderExito.php",
    "failure" => "http://localhost/shadday-master/html/categoria/carrito/falla.php",
    //"pending" =>"http://localhost/shadday-master/html/categoria/carrito/falla.php",
);

$items = [];

// Obtener el valor del envío desde el formulario
$envio = isset($_POST['envio']) ? $_POST['envio'] : '';

// Inicializar el monto total con el valor original
$totalPagar = $cart->total();

// Verificar si se seleccionó envío a domicilio
if ($envio === 'domicilio') {
    // Sumar 15 soles al monto total
    $totalPagar += 15;
}

if ($cart->total_items() > 0) {
    // Obtener los ítems del carrito
    $cartItems = $cart->contents();
    foreach ($cartItems as $item) {
        $product = new MercadoPago\Item();
        $product->title = $item["nombre"];
        $product->quantity = $item["cantidad"];
        $product->unit_price = $item["precio"];
        $items[] = $product;
    }
}

$preference->items = $items;
$preference->save();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>
<body>
<div id="pago-btn"></div>

<input type="hidden" name="total" id="total" value="<?php echo $totalPagar; ?>">

<script>
    document.getElementById("envio").addEventListener("change", function() {
        var total = parseFloat(document.getElementById("total").value);
        if (this.value === "domicilio") {
            total += 15; // Sumar 15 soles al total
        }
        document.getElementById("total").value = total.toFixed(2);
        document.getElementById("pago-btn").innerHTML = "Pagar S/ " + total.toFixed(2) + " Soles";
        document.getElementById("total-pagar").innerHTML = "<strong>Total <span id='total-pagar'>S/ " + total.toFixed(2) + " Soles</span></strong>";
    });
</script>

<script>
    const mp = new MercadoPago('TEST-d67a4d50-47a5-4d72-ad62-54b8b031f4d9');
    const bricksBuilder = mp.bricks();

    mp.bricks().create("wallet", "pago-btn", {
        initialization: {
            preferenceId: "<?php echo $preference->id; ?>",
        },
    });
</script>
</body>
</html>
