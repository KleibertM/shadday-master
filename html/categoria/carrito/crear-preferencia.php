<?php
require __DIR__ . '/../../../vendor/autoload.php';

// Configura tus credenciales de API
MercadoPago\SDK::setAccessToken("APP_USR-7186132166490018-060213-d5938229cd04736873fe83547fa77505-1388941507");

// Obtén la preferencia de pago del cuerpo de la solicitud POST
$preference = $_POST['preference'];

// Crea un objeto de preferencia
$preferenceObj = new MercadoPago\Preference();

// Crea los ítems en la preferencia
$items = [];
foreach ($preference['items'] as $itemData) {
  $item = new MercadoPago\Item();
  $item->title = $itemData['title'];
  $item->quantity = $itemData['quantity'];
  $item->unit_price = $itemData['unit_price'];
  $items[] = $item;
}
$preferenceObj->items = $items;
$preferenceObj->save();

// Retorna la respuesta con la URL de inicio de pago
echo json_encode(['status' => 'success', 'init_point' => $preferenceObj->init_point]);
?>
