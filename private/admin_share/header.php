<?php
if($_SESSION['role']!=2)
{
    header("location:"."/chms_for_eotc/guest/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>home page</title>
        <link rel="stylesheet"  href="<?php echo PRI_ROOT.'private/admin_share/admin.css'?>">      

    </head>

    <body>
        <header>
                <div class="profile_img">
                    <img src="<?php echo PRI_ROOT.'private/shared/loginavatar.png'?>" alt="profile image" class="profile">
                </div>

                <div class="outer">    
                    <div class="o">
                        <ul> request
                                <div class="i">
                                    <li><a href="<?php echo PRI_ROOT.'private/admin/comments.php'?>" class="">commets</a></li>
                                    <li><a href="<?php echo PRI_ROOT.'private/admin/employees.php';?>" class="">employees</a></li>
                                 </div>
                        </ul>
                    </div>
                    <ul>
                    <li><a href="<?php echo PRI_ROOT.'private/admin/members.php';?>" class="">members</a></li>  
                                   
                    </ul>
                    <ul>
                    <li><a href="<?php echo PRI_ROOT.'private/admin/group.php';?>" class="">groups</a></li>  
                                   
                    </ul>
                    
                    <ul>
                        <li><a href="<?php echo PRI_ROOT.'private/admin/post.php';?>" class="">post</a></li>
                    </ul>

                    <ul>
                    <li><a href="<?php echo PRI_ROOT.'private/admin/report.php';?>" class="">report</a></li>
                    </ul>

                    <ul>
                        <li><a href="<?php echo PRI_ROOT.'private/admin/suppletter.php';?>" class="">supportive letter</a></li>
                    </ul>

                    <div class="o1">
                        <ul> view
                                <div class="i">
                                    <li><a href="<?php echo PRI_ROOT.'private/admin/assgnConf.php';?>" class="">confession father</a></li>
                                    <li><a href="<?php echo PRI_ROOT.'private/admin/holly_water_req.php';?>" class="">holy water</a></li>
                                    <li><a href="<?php echo PRI_ROOT.'private/admin/memorial.php';?>" class="">memorial</a></li>
                                    <li><a href="<?php echo PRI_ROOT.'private/admin/leaving.php';?>" class="">leaving</a></li>
                                
                                </div>
                        </ul>
                
                    </div>

                    <ul>
                        <li><a href="<?php echo PRI_ROOT.'private/shared/logout.php';?>" class="">logout</a></li>
                    </ul>
            </div>
    </header>
