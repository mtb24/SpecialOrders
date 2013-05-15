<?php
/**********************************************
 *  statusCodes.php
 *  Look up status codes and return JSON or HTML
 *  code for select dropdown
 ***********************************************/
include_once( 'configuration.php' );
include_once( 'objects/class.database.php' );
include_once( 'objects/class.specialorders.php' );

if ( $_SESSION["isAdminLogged"] !== TRUE && $_SESSION["isWarehouseLogged"] !== TRUE && $_SESSION["isStoreLogged"] !== TRUE )
    return;

include_once( "statusCodes.inc.php" );

// this mode is used to generate the select tag into the admin tab
if ( isset( $_GET[ "getFilteringSelectTag" ] ) )
{
    echo "<span style=\"color: white; font-size: 14px; font-weight: bold;\">Filter by Order Status</span> ";
    echo "<select id=\"filtering_status_codes\">\n";
    echo "<option value=\"all\">All Orders</option>\n";
    foreach ( $aStatusCodes as $id => $code )
        echo "<option value=\"$id\" >$code</option>\n";
    echo "</select>\n";
    return;
}

$order                      = new specialOrders();
$record                     = $order->Get( $_GET[ 'row_id' ] );
$aStatusCodes[ "selected" ] = $record->status;
echo json_encode( $aStatusCodes );

?>