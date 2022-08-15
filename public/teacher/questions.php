<?php include("../../private/shared/init.php");?>
<?php include(_shared."/header.php");?>

<ul>
            <li><a href="questions.php" class="">questions</a></li>
        </ul>
</div>
    </header>
<?php
if($_SESSION['role']!=4)
{
    header("location:"."/chms_for_eotc/guest/login.php");
}
?>

<div class="content">
<h1>view questions  from members </h1>
    <?php 
            $sql ="SELECT `q_id`,`name`, `q_m_id`, `type`, `cont`,`questions`.`status`,`date` FROM `questions` JOIN `members` ON `q_m_id`=`id`";
            $result=$DBC->query($sql);
            while($x=$result->fetch_assoc())
            {
            ?>
            <div class="post">
                <h2>from : <?php echo $x["name"]  ?>&nbsp&nbsp&nbsp</h2>
                <?php if($x["status"]==0)
                        { 
                            echo "<p style='color:green'>NEW</p>";
                        } 
                        else {
                            echo "<p style='color:blue'>HAS SOME HISTORY</p>";
                            }?>
             
                <p class="p_cont"><?php echo $x["cont"]?> </p>
            </div>
            <h3 class="foot"> at : <?php   echo $x["date"]; ?></h3>
           
            <h3 class="td"><a href="post.php?id=<?php echo $x["q_id"]?>">answer</a></h3>
          <?php
            }
            ?>
            </div>
</div>

<?php include(_shared."/footer.php");?>