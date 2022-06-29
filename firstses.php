<?php
if(!isset($_SESSION))
{
    session_start();
}
$pass=urldecode($_GET['p']);
if($pass=="TCWD"){
    $_SESSION['pass_correct']=1;
}
if(isset($_SESSION['pass_correct']))
{
    echo "you entered the correct password";
    echo $_SESSION['user'];
}
else
{
    echo "you dont have password";
}

?>