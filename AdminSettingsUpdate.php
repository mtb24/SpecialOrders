
<?php
/*
 *  If 'action' isset, perform INSERT or DELETE actions, else do table edit actions
 *
 */
include_once( 'configuration.php' );

if ( $_SESSION[ "isAdminLogged" ] !== true )
    return;

$con = mysql_connect( $configuration[ 'host' ], $configuration[ 'user' ], $configuration[ 'pass' ] ) or die( mysql_error() );
$db = mysql_select_db( $configuration[ 'db' ], $con ) or die( mysql_error() );

if ( isset( $_POST[ 'action' ] ) )
{
    switch ( $_POST[ 'action' ] )
    {
        case "add_status_code":
            $sql = 'INSERT INTO status_codes (status_text) VALUES ("' . $_POST[ "status_text" ] . '");';
            if ( mysql_query( $sql ) )
            {
                $aStatusCodes[ "id" ]          = mysql_insert_id();
                $aStatusCodes[ "status_text" ] = $_POST[ "status_text" ];
                echo json_encode( $aStatusCodes );
            }
            else
            {
                echo "Error! status text not inserted\n$sql";
            }
            break;
        /************** NOT WORKING ****************/
        case "delete_status_code":
            $sql = 'DELETE FROM status_codes WHERE id = ' . $_POST[ "id" ] . ';';
            if ( mysql_query( $sql ) )
            {
                $aStatusCodes[ "id" ] = $_POST[ "id" ];
                echo json_encode( $aStatusCodes );
            }
            else
            {
                echo "false";
            }
            break;
        case "add_store":
            $sql = 'INSERT INTO stores (id, store_name) VALUES ("", "' . mysql_escape_string( $_POST[ "store_name" ] ) . '");';
            if ( mysql_query( $sql ) )
            {
                $aStores[ "id" ]         = mysql_insert_id();
                $aStores[ "store_name" ] = $_POST[ 'store_name' ];
                echo json_encode( $aStores );
            }
            else
            {
                echo "Error! store name not inserted";
            }
            break;
        case "delete_store":
            $sql = 'DELETE FROM stores WHERE id = ' . $_POST[ "id" ] . ';';
            if ( mysql_query( $sql ) )
            {
                $aStores[ "id" ] = $_POST[ "id" ];
                echo json_encode( $aStores );
            }
            else
            {
                echo "false";
            }
            break;
        /************** NOT WORKING ****************/
        case "add_email_recipient":
            $sql = 'INSERT INTO email_recipients (store_code, name, email_address, notice_type, template)
                          VALUES ("",
                                  "' . mysql_escape_string( $_POST[ "store_code" ] ) . '",
                                  "' . mysql_escape_string( $_POST[ "name" ] ) . '",
                                  "' . mysql_escape_string( $_POST[ "email_address" ] ) . '",
                                  "' . mysql_escape_string( $_POST[ "notice_type" ] ) . '", 
                                  "' . mysql_escape_string( $_POST[ "template" ] ) . '"
                                  );';
            //echo "SQL: $sql";
            if ( mysql_query( $sql ) )
            {
                $aEmailRecipients[ 'id' ]            = mysql_insert_id();
                $aEmailRecipients[ 'store_code' ]    = $_POST[ 'store_code' ];
                $aEmailRecipients[ 'name' ]          = $_POST[ 'name' ];
                $aEmailRecipients[ 'email_address' ] = $_POST[ 'email_address' ];
                $aEmailRecipients[ 'notice_type' ]   = $_POST[ "notice_type" ];
                $aEmailRecipients[ 'template' ]      = $_POST[ 'template' ];
                echo json_encode( $aEmailRecipients );
            }
            else
            {
                echo "Error! email recipient not inserted";
            }
            break;
        case "delete_email_recipient":
            $sql = 'DELETE FROM email_recipients WHERE id = ' . $_POST[ "id" ] . ';';
            if ( mysql_query( $sql ) )
            {
                $aEmailRecipients[ "id" ] = $_POST[ "id" ];
                echo json_encode( $aEmailRecipients );
            }
            else
            {
                echo "false";
            }
            break;
    }
}
else
{
    $sqlQuery = "UPDATE " . $_POST[ 'table' ] . " SET " . $_POST[ 'field' ] . " = \"";
    $sqlQuery .= ( $_POST[ "value" ] );
    $sqlQuery .= "\" WHERE id = " . $_POST[ 'id' ] . ";";
    $retval = mysql_query( $sqlQuery );
    
    
    /* This will be displayed inside the editable textbox */
    if ( $retval === false )
        echo "Error! Value not updated";
    else
        echo $_POST[ "value" ];
}
?>
