<?php
session_start();
/*  include_once('init.php');
echo $_SESSION['a'];
echo $_SESSION['user'];  */
if(!isset($_SESSION['user']))
{
    header("location:../../guest/login.php");
}
else{
  
}

?>