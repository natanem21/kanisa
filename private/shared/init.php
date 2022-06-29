<?php
session_start();
require_once("database.php");


ob_start();//output beffering is on
define("_shared",dirname(__FILE__));//chms_for_eotc\private\shared
define("_private",dirname(_shared));//chms_for_eotc\private

define("main",dirname(_private));//chms_for_eotc
define("_public",main."\public");//chms_for_eotc\public

$pub = strpos($_SERVER['SCRIPT_NAME'],'/public')+1;
$doc= substr($_SERVER['SCRIPT_NAME'],0,$pub);
define("WWW_ROOT",$doc);



$pri = strpos($_SERVER['SCRIPT_NAME'],'/private')+1;
$doc1= substr($_SERVER['SCRIPT_NAME'],0,$pri);
define("PRI_ROOT",$doc1);
function is_post_req()
{
    return $_SERVER['REQUEST_METHOD']=='POST';
}

if(!isset($_SESSION['user']))
{
    header("location:"."/chms_for_eotc/guest/login.php");
}
else{
  
}

?>