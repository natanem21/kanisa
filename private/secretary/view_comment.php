<?php include("../shared/init.php");?>
<?php include(_private."/sec_share/header.php");?>
<div class="content">
    <h1>view comments for secretary </h1>
    <?php 
            $sql ="SELECT  `name`,`cnr_id`, `rec_id`, `content`, `cmt_date`, `rep_date`, `post_id` FROM `comment` 
                                                JOIN `members` ON `cnr_id`=`id` WHERE `rec_id`='$_SESSION[id]'";
            $result=$DBC->query($sql);
            while($x=$result->fetch_assoc())
            {
            ?>
            <div class="post">
                <h2>from : <?php echo $x["name"]  ?>&nbsp&nbsp&nbsp</h2>
                <?php if($x["post_id"]!=1)
                        { 
                            echo "<a href='../admin/post.php?id=".$x["post_id"]."'>on your post ".$x["post_id"]."</a>";
                        } 
                        else {echo "this is direct comment";}?>
             
                <p class="p_cont"><?php echo $x["content"]?> </p>
            </div>
            <h3 class="foot"> at : <?php   echo $x["cmt_date"]; ?></h3>
           
            </h3>
          <?php
            }
            ?>
            </div>
</div>
<?php include(_private."/sec_share/footer.php");?>