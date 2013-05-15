<?php
/*
*  Recieve changes from Admin table. Store in DB
*
*  On status update, if status is above 6,
*  deletes CVC number, exp date, and all but last 4 of credit card number
*
*  Status code 9 triggers an email alerting to backorder status to store GM and sales Manager
*
*/
include_once('configuration.php');
include_once('objects/class.database.php');
include_once('objects/class.specialorders.php');
include_once("statusCodes.inc.php");
include_once('utilities.php');

if ( $_SESSION["isAdminLogged"] !== true && $_SESSION["isWarehouseLogged"] !== TRUE && $_SESSION["isStoreLogged"] !== TRUE ) {
    return;
}

$connection = Database::Connect();
$order = new specialOrders();

$sqlQuery = "UPDATE specialorders SET " . $_POST["id"] . " = \"";

/* Damn you POG! */
if($_POST["id"] == "date_submitted")
{
   $sqlQuery .= mysql_real_escape_string($_POST["value"]);
}
elseif($_POST["id"] == "date_ordered")
{
   $sqlQuery .= mysql_real_escape_string($_POST["value"]);
}
else
{
   $sqlQuery .= $order->Escape($_POST["value"]);
}

$sqlQuery .= "\" WHERE specialordersid = " . $_POST["row_id"] . ";";
$retval = Database::InsertOrUpdate($sqlQuery, $connection);

if($_POST["id"] == "status") {
   
   /* IF status = 9 send email to store GM and Sales Manager notifying that order has been updated with backorder status */
   if($_POST["value"] = "9")
   {
        /* Notification email headers */
        $recipients = '';
        $subject    = '';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/plain;charset=iso-8859-1" . "\r\n";
        $headers .= 'From: Mikes Bikes Special Orders System <donotreply@mikesbikes.com>' . "\r\n";
        $backOrder = $order->Get($_POST["row_id"]);
        $subject = "Backorder notice for Special Order #".$_POST["row_id"];
        $emailContent = parseEmailTemplate($aEmailListBackorder[0]["template"], $backOrder);
        foreach($aEmailListBackorder as $email) {
            $recipients .= $email['name']." <".$email['email_address'].">,". PHP_EOL;
        }
        mail($recipients, $subject, $emailContent, $headers);
   }
   /* sanitize credit card data if status is 7 OR 8 */
   if($_POST["value"] = "7" || "8")
   {
      /* get the order details */
      //$thisOrder = $order->Get($_POST["row_id"]);
      /* sanitize the credit card number */
      //sanitizeCC( $_POST["row_id"], $thisOrder["cust_cc_num"] );
   }
   
}

/* Convert code status id to code status description */
if($_POST["id"] == "status") {
   include_once("statusCodes.inc.php");
   $_POST["value"] = $aStatusCodes[$_POST["value"]];
}

/* This will be displayed inside the editable textbox */
if($retval === false)
{
   echo "Error! Value not updated";
}
else
{
   echo $_POST["value"];
}

?>
