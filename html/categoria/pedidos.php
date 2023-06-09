$estado_venta = "pagado";

if ($estado_venta == "pendiente") {
  echo "La venta está pendiente de pago.";
} elseif ($estado_venta == "pagado") {
  echo "La venta ha sido pagada.";
} elseif ($estado_venta == "cancelado") {
  echo "La venta ha sido cancelada.";
} else {
  echo "El estado de la venta es desconocido.";
}
