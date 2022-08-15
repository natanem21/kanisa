<?php include("../../private/shared/init.php");?>
<?php include(_shared."/header.php");?>
        <ul>
            <li><a href="children.php" class="">view confession childrens</a></li>
        </ul>
        <ul>
            <li><a href="heresy.php" class="">heretics</a></li>
        </ul>

</div>
    </header>
<?php
if($_SESSION['role']!=3)
{
    header("location:"."/chms_for_eotc/guest/login.php");
}
?>

<div class="content">
<h1>list of your confession children </h1>
    <div class="tb">
        <div class="tr">
            <h3 class="td">id</h3>
            <h3 class="td">name</h3>
            <h3 class="td">christ_name</h3>
            <h3 class="td">action</h3>
            <h3 class="td">complains</h3>
        </div>
        <?php 
                $sql ="SELECT `c_id`, `m_id`,`name`,`christ_name`,`clergy_father`.`id` FROM `clergy_father` JOIN `members` ON `m_id` = `members`.`id` WHERE `c_id`='$_SESSION[id]'";
             
                $result=$DBC->query($sql);
                while($x=$result->fetch_assoc())
                {
                    $sql2="SELECT `rec_id` FROM `comment` WHERE `rec_id`='$x[m_id]' and `type`>'1'" ;
                    $result2=$DBC->query($sql2);
                    $y=$result2->fetch_assoc();
                ?>
            <div class="tr">
                <h4 class="td"<?php if($y!=null){ ?>  style="background-color:red"<?php }?>><?php echo $x["m_id"]?></h4>
                <h4 class="td"><?php echo $x["name"]?></h4>
                <h4 class="td"><?php echo $x["christ_name"]?></h4>
                <a href="detail.php?id=<?php echo $x['m_id'] ?>" class="td">detail</a>
                <?php  if($y!=null){ ?> <a href="complain.php?id=<?php echo  $x['m_id']?>" class="td"> view </a> <?php }
                ?>

            </div>
            <?php
                }
                ?>
                </div>
    </div>
</div>

<?php include(_shared."/footer.php");?>