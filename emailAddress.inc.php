<?php
/*
 * Here is created the $aEmailListBikes, $aEmailListAll, $aEmailListBackorder, $aEmailListWarranty, and aEmailListCrash arrays.
 *
 * This file is used by specialOrders.php
 *
 * REQUIRES configuration.php (usually already included)
 */
$con = mysql_connect( $configuration[ 'host' ], $configuration[ 'user' ], $configuration[ 'pass' ] ) or die( mysql_error() );
$db = mysql_select_db( $configuration[ 'db' ], $con ) or die( mysql_error() );

/* get email list for normal orders */
$query         = "select * from email_recipients where notice_type = '0';";
$result        = mysql_query( $query );
$aEmailListAll = array();
if ( $result !== false )
{
    while ( $codes = mysql_fetch_assoc( $result ) )
    {
        $aEmailListAll[] = $codes;
    }
    mysql_free_result( $result );
}

/* get new bike list */
$query           = "select * from email_recipients where notice_type = '1';";
$result          = mysql_query( $query );
$aEmailListBikes = array();
if ( $result !== false )
{
    while ( $codes = mysql_fetch_assoc( $result ) )
    {
        $aEmailListBikes[] = $codes;
    }
    mysql_free_result( $result );
}

/* get backordered list */
$query               = "select * from email_recipients where notice_type = '2';";
$result              = mysql_query( $query );
$aEmailListBackorder = array();
if ( $result !== false )
{
    while ( $codes = mysql_fetch_assoc( $result ) )
    {
        $aEmailListBackorder[] = $codes;
    }
    mysql_free_result( $result );
}

/* get warranty list */
$query              = "select * from email_recipients where notice_type = '3';";
$result             = mysql_query( $query );
$aEmailListWarranty = array();
if ( $result !== false )
{
    while ( $codes = mysql_fetch_assoc( $result ) )
    {
        $aEmailListWarranty[] = $codes;
    }
    mysql_free_result( $result );
}

/* get crash replacement list */
$query              = "select * from email_recipients where notice_type = '4';";
$result             = mysql_query( $query );
$aEmailListCrash = array();
if ( $result !== false )
{
    while ( $codes = mysql_fetch_assoc( $result ) )
    {
        $aEmailListCrash[] = $codes;
    }
    mysql_free_result( $result );
}

mysql_close( $con );

?>