<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
    <link rel="stylesheet"  href="<?php echo WWW_ROOT.'public/members/style.css'?>">      

</head>
<body>
    <header>
    <div class="profile_img">
        <?php  $sql = "SELECT `img` FROM `members` WHERE `id`='$_SESSION[id]'";
                $r = $DBC->query($sql);
                $n = $r->fetch_assoc();
              ?>
        <p>well come <?php   echo $_SESSION['user'];?></p>
        <img src="<?php echo WWW_ROOT.'guest/myFiles/'.$n['img']?>" alt="profile image" class="profile">
    </div>
    <div class="outer">    
        <div class="o">
           <ul> <a href="<?php echo WWW_ROOT.'public/members/request/req_services.php';?>" class="">request</a>
           <!-- commented because included in one -->    
           <!-- <div class="i">
                    <li><a href="<?php echo WWW_ROOT.'public/members/request/req_services.php'?>" class="">service</a></li>
                    <li><a href="<?php echo WWW_ROOT.'public/members/request/req_father.php';?>" class="">confession father</a></li>
                    <li><a href="<?php echo WWW_ROOT.'public/members/request/req_leaving.php';?>" class="">leaving request</a></li>  
                    
                    
                </div> -->
            </ul>
        </div>
        
        <ul>
            <li><a href="<?php echo WWW_ROOT.'public/members/pay.php';?>" class="">pay</a></li>
        </ul>

        <ul>
            <li><a href="<?php echo WWW_ROOT.'public/members/quest.php';?>" class="">questions</a></li>
        </ul>

        <ul>
            <li><a href="<?php echo WWW_ROOT.'public/members/comment.php';?>" class="">comment</a></li>
        </ul>

             <div class="o1">
               <ul> view
                    <div class="i">
                        <li><a href="<?php echo WWW_ROOT.'public/members/view/groups.php';?>" class="">groups</a></li>
                        <li><a href="<?php echo WWW_ROOT.'public/members/view/admins.php';?>" class="">admins</a></li>
                    </div>
               </ul>
             </div>
        <ul>
            <li><a href="<?php echo WWW_ROOT.'private/shared/logout.php';?>" class="">logout</a></li>
        </ul>
    </div>
    </header>

   
    