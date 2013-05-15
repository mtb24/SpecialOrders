<?php

session_start();

$authFilename = "var/login_auth.ini.php";

/*
 * Reset the login status 
 */
$isAdminLogged = ($_SESSION["isAdminLogged"] == TRUE);
$isWarehouseLogged = ($_SESSION["isWarehouseLogged"] == TRUE);
$isStoreLogged = ($_SESSION["isStoreLogged"] == TRUE);

$_SESSION["isAdminLogged"] = FALSE;
$_SESSION["isWarehouseLogged"] = FALSE;
$_SESSION["isStoreLogged"] = FALSE;

if(isset($_GET["logout"])) {
   /* Redirects to the home page */
   header("Location: index.php");
   return;
}

if(isset($_GET["change_pwd"]) && !$isAdminLogged) {
   /* Hacking attempt */
   header("Location: index.php");
   return;
}


$store = array("username" => "mod", "password" => md5("mod1964"));
$warehouse = array("username" => "mike", "password" => md5("shiv64"));
$root = array("username" => "headlands", "password" => md5("mbfy2013"));

if(isset($_GET["login"])) {
   if(file_exists($authFilename)) {
      $iniParse = parse_ini_file($authFilename);
   }
   else {
      //$iniParse = array("username" => "admin", "password" => md5("admin"));
   }

   /* Check login credentials */
   if( $store["username"] == $_POST["dialog-username"] && $store["password"] == md5($_POST["dialog-password"]) ) {
      $_SESSION["isStoreLogged"] = TRUE;
   } elseif ( $warehouse["username"] == $_POST["dialog-username"] && $warehouse["password"] == md5($_POST["dialog-password"]) ) {
      $_SESSION["isWarehouseLogged"] = TRUE;
   } elseif ( $root["username"] == $_POST["dialog-username"] && $root["password"] == md5($_POST["dialog-password"]) ) {
      $_SESSION["isAdminLogged"] = TRUE;
   } 
}
/*
elseif(isset($_GET["change_pwd"]) && $isLogged) {
   $iniParse["username"] = "admin";
   $iniParse["password"] = md5($_POST["dialog-new_password"]);
   write_ini_file($iniParse, $authFilename);
   $_SESSION["isAdminLogged"] = true;
}
*/

/* Redirects to the home page */
header("Location: index.php");





/* Write ini facility */
function write_ini_file($assoc_arr, $path, $has_sections=FALSE) { 
   $content = ""; 
   if ($has_sections) { 
      foreach ($assoc_arr as $key=>$elem) { 
         $content .= "[".$key."]\n"; 
         foreach ($elem as $key2=>$elem2) { 
            if(is_array($elem2)) 
            { 
               for($i=0;$i<count($elem2);$i++) 
               { 
                  $content .= $key2."[] = \"".$elem2[$i]."\"\n"; 
               } 
            } 
            else if($elem2=="") $content .= $key2." = \n"; 
            else $content .= $key2." = \"".$elem2."\"\n"; 
         } 
      } 
   } 
   else { 
      foreach ($assoc_arr as $key=>$elem) { 
         if(is_array($elem)) 
         { 
            for($i=0;$i<count($elem);$i++) 
            { 
               $content .= $key."[] = \"".$elem[$i]."\"\n"; 
            } 
         } 
         else if($elem=="") $content .= $key." = \n"; 
         else $content .= $key." = \"".$elem."\"\n"; 
      } 
   } 

   file_put_contents($path, $content);
   return true; 
}
?>
