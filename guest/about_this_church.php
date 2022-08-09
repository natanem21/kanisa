<?php require_once("../private/shared/database.php");?><?php $title="church informaion";
$direct="<a href ='index.php'> <img src='book.svg' alt='profile image' class='profile rect'>";
include("header.php");?> 
    <div class="c2">
        <div class="go_left">
            <h3 class="title">
                <a href="http://">
                    photo gallery
                </a>
            </h3>
            <h3 class="title">
                <a href="http://">
                    teachings
                </a>
            </h3>
            <h3 class="title">
                <a href="http://">
                    new posts
                </a>
            </h3>
        </div>

        <div class="go_right">
            <?php 
            $sql ="SELECT `header`,`content`,`name`,`posts`.`img` FROM `posts` join `members` ON `m_id`=`id` WHERE `receiver`='0'";
            $result=$DBC->query($sql);
            while($x=$result->fetch_assoc())
            {
            ?>
            <div class="post">
                <h2><?php echo $x["header"]  ?>&nbsp&nbsp&nbsp</h2>
                <?php if(($x["img"])!=null){?>
                <img src="myFiles/<?php echo $x['img']?>" alt="post_img" class="p_img"> 
                <?php } ?>
                <p class="p_cont"><?php echo $x["content"]?> </p>
            </div>
            <h3 class="foot">posted by: 
                <?php echo  $x["name"]?>
            </h3>
          <?php
            }
            ?>
            </div>
          
        </div>
       
        </div>
        
        
    </div>
