<?php
/**********************************************
 *  Admin Settings
 *  Change and edit various settings
 *  
 ***********************************************/

include_once( 'configuration.php' );


if ( $_SESSION[ "isAdminLogged" ] !== true )
    return;

$con = mysql_connect( $configuration[ 'host' ], $configuration[ 'user' ], $configuration[ 'pass' ] ) or die( mysql_error() );
$db = mysql_select_db( $configuration[ 'db' ], $con ) or die( mysql_error() );

$output = '';
( isset( $_REQUEST[ 'action' ] ) ) ? $action = $_REQUEST[ 'action' ] : $action = '';


switch ( $action )
{
    
    // add/edit status codes
    case "edit_status_codes":
        $sql           = "SELECT * FROM  `status_codes` ORDER BY  `status_codes`.`id` ASC LIMIT 0 , 30";
        $result        = mysql_query( $sql );
        $codeTableData = array();
        if ( $result !== false )
        {
            while ( $row = mysql_fetch_assoc( $result ) )
            {
                $codeTableData[] = $row;
            }
            mysql_free_result( $result );
        }
        $output .= '<center><table class="adminSettings">';
        $output .= '<thead>';
        $output .= '<tr><th colspan="2">Status Codes <span class="add"><a class="add" href="#">Add Status</a></span><div class="add"><br /><form id="add_status_code"><input type="hidden" name="action" value="add_status_code" /><input type="text" name="status_text" size="15" /><input type="submit" name="submit" value="Add" /></form></div></th></tr>';
        $output .= '</thead><tbody>';
        foreach ( $codeTableData as $code )
        {
            $output .= '<tr class="status_codes" id="' . $code[ 'id' ] . '"><td class="editMe" data-field="status_text">' . $code[ 'status_text' ] . '</td><td><a href="#" id="' . $code[ 'id' ] . '" class="delete_status_code"><img src="resources/images/icons/delete.png" alt="Delete this item" title="Delete this item" /></a></td></tr>';
        }
        $output .= '</tbody></table></center>';
        break;
    
    // add/edit store info
    case "edit_stores":
        $sql            = "SELECT * FROM  `stores` ORDER BY  `stores`.`id` ASC LIMIT 0 , 30";
        $result         = mysql_query( $sql );
        $storeTableData = array();
        if ( $result !== false )
        {
            while ( $row = mysql_fetch_assoc( $result ) )
            {
                $storeTableData[] = $row;
            }
            mysql_free_result( $result );
        }
        $output .= '<center><table class="adminSettings">';
        $output .= '<thead>';
        $output .= '<tr><th colspan="3">Store Info <span class="add"><a class="add" href="#">Add Store</a></span><div class="add"><br /><form id="add_store"><input type="hidden" name="action" value="add_store" /><input type="text" name="store_name" size="15" /><input type="submit" name="submit" value="Add" /></form></div></th></tr>';
        $output .= '<tr><th>Name</th><th>Tax Rate</th><th>Delete</th></tr>';
        $output .= '</thead><tbody>';
        foreach ( $storeTableData as $store )
        {
            $output .= '<tr class="stores" id="' . $store[ 'id' ] . '"><td class="editMe" data-field="store_name">' . $store[ 'store_name' ] . '</td><td class="editMe" data-field="taxRate">' . $store[ 'taxRate' ] . '</td><td><a href="#" id="' . $store[ 'id' ] . '" class="delete_store"><img src="resources/images/icons/delete.png" alt="Delete this item" title="Delete this item" /></a></td></tr>';
        }
        $output .= '</tbody></table></center>';
        break;
    
    // GET email list for new order notices
    case "edit_email_list":
        $sql            = "SELECT * FROM  `email_recipients` ORDER BY  `email_recipients`.`name` ASC LIMIT 0 , 30";
        $result         = mysql_query( $sql );
        $emailTableData = array();
        if ( $result !== false )
        {
            while ( $row = mysql_fetch_assoc( $result ) )
            {
                $emailTableData[] = $row;
            }
            mysql_free_result( $result );
        }
        //  
        $output .= '<div id="adminSettingsEmail">';
        $output .= '<div class="left"><table class="storeCodesLegend"><tr><th>StoreID</th><th>Store Name</th></tr>';
        $output .= '<tr><td>1</td><td>San Rafael</td></tr><tr><td>2</td><td>Sausalito</td></tr><tr><td>3</td><td>Berkeley</td></tr><tr><td>4</td><td>Palo Alto</td></tr><tr><td>5</td><td>San Francisco</td></tr><tr><td>6</td><td>Sacramento</td></tr><tr><td>7</td><td>Los Gatos</td></tr><tr><td>8</td><td>Petaluma</td></tr><tr><td>9</td><td>Walnut Creek</td></tr><tr><td>10</td><td>San Jose</td></tr><tr><td>11</td><td>Pleasanton</td></tr><tr><td>17</td><td>MBD</td></tr><tr><td>19</td><td>BikeSmart</td></tr><tr><td>100</td><td>Admin</td></tr></table></div>';
        $output .= '<div class="right"><span class="emailNoticeTypesLegend"><strong>Email Notice Types:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Parts - 0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bikes - 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Backordered - 2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Warranty - 3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Crash Replacement - 4</span>';
        $output .= '<table class="adminSettings wide"><form id="add_email_recipient"><input type="hidden" name="action" value="add_email_recipient" /><thead>';
        $output .= '<tr><th colspan="6">Special Orders Email List <span class="add"><a class="add" href="#">Add Person</a></span></th></tr>';
        $output .= '<tr class="add"><th><input type="text" name="store_code" size="5" placeholder="Store" value="" /></th><th><input type="text" name="name" size="14" placeholder="Name" value="" /></th><th><input type="text" name="email_address" placeholder="Email" value="" size="25" /></th><th><input type="text" name="notice_type" placeholder="Notice Type (number)" value="" size="15" /></th><th><input type="text" name="template" size="10" value="test.tpl" /></th><th><input type="submit" name="submit" value="Add" /></th></tr>';
        $output .= '<tr><th>Store Code</th><th>Name</th><th>eMail Address</th><th>Email Notice Type</th><th>eMail Template</th><th class="delete_email_recipient">&nbsp;</th></tr>';
        $output .= '</thead></form><tbody>';
        foreach ( $emailTableData as $person )
        {
            $output .= '<tr class="email_recipients" id="' . $person[ 'id' ] . '"><td class="editMe" data-field="store_code">' . $person[ 'store_code' ] . '</td><td class="editMe" data-field="name">' . $person[ 'name' ] . '</td><td class="editMe" data-field="email_address">' . $person[ 'email_address' ] . '</td><td class="editMe" data-field="notice_type">' . $person[ 'notice_type' ] . '</td><td class="editMe" data-field="template">' . $person[ 'template' ] . '</td><td><a href="#" id="' . $person[ 'id' ] . '" class="delete_email_recipient"><img src="resources/images/icons/delete.png" alt="Delete this item" title="Delete this item" /></a></td></tr>';
        }
        $output .= '</tbody></table></div></div>';
        break;
    
    // add/edit email templates
    case "edit_email_template":
        echo "Edit Email Template";
        break;
}

echo $output;

?>
