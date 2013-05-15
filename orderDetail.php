
<?php
/**********************************************
 * Takes order 'id' parameter and returns JSON array
 *
 *********************************************/
include_once( 'utilities.php' );
include_once( 'configuration.php' );
include_once( 'objects/class.database.php' );
include_once( 'objects/class.specialorders.php' );

$order = new specialOrders();

$orderDetail = $order->Get( $_GET[ 'id' ] );

$output = '{ ';

$output .= '"id":"' . $_GET[ "id" ] . '",';
$output .= '"cust_name_first":"' . my_escape( $orderDetail->cust_name_first ) . '",';
$output .= '"cust_name_last":"' . my_escape( $orderDetail->cust_name_last ) . '",';
$output .= '"email":"' . my_escape( $orderDetail->cust_email ) . '",';
$output .= '"phone":"' . my_escape( $order->cust_day_phone ) . '",';
$output .= '"billing_street":"' . my_escape( $order->billing_street ) . '",';
$output .= '"billing_city":"' . my_escape( $order->billing_city ) . '",';
$output .= '"billing_state":"' . my_escape( $order->billing_state ) . '",';
$output .= '"billing_zip":"' . my_escape( $order->billing_zip ) . '",';
$output .= '"shipping_street":"' . my_escape( $order->shipping_street ) . '",';
$output .= '"shipping_city":"' . my_escape( $order->shipping_city ) . '",';
$output .= '"shipping_state":"' . my_escape( $order->shipping_state ) . '",';
$output .= '"shipping_zip":"' . my_escape( $order->shipping_zip ) . '",';
$output .= '"store":"' . $order->store . '",';
$output .= '"employee":"' . my_escape( $order->employee_name ) . '",';
$output .= '"item_1_rpro_num":"' . my_escape( $order->item_1_rpro_num ) . '",';
$output .= '"item_1_dept":"' . my_escape( $order->item_1_dept ) . '",';
$output .= '"item_1_vend":"' . my_escape( $order->item_1_vend ) . '",';
$output .= '"item_1_manu_part_num":"' . my_escape( $order->item_1_manu_part_num ) . '",';
$output .= '"item_1_desc":"' . my_escape( $order->item_1_desc ) . '",';
$output .= '"item_1_size":"' . my_escape( $order->item_1_size ) . '",';
$output .= '"item_1_attr":"' . my_escape( $order->item_1_attr ) . '",';
$output .= '"item_1_price":"' . $order->item_1_price . '",';
$output .= '"item_1_qty":"' . $order->item_1_qty . '",';
$output .= '"item_1_total":"' . $order->item_1_total . '",';
$output .= '"item_2_rpro_num":"' . my_escape( $order->item_2_rpro_num ) . '",';
$output .= '"item_2_dept":"' . my_escape( $order->item_2_dept ) . '",';
$output .= '"item_2_vend":"' . my_escape( $order->item_2_vend ) . '",';
$output .= '"item_2_manu_part_num":"' . my_escape( $order->item_2_manu_part_num ) . '",';
$output .= '"item_2_desc":"' . my_escape( $order->item_2_desc ) . '",';
$output .= '"item_2_size":"' . my_escape( $order->item_2_size ) . '",';
$output .= '"item_2_attr":"' . my_escape( $order->item_2_attr ) . '",';
$output .= '"item_2_price":"' . $order->item_2_price . '",';
$output .= '"item_2_qty":"' . $order->item_2_qty . '",';
$output .= '"item_2_total":"' . $order->item_2_total . '",';
$output .= '"item_3_rpro_num":"' . my_escape( $order->item_3_rpro_num ) . '",';
$output .= '"item_3_dept":"' . my_escape( $order->item_3_dept ) . '",';
$output .= '"item_3_vend":"' . my_escape( $order->item_3_vend ) . '",';
$output .= '"item_3_manu_part_num":"' . my_escape( $order->item_3_manu_part_num ) . '",';
$output .= '"item_3_desc":"' . my_escape( $order->item_3_desc ) . '",';
$output .= '"item_3_size":"' . my_escape( $order->item_3_size ) . '",';
$output .= '"item_3_attr":"' . my_escape( $order->item_3_attr ) . '",';
$output .= '"item_3_price":"' . $order->item_3_price . '",';
$output .= '"item_3_qty":"' . $order->item_3_qty . '",';
$output .= '"item_3_total":"' . $order->item_3_total . '",';
$output .= '"item_4_rpro_num":"' . my_escape( $order->item_4_rpro_num ) . '",';
$output .= '"item_4_dept":"' . my_escape( $order->item_4_dept ) . '",';
$output .= '"item_4_vend":"' . my_escape( $order->item_4_vend ) . '",';
$output .= '"item_4_manu_part_num":"' . my_escape( $order->item_4_manu_part_num ) . '",';
$output .= '"item_4_desc":"' . my_escape( $order->item_4_desc ) . '",';
$output .= '"item_4_size":"' . my_escape( $order->item_4_size ) . '",';
$output .= '"item_4_attr":"' . my_escape( $order->item_4_attr ) . '",';
$output .= '"item_4_price":"' . $order->item_4_price . '",';
$output .= '"item_4_qty":"' . $order->item_4_qty . '",';
$output .= '"item_4_total":"' . $order->item_4_total . '",';
$output .= '"item_5_rpro_num":"' . my_escape( $order->item_5_rpro_num ) . '",';
$output .= '"item_5_dept":"' . my_escape( $order->item_5_dept ) . '",';
$output .= '"item_5_vend":"' . my_escape( $order->item_5_vend ) . '",';
$output .= '"item_5_manu_part_num":"' . my_escape( $order->item_5_manu_part_num ) . '",';
$output .= '"item_5_desc":"' . my_escape( $order->item_5_desc ) . '",';
$output .= '"item_5_size":"' . my_escape( $order->item_5_size ) . '",';
$output .= '"item_5_attr":"' . my_escape( $order->item_5_attr ) . '",';
$output .= '"item_5_price":"' . $order->item_5_price . '",';
$output .= '"item_5_qty":"' . $order->item_5_qty . '",';
$output .= '"item_5_total":"' . $order->item_5_total . '",';
$output .= '"ship_type":"' . $order->ship_type . '",';
$output .= '"shipping_charge":"' . $order->shipping_charge . '",';
$output .= '"tax":"' . $order->tax . '",';
$output .= '"total":"' . $order->total . '",';
$output .= '"cust_cc_num":"' . $order->cust_cc_num . '",';
$output .= '"cust_cc_exp":"' . $order->cust_cc_exp . '",';
$output .= '"cust_cc_cvc":"' . $order->cust_cc_cvc . '",';
$output .= '"cust_cc_type":"' . $order->cust_cc_type . '",';
$output .= '"receipt_number":"' . $order->receipt_number . '",';
$output .= '"RA_number":"' . $order->RA_number . '",';
$output .= '"comments":"' . my_escape( $order->comments ) . '"';

$output .= ' }';

echo $output;
?>
