<?php
/*
  Recieve data from Special Order Request form. Store in DB
  Generate emails with recipients based on order status
*/
error_reporting( 0 );
include_once 'configuration.php';
include_once 'objects/class.database.php';
include_once 'objects/class.specialorders.php';
include_once 'utilities.php';

/* Set timezone for date() */
date_default_timezone_set( 'America/Los_Angeles' );

$order = new specialOrders();

/*  Read form submission  */
$order->cust_name_first = my_escape( $_POST['cust_name_first'] );
$order->cust_name_last  = my_escape( $_POST['cust_name_last'] );
$order->date_submitted  = date( "Y-m-d" );
$order->cust_email      = my_escape( $_POST['cust_email'] );
$order->cust_day_phone  = my_escape( $_POST['cust_day_phone'] );
$order->billing_street  = my_escape( $_POST['billing_street'] );
$order->billing_city    = my_escape( $_POST['billing_city'] );
$order->billing_state   = my_escape( $_POST['billing_state'] );
$order->billing_zip     = my_escape( $_POST['billing_zip'] );
$order->shipping_street = my_escape( $_POST['shipping_street'] );
$order->shipping_city   = my_escape( $_POST['shipping_city'] );
$order->shipping_state  = my_escape( $_POST['shipping_state'] );
$order->shipping_zip    = my_escape( $_POST['shipping_zip'] );
$order->store           = $_POST['store'];
$order->employee_name   = my_escape( $_POST['employee_name'] );
$order->new_bike_order  = my_escape( $_POST['new_bike_order'] );
$order->item_1_rpro_num = my_escape( $_POST['item_1_rpro_num'] );
$order->item_1_dept     = my_escape( $_POST['item_1_dept'] );
$order->item_1_vend     = my_escape( $_POST['item_1_vend'] );
$order->item_1_manu_part_num = my_escape( $_POST['item_1_manu_part_num'] );
$order->item_1_desc     = my_escape( $_POST['item_1_desc'] );
$order->item_1_size     = my_escape( $_POST['item_1_size'] );
$order->item_1_attr     = my_escape( $_POST['item_1_attr'] );
$order->item_1_price    = $_POST['item_1_price'];
$order->item_1_qty      = $_POST['item_1_qty'];
$order->item_1_total    = $_POST['item_1_total'];
$order->item_2_rpro_num = my_escape( $_POST['item_2_rpro_num'] );
$order->item_2_dept     = my_escape( $_POST['item_2_dept'] );
$order->item_2_vend     = my_escape( $_POST['item_2_vend'] );
$order->item_2_manu_part_num = my_escape( $_POST['item_2_manu_part_num'] );
$order->item_2_desc     = my_escape( $_POST['item_2_desc'] );
$order->item_2_size     = my_escape( $_POST['item_2_size'] );
$order->item_2_attr     = my_escape( $_POST['item_2_attr'] );
$order->item_2_price    = $_POST['item_2_price'];
$order->item_2_qty      = $_POST['item_2_qty'];
$order->item_2_total    = $_POST['item_2_total'];
$order->item_3_rpro_num = my_escape( $_POST['item_3_rpro_num'] );
$order->item_3_dept     = my_escape( $_POST['item_3_dept'] );
$order->item_3_vend     = my_escape( $_POST['item_3_vend'] );
$order->item_3_manu_part_num = my_escape( $_POST['item_3_manu_part_num'] );
$order->item_3_desc     = my_escape( $_POST['item_3_desc'] );
$order->item_3_size     = my_escape( $_POST['item_3_size'] );
$order->item_3_attr     = my_escape( $_POST['item_3_attr'] );
$order->item_3_price    = $_POST['item_3_price'];
$order->item_3_qty      = $_POST['item_3_qty'];
$order->item_3_total    = $_POST['item_3_total'];
$order->item_4_rpro_num = my_escape( $_POST['item_4_rpro_num'] );
$order->item_4_dept     = my_escape( $_POST['item_4_dept'] );
$order->item_4_vend     = my_escape( $_POST['item_4_vend'] );
$order->item_4_manu_part_num = my_escape( $_POST['item_4_manu_part_num'] );
$order->item_4_desc     = my_escape( $_POST['item_4_desc'] );
$order->item_4_size     = my_escape( $_POST['item_4_size'] );
$order->item_4_attr     = my_escape( $_POST['item_4_attr'] );
$order->item_4_price    = $_POST['item_4_price'];
$order->item_4_qty      = $_POST['item_4_qty'];
$order->item_4_total    = $_POST['item_4_total'];
$order->item_5_rpro_num = my_escape( $_POST['item_5_rpro_num'] );
$order->item_5_dept     = my_escape( $_POST['item_5_dept'] );
$order->item_5_vend     = my_escape( $_POST['item_5_vend'] );
$order->item_5_manu_part_num = my_escape( $_POST['item_5_manu_part_num'] );
$order->item_5_desc     = my_escape( $_POST['item_5_desc'] );
$order->item_5_size     = my_escape( $_POST['item_5_size'] );
$order->item_5_attr     = my_escape( $_POST['item_5_attr'] );
$order->item_5_price    = $_POST['item_5_price'];
$order->item_5_qty      = $_POST['item_5_qty'];
$order->item_5_total    = $_POST['item_5_total'];
$order->ship_type       = $_POST['ship_type'];
$order->shipping_charge = ( $_POST['shipping_charge'] );
$order->tax             = ( $_POST['tax'] );
$order->total           = ( $_POST['total'] );
$order->cust_cc_num     = my_escape( $_POST['cust_cc_num'] );
$order->cust_cc_exp     = my_escape( $_POST['cust_cc_exp'] );
$order->cust_cc_cvc     = my_escape( $_POST['cust_cc_cvc'] );
$order->cust_cc_type    = my_escape( $_POST['cust_cc_type'] );
$order->receipt_number  = my_escape( $_POST['receipt_number'] );
$order->RA_number       = my_escape( $_POST['RA_number'] );
$order->comments        = my_escape( $_POST['comments'] );
$order_type             = $_POST['orderType'];

