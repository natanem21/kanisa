<?php include("../../private/shared/init.php");?>
<?php include(_shared."/header.php");?>
<?php
if($_SESSION['role']!=0)
{
    header("location:"."/chms_for_eotc/guest/login.php");
}
?>

<div class="content">
<div class="go_left">
            <h3 class="title"><u>notice </u></h3>
            <?php
$sql = "SELECT `Request_id`, `user_id`, `request_type`, `reason`, `service_customer`, `christ_name`, `sex`, `DOB`, `place_of_birth`, `address`, `God father or mother name`, `date` FROM `request` WHERE `user_id`='$_SESSION[id]'";
$result = $DBC->query($sql);
echo "you requests";
while($x=$result->fetch_assoc())
{
echo $x["Request_id"];
}
            ?>
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