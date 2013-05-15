<?php
/*
 * Here is created the $aStores array.
 *
 * This file is used by special-order-form.php
 */
$con = mysql_connect( $configuration[ 'host' ], $configuration[ 'user' ], $configuration[ 'pass' ] ) or die( mysql_error() );
$db = mysql_select_db( $configuration[ 'db' ], $con ) or die( mysql_error() );
$query  = "select * from stores;";
$result = mysql_query( $query );

$aStores = array();
if ( $result !== false )
{
    while ( $codes = mysql_fetch_assoc( $result ) )
    {
        $aStores[] = $codes;
    }
    mysql_free_result( $result );
}
mysql_close( $con );

?>