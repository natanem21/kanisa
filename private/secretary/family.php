<?php include("../shared/init.php");?>
<?php include(_private."/sec_share/header.php");?>

<?php 
if(isset($_GET["mrrg_id"]))
{
    $sql="SELECT * FROM  `marriage` WHERE `marriage_id`='$_GET[mrrg_id]'";
    $resultm=$DBC->query($sql);
    $mrrg=$resultm->fetch_assoc();

$sql = "SELECT `name`,`age` FROM `members` WHERE `id`='$mrrg[husband_id]'";;
$resultf=$DBC->query($sql);
$father=$resultf->fetch_assoc();

$sql = "SELECT `name`,`age` FROM `members` WHERE `id`='$mrrg[wife_id]'";;
$resultm=$DBC->query($sql);
$mother=$resultm->fetch_assoc();

$sql = "SELECT `name`,`id` FROM `members` WHERE  `members`.`status`!='2'";
$result=$DBC->query($sql); 


?>

<style>
  .content
  {
    top: 10px;
  }
 
  </style>
<div class="content">
    <form action="family.php" method="get">
        <div class="tb">
            <h3 class="tr">family id = <input type="text" name="mrrg_id" value="<?php  echo $_GET['mrrg_id']?>"></h3>
            <div class="tr">
                <h2 class="td">parent name </h2>
                <h2 class="td">age</h2>
            </div>
            <div class="tr">
                <h3 class="td">father name :<?php echo $father["name"]?> </h3>
                <h3 class="td"><?php 
                $now = date("Y",time());
                $DOB = date("Y",strtotime($father["age"]));
                $age=$now-$DOB;
                echo $age ?></h3>
            </div>
            <div class="tr">
                <h3 class="td">mother name :<?php echo $mother["name"]?> </h3>
                <h3 class="td"><?php 
                $now = date("Y",time());
                $DOB = date("Y",strtotime($mother["age"]));
                $age=$now-$DOB;
                echo $age?></h3>
            </div>
            </br>
            
                <div class="tr">
                    <h3 class="td">add child</h3>
                    <select name="child" id="child" class="td">
                    <?php while($child=$result->fetch_assoc())
                    {
                        ?>
                    <option value="<?php echo $child["id"];?>"><?php echo $child["name"]; ?></option>
                        <?php
                    } ?>
                            
                    </select>
                    <input type="submit" value="add to family" class="td" name="add_child">
                </div>
                
            
            <div class="tr">
                <h2 class="td">children name</h2>
                <h2 class="td">age</h2>
            </div>
            <?php  
                $sql = "SELECT `member_id`,`name`,`age` FROM `family` JOIN `members` ON `member_id`=`id` WHERE `m_id`='$_GET[mrrg_id]'";
                $result=$DBC->query($sql);
                while($child=$result->fetch_assoc())
                {
                    $now = date("Y",time());
                    $DOB = date("Y",strtotime($child["age"]));
                    $age=$now-$DOB;
                   
                    ?>
                <div class="tr">
                <h2 class="td"><?php echo $child["name"]?></h2>
                <h2 class="td"><?php echo $age?></h2>
            </div>
                    <?php
                }
            ?>

        </div>
    </form>
   
</div>
<?php
}



if(isset($_GET["add_child"]))
{
    $mrrg_id=$_GET["mrrg_id"];
    $sql="INSERT INTO `family`( `m_id`, `member_id`) VALUES ('$mrrg_id','$_GET[child]')";
    $DBC->query($sql);
    header("location:family.php?mrrg_id=$mrrg_id");
  
}
?>
<?php include(_private."/sec_share/footer.php");?>