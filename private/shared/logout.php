<?php 
session_start();
session_destroy();
header("location:"."/chms_for_eotc/guest");
?>