/* set order status for email notifications */
/*
  if ( $_POST['orderType'] == "bike" ) {
    $order->status = 2;
    $bike_order = true;
} else if ( $_POST['orderType'] == "PA" ) {
        $order->status = 1;
        $bike_order = false;
} else if ( $_POST['orderType'] == "warranty" ) {
        $order->status = 10;
        $bike_order = false;
        $warranty = true;
} else if ( $_POST['orderType'] == "crash" ) {
        $order->status = 10;
        $bike_order = false;
        $warranty = false;
        $crash = true;
}
*/
switch( $order_type )
{
    case "bike":
            $order->status = 2;
            $bike_order = TRUE;
            break;

    case "PA":
            $order->status = 1;
            $bike_order = FALSE;
            break;

    case "warranty":
            $order->status = 10;
            $bike_order = FALSE;
            $warranty = TRUE;
            $crash = FALSE;
            break;

    case "crash":
            $order->status = 2;
            $bike_order = FALSE;
            $warranty = FALSE;
            $crash = TRUE;
            break;
    
    default:
        $order->status = 1;
        $bike_order = FALSE;
        $warranty = FALSE;
        $crash = FALSE;
}

/* If order saves successfully, capture order ID to include in email */
$resultID = $order->Save();

if ( $resultID ) {
    include_once "emailAddress.inc.php";
    
    /* Build and send email notifications EXCEPT for backorders which is done in orderAdminUpdate.php */
    $recipientList = '';
    $emailSubject    = '';
    $emailHeaders = "MIME-Version: 1.0" . "\r\n";
    $emailHeaders .= "Content-type:text/plain;charset=iso-8859-1" . "\r\n";
    $emailHeaders .= 'From: Mikes Bikes Special Orders System <donotreply@mikesbikes.com>' . "\r\n";

    switch( $order_type )
    {
        case "bike":
                /* email for new bike orders */
                $emailSubject = "New Bike Order #".$resultID;
                $emailContent = parseEmailTemplate( $aEmailListBikes[0]["template"], $order );
                foreach ( $aEmailListBikes as $email ) {
                    $recipientList .= $email['name']." <".$email['email_address'].">,". PHP_EOL;
                }
                mail( $recipientList, $emailSubject, $emailContent, $emailHeaders );
                break;

        case "PA":
                /* email for parts and accessory orders */
                $emailSubject = "New Special Order #".$resultID;
                $emailContent = parseEmailTemplate( $aEmailListAll[0]["template"], $order );
                foreach ( $aEmailListAll as $email ) {
                    $recipientList .= $email['name']." <".$email['email_address'].">,". PHP_EOL;
                }
                mail( $recipientList, $emailSubject, $emailContent, $emailHeaders );
                break;

        case "warranty":
                /* email for warranty orders */
                $emailSubject = "New Warranty Special Order #".$resultID;
                $emailContent = parseEmailTemplate( $aEmailListWarranty[0]["template"], $order );
                foreach ( $aEmailListWarranty as $email ) {
                    $recipientList .= $email['name']." <".$email['email_address'].">,". PHP_EOL;
                }
                mail( $recipientList, $emailSubject, $emailContent, $emailHeaders );
                break;

        case "crash":
                /* email for crash replacement orders */
                $emailSubject = "New Crash Replacement Special Order #".$resultID;
                $emailContent = parseEmailTemplate( $aEmailListCrash[0]["template"], $order );
                foreach ( $aEmailListCrash as $email ) {
                    $recipientList .= $email['name']." <".$email['email_address'].">,". PHP_EOL;
                }
                mail( $recipientList, $emailSubject, $emailContent, $emailHeaders );
                break;
    }

    /* send the customer an email with Order # and phone number */
    /*
    $to = $order->cust_email;
    $emailSubject = "Thanks for your order with Mike's Bikes";
    $emailContent = parseEmailTemplate("customer_email.tpl", $order);
    mail($to, $emailSubject, $emailContent, $emailHeaders);
    */

    // send status back to browser
    echo '<div id="message-success" class="message message-success">
            <div class="image"><img src="resources/images/icons/success.png" alt="Success" height="32" /></div>
            <div class="text">
              <span style="font-size:1.2em;">
                  Order <strong>#'.$resultID.'</strong> saved successfully for: <strong>'.$order->cust_name_first.' '.$order->cust_name_last.'</strong>
              </span>
            </div>
            <div class="dismiss"><a href="#message-success"></a></div>
          </div>';

} else { // Order didn't save

    /* send error message to browser */
    echo '<div id="message-error" class="message message-error">
            <div class="image"><img src="resources/images/icons/error.png" alt="Error" height="32" /></div>
            <div class="text">
              <h6>Error!</h6>
              <span>Something went wrong, couldn\'t save order: ' . mysql_error() . '</span>
            </div>
            <div class="dismiss"><a href="#message-error"></a></div>
          </div>';
}

?>
