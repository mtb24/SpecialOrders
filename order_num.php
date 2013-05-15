<?php
/*
  Returns number of Orders with status = 1
*/

include_once('configuration.php');
include_once('objects/class.database.php');
include_once('objects/class.specialorders.php');

$order = new specialOrders();

$orderList = $order->GetList(array(array("status", "<", 3)));

echo count($orderList);

?>