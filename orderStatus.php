<?php
/**********************************************
 *   Order Status
 *  Takes parameters from form and returns table
 *
 ***********************************************/
include_once( 'configuration.php' );
include_once( 'objects/class.database.php' );
include_once( 'objects/class.specialorders.php' );

// Array of status codes and text descriptions
include_once( "statusCodes.inc.php" );

if ( !isset( $_GET[ "term" ] ) )
{
    echo "";
    return;
}

$searchStore = isset( $_GET[ "store" ] ) ? $_GET[ "store" ] : false;
$searchTerm  = $_GET[ "term" ];
// check for spaces, in case add ( )
if ( strpos( $searchTerm, " " ) !== false )
    $searchTerm = "(" . $searchTerm . ")";

$order        = new specialOrders();
$customerList = array();
$employeeList = array();

// If searching by store
if ( $searchStore !== false )
{
    $customerList = $order->GetList( array(
         array(
             "( `specialordersid` = \"$searchTerm\" OR " 
        ),
        array(
             "  MATCH(`cust_name_first`, `cust_name_last`) AGAINST(\"$searchTerm*\" IN BOOLEAN MODE) ) AND " 
        ),
        array(
             "`store` = \"$searchStore\"" 
        ) 
    ), "status" );
    $employeeList = $order->GetList( array(
         array(
             "( `specialordersid` = \"$searchTerm\" OR " 
        ),
        array(
             "  MATCH(`employee_name`) AGAINST(\"$searchTerm*\" IN BOOLEAN MODE) ) AND " 
        ),
        array(
             "`store` = \"$searchStore\"" 
        ) 
    ), "status" );
}
// Seach by term
else
{
    $customerList = $order->GetList( array(
        array(
              "\"$searchTerm\" IN (`item_1_rpro_num`,`item_2_rpro_num`,`item_3_rpro_num`,`item_4_rpro_num`,`item_5_rpro_num`) OR "
        ),
        array(
             "`specialordersid` = \"$searchTerm\" OR " 
        ),
        array(
             "MATCH(`cust_name_first`, `cust_name_last`) AGAINST(\"$searchTerm*\" IN BOOLEAN MODE)" 
        ) 
    ), "status" );
    $employeeList = $order->GetList( array(
         array(
             "`specialordersid` = \"$searchTerm\" OR " 
        ),
        array(
             "MATCH(`employee_name`) AGAINST(\"$searchTerm*\" IN BOOLEAN MODE)" 
        ) 
    ), "status" );
}

$aCustomer       = array();
$aCheckDuplicate = array();
foreach ( $customerList as $order )
{
    $custFullName = $order->cust_name_first . " " . $order->cust_name_last;
    if ( ( $iKey = array_search( strtolower( $custFullName ), $aCheckDuplicate ) ) !== false )
    {
        $aNewOrder                        = array();
        $aNewOrder[ "order_id" ]          = $order->specialordersId;
        $aNewOrder[ "status" ]            = $aStatusCodes[ $order->status ];
        $aNewOrder[ "date_ordered" ]      = $order->date_ordered;
        $aNewOrder[ "date_submitted" ]    = $order->date_submitted;
        $aNewOrder[ "notes" ]             = $order->notes;
        $aNewOrder[ "value" ]             = $custFullName;
        $aCustomer[ $iKey ][ "others" ][] = $aNewOrder;
        continue;
    }
    
    $aCheckDuplicate[ count( $aCustomer ) ] = strtolower( $custFullName );
    
    $aNewOrder                     = array();
    $aNewOrder[ "order_id" ]       = $order->specialordersId;
    $aNewOrder[ "status" ]         = $aStatusCodes[ $order->status ];
    $aNewOrder[ "date_ordered" ]   = $order->date_ordered;
    $aNewOrder[ "date_submitted" ] = $order->date_submitted;
    $aNewOrder[ "notes" ]          = $order->notes;
    $aNewOrder[ "value" ]          = $custFullName;
    $aNewOrder[ "others" ]         = array();
    $aCustomer[]                   = $aNewOrder;
}


$aEmployee       = array();
$aCheckDuplicate = array();
foreach ( $employeeList as $order )
{
    $employeeName = $order->employee_name;
    if ( ( $iKey = array_search( strtolower( $employeeName ), $aCheckDuplicate ) ) !== false )
    {
        $aNewOrder                        = array();
        $aNewOrder[ "order_id" ]          = $order->specialordersId;
        $aNewOrder[ "status" ]            = $aStatusCodes[ $order->status ];
        $aNewOrder[ "date_ordered" ]      = $order->date_ordered;
        $aNewOrder[ "date_submitted" ]    = $order->date_submitted;
        $aNewOrder[ "notes" ]             = $order->notes;
        $aNewOrder[ "value" ]             = $employeeName;
        $aEmployee[ $iKey ][ "others" ][] = $aNewOrder;
        continue;
    }
    
    $aCheckDuplicate[ count( $aEmployee ) ] = strtolower( $employeeName );
    
    $aNewOrder                     = array();
    $aNewOrder[ "order_id" ]       = $order->specialordersId;
    $aNewOrder[ "status" ]         = $aStatusCodes[ $order->status ];
    $aNewOrder[ "date_ordered" ]   = $order->date_ordered;
    $aNewOrder[ "date_submitted" ] = $order->date_submitted;
    $aNewOrder[ "notes" ]          = $order->notes;
    $aNewOrder[ "value" ]          = $employeeName;
    $aNewOrder[ "others" ]         = array();
    $aEmployee[]                   = $aNewOrder;
}

echo json_encode( array_merge( $aCustomer, $aEmployee ) );

?>