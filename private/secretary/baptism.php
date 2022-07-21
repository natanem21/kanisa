<?php include("../shared/init.php");?>
<?php include(_private."/sec_share/header.php");?><!DOCTYPE html>
<h1>this register new baptism</h1> 

<?php
  $baptism = new Baptism();
  $baptism->Values();
?>
<?php include(_private."/sec_share/footer.php");?>
