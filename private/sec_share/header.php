<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
    <link rel="stylesheet"  href="<?php echo PRI_ROOT.'private/admin_share/admin.css'?>">      

</head>
<?php
if($_SESSION['role']!=1)
{
    header("location:"."/chms_for_eotc/guest/login.php");
}
?>
<body>
    <header>
        <div class="profile_img">
            <img src="<?php echo PRI_ROOT.'private/shared/loginavatar.png'?>" alt="profile image" class="profile">
        </div>
        <div class="outer">    
            <div class="o">
            <ul> register
                    <div class="i">
                        <li><a href="<?php echo PRI_ROOT.'private/secretary/baptism.php'?>" class="">baptism</a></li>
                        <li><a href="<?php echo PRI_ROOT.'private/secretary/death.php';?>" class="">death</a></li>
                        <li><a href="<?php echo PRI_ROOT.'private/secretary/materials.php';?>" class="">materials</a></li>
                        <li><a href="<?php echo PRI_ROOT.'private/secretary/smallgroups.php';?>" class="">small groups</a></li>  
                        <li><a href="<?php echo PRI_ROOT.'private/secretary/needie.php';?>" class="">needies</a></li>
                        <li><a href="<?php echo PRI_ROOT.'private/secretary/needie.php';?>" class="">update church information</a></li>
                        
                    </div>
                </ul>
            </div>
            
            <ul>
                <li><a href="<?php echo PRI_ROOT.'private/secretary/addpay.php';?>" class="">add payments</a></li>
            </ul>

            <ul>
                <li><a href="<?php echo PRI_ROOT.'private/admin/post.php';?>" class="">post</a></li>
            </ul>

            <ul>
                <li><a href="<?php echo PRI_ROOT.'private/secretary/marriage.php';?>" class="">marriage</a></li>
            </ul>

                <div class="o1">
                <ul> view
                        <div class="i">
                            <li><a href="<?php echo PRI_ROOT.'private/secretary/invoices.php';?>" class="">total invoices</a></li>
                            <li><a href="<?php echo PRI_ROOT.'private/secretary/servicereq.php';?>" class="">service requests</a></li>
                            <li><a href="<?php echo PRI_ROOT.'private/admin/comments.php';?>" class="">comments</a></li>

                        </div>
                </ul>
                
                </div>
                <ul>
                <li><a href="<?php echo PRI_ROOT.'private/shared/logout.php';?>" class="">logout</a></li>
            </ul>
        </div>
    </header>
