<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

  // $x = isset($_GET['un'])?$_GET['un']:"sory try login again";//use this for php<7
    //in php 7 we can use
    $x = $_GET['un']??"sory try login again ";
    
if($x=="teacher")
{
    header("location: public/teacher");
    exit;
}
elseif($x=="member")
{
header("location:public/members");
exit;
}
elseif($x=="father")
{
    header("location:public/father");
    exit;
}
else{
    echo htmlspecialchars($x);//rendered to harmless text
}
    ?>
</body>
</html>