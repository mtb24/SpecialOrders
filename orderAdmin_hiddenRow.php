
<?php
/**********************************************
 *  Order Admin
 *  View order summaries table with hidden rows for
 *  record details.
 ***********************************************/
include_once( 'utilities.php' );
include_once( 'configuration.php' );
include_once( 'objects/class.database.php' );
include_once( 'objects/class.specialorders.php' );

if ( $_SESSION["isAdminLogged"] !== TRUE && $_SESSION["isWarehouseLogged"] !== TRUE && $_SESSION["isStoreLogged"] !== TRUE ) {
   /* Redirects to the home page */
   header("Location: index.php");
   return;
}

include_once( "statusCodes.inc.php" );

$output = "";
$order  = new specialOrders();

// check to see if sort is set
$orderList = array();

if ( isset( $_GET[ 'sort_status' ] ) )
{
    $sort_status = $_GET[ 'sort_status' ];
    $orderList   = $order->GetList( array(
         array(
             "status",
            "=",
            "$sort_status" 
        ) 
    ), "date_submitted", false );
    
}
elseif ( isset( $_GET[ 'sort_status' ] ) && $_GET[ 'sort_status' ] == "all" )
{
    // $_GET['sort_status'] == 0, means all orders    
    $orderList = $order->GetList( array("status", "NOT", ""), "date_submitted", false );
    
}
elseif ( isset( $_GET[ 'sort_status' ] ) && $_GET[ 'sort_status' ] === 'new_bike_order' )
{
    // Get only bike orders
    $sort_status = "yes";
    $orderList   = $order->GetList( array(
         array(
             "new_bike_order",
            "=",
            "$sort_status" 
        ) 
    ), "date_submitted", false );
    
}
elseif ( isset( $_REQUEST[ 'searchbyID' ] ) )
{
    // search by ID
    $orderList = $order->Get( $_REQUEST[ 'searchbyID' ] );
    
}
else
{
    // Get orders with status of 6 or less, sorted by date, limit to 400
    $orderList = $order->GetList( array(
         array(
             "status",
            "<",
            "7" 
        ) 
    ), "date_submitted", false, 400 );
}



// Create table of orders
if ( count( $orderList ) > 0 )
{
    $output .= "<table id='orderAdmin'>";
    $output .= "<thead><tr>" . "<th width=\"20px\"></th>" . "<th width=\"20px\">Order#</th>" . "<th width=\"30px\">Status</th>" . "<th width=\"70px\">Submitted</th>" . "<th width=\"70px\">Ordered</th>" . "<th width=\"70px\">First</th>" . "<th width=\"70px\">Last</th>" . "<th width=\"125px\">Email</th>" . "<th width=\"auto\">Notes</th>" . "</tr></thead><tbody>";
    
    foreach ( $orderList as $orderItem )
    {
        $output .= '<tr id="' . $orderItem->specialordersId . '">' . '<td><img src="resources/images/details_open.png"></td>' . '<td id="specialordersId" class="">' . $orderItem->specialordersId . '</td>' . '<td id="status" style="width: auto; white-space: nowrap;" class="editMeSelect">' . $aStatusCodes[ $orderItem->status ] . '</td>' . '<td id="date_submitted" style="white-space: nowrap;" class="editMeDate">' . $orderItem->date_submitted . '</td>' . '<td id="date_ordered" style="white-space: nowrap;" class="editMeDate">' . $orderItem->date_ordered . '</td>' . '<td id="cust_name_first" class="editMe">' . my_escape( $orderItem->cust_name_first ) . '</td>' . '<td id="cust_name_last" class="editMe">' . my_escape( $orderItem->cust_name_last ) . '</td>' . '<td id="cust_email" class="editMe">' . $orderItem->cust_email . '</td>' . '<td id="notes" class="editMe">' . $orderItem->notes . '</td>' . '</tr>';
    }
    $output .= "</tbody></table>";
    
    echo $output;
}
else
{
    // echos the status codes row, if present
    if ( !empty( $output ) )
        echo $output;
    echo '<div id="message-error" class="message message-error"><div class="image"><img src="resources/images/icons/error.png" alt="Error" height="32" /></div><div class="text"><strong>No Results Found!</strong></div><div class="dismiss"><a href="#message-error"></a></div></div>';
}

?>
