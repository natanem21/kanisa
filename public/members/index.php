<?php include("../../private/shared/init.php");?>
<?php include(_shared."/header.php");?>
<?php
if($_SESSION['role']!=0)
{
    header("location:"."/chms_for_eotc/guest/login.php");
}
?>

<div class="content">
    <h1>index page</h1>
    <?php 
            $sql ="SELECT `post_id`,`header`,`content`,`name`,`posts`.`img`,`posts`.`date` FROM `posts` join `members` ON `m_id`=`id` WHERE `receiver`<='1'";
            $result=$DBC->query($sql);
            while($x=$result->fetch_assoc())
            {
            ?>
            <div class="post">
                <h2><?php echo $x["header"]  ?>&nbsp&nbsp&nbsp</h2>
                <?php if(($x["img"])!=null){?>
                <img src="<?php echo '/chms_for_eotc/private/admin/myFiles/'.$x['img']?>" alt="post_img" class="p_img"> 
                <?php } ?>
                <p class="p_cont"><?php echo $x["content"]?> </p>
            </div>
            <h3 class="foot">posted by: 
                <?php echo  $x["name"]?> at : <?php   echo $x["date"]; echo "<a href='comment.php?p_id=".$x["post_id"]."'>comment</a>"?>
            </h3>
          <?php
            }
            ?>
            </div>
</div>

<?php include(_shared."/footer.php");?>