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
if(isset($_GET["id"]))
{
    $sql="SELECT * FROM `comment` WHERE `rec_id`='$_GET[id]' and `type`>'1'";
    $result2=$DBC->query($sql);
    ?>
        <div class="content">
            <div class="tb">
                <div class="tr">
                    <h3 class="td">date</h3>
                    <h3 class="td">type</h3>
                    <h3 class="td">reason</h3>
                    <h3 class="td">additionals</h3>
                </div>
                
                
    <?php
    while($y=$result2->fetch_assoc())
        {?>
            <div class="tr">
               <h3 class="td"><?php echo $y["cmt_date"] ?></h3>
               <h3 class="td"><?php if($y["type"]==3){?><a  href="../../private/shared/myFiles/<?php echo $y['evidence']?>">heresy</a>
               <?php } elseif($y["type"]==2){echo "conflict";?></h3>
                <h3 class="td"><?php echo $y["reason"]?></h3><?php } ?>
               <h3 class="td"><?php echo $y["content"]?></h3>
              
                   
               </div>
                
           

            <?php
        }
        ?>
        
         </div>   
        </div>
        <?php
}
include(_shared."/footer.php");?>