<?php
/**********************************************
*   Order search by store
*  return all open orders for selected location
*
***********************************************/
include_once('configuration.php');
include_once('objects/class.database.php');
include_once('objects/class.specialorders.php');

// Array of status codes and text descriptions
include_once("statusCodes.inc.php");

if (isset($_GET['store']) ) {
    $order = new specialOrders();
   $searchStore = $_GET['store'];
   $openOrdersList = $order->GetList(
                                     array(
                                        array("`status` < 6  AND "),
                                        array("MATCH(`store`) AGAINST(\"$searchStore\" IN BOOLEAN MODE)")
                                    ),
                                     "status",
                                     true
                            );
   //echo json_encode($openOrdersList);
   $aOpenOrdersByStore = array();
   foreach($openOrdersList as $openOrder) {
      $aNewOrder = array();
      $aNewOrder["order_id"] = $openOrder->specialordersId;
      $aNewOrder["status"] = $aStatusCodes[$openOrder->status];
      $aNewOrder["date_ordered"] = $openOrder->date_ordered;
      $aNewOrder["date_submitted"] = $openOrder->date_submitted;
      $aNewOrder["notes"] = $openOrder->notes;
      $aOpenOrdersByStore[] = $aNewOrder;
   }
   echo json_encode($aOpenOrdersByStore);
} else { echo "response:script+failure"; }
?>