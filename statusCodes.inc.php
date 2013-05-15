<?php
/*
 * Here is created the $aStatusCodes array.
 * The array structure is $aStatusCodes[code_id] = "code_description".
 *
 * This file is used by orderAdmin_hiddenRow.php, orderAdminUpdate.php and statusCodes.php
 */
$con = mysql_connect( $configuration[ 'host' ], $configuration[ 'user' ], $configuration[ 'pass' ] ) or die( mysql_error() );
$db = mysql_select_db( $configuration[ 'db' ], $con ) or die( mysql_error() );
$query  = "select id, status_text from status_codes order by id;";
$result = mysql_query( $query );

$aStatusCodes = array();
if ( $result !== false )
{
    while ( $codes = mysql_fetch_assoc( $result ) )
    {
        $aStatusCodes[ $codes[ "id" ] ] = $codes[ "status_text" ];
    }
    mysql_free_result( $result );
}
mysql_close( $con );

?>