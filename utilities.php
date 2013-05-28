<?php
/**********************************************
* Various utility functions
*
*/

/* array of characters to remove, since just escaping in PHP will confuse javascript later */
function my_escape($str)
{
        $search  = array("\\\\'", '\\\\"', "\\\\", "\\\'", "\\'", '\\\"' , "\n" , "\r" , ";" , "," , '"' , '.' , '      ', '\t', '%09', '%0A', '%3B' );
        $replace = array(""     , ''     , "/"   , ""    , ""   , 'in'   , "%0A", ""   , ""  , ""  , 'in', ''  , ''      , ''  , ''   , ''   , '');
        return str_replace($search,$replace,$str);
}


/* Sanitizes credit card and CVC numbers by replacing with X's */
/*
 */
function sanitizeCC( $id, $ccNumber )
{
   $sanitized_cc_num = preg_replace('/(?!^.?)[0-9](?!(.){0,3}$)/', 'X', "$ccNumber");
   $cvcNum = "XXX";
   $cc_exp_date = "XX/XX";
   $query = "UPDATE `specialorders` SET `cust_cc_num` = 'XXXX-XXXX-XXXX-XXXX',  `cust_cc_exp` = 'XX/XX', `cust_cc_cvc` = '' WHERE `specialordersid` = ".$id;
   $querySQL  = "UPDATE `specialorders` SET `cust_cc_num` = '".$sanitized_cc_num."', `cust_cc_cvc` = '".$cvcNum."', `cust_cc_exp` = '".$cc_exp_date."' WHERE `specialordersid` = ".$id;
   $retval = Database::InsertOrUpdate($querySQL,$connection);
   if($retval){return true;} else {return false;}
}
    
/* reads in email template file and fills in order details */
function parseEmailTemplate($tplFilename, $order)
{
   /* fetch the template content */
   $tplContent = file_get_contents("var/template/".$tplFilename);

   /* parse it and substitute the marker with the field value */
   preg_match_all("/%([^%]*)%/", $tplContent, $aMatches);
   for($x = 0; $x < count($aMatches[0]); $x++)
   {
      $tplContent = str_replace($aMatches[0][$x], $order->$aMatches[1][$x], $tplContent);
   }
   /* add order ID */
   $tplContent = str_replace('%specialordersId%', $resultID, $tplContent);

   return $tplContent;
}

/* Sanitizes credit card numbers and changes order status
 *
 *
 */
function archiveOrders($days, $status)
{
        $sql = "UPDATE `specialorders` ";
        $sql .= "`cust_cc_num`='XXXX-XXXX-XXXX-XXXX', ";
        $sql .= "`cust_cc_exp`='XX/XX', ";
        $sql .= "`cust_cc_cvc`='', ";
        $sql .= "`status`='".$status."' ";
        $sql .= "WHERE `date_submitted` < DATE(NOW()-INTERVAL ".$days." DAY)";
        
        return Database::InsertOrUpdate($sql,$connection);
}

?>