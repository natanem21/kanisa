<?php include("../shared/init.php");?>
<?php include(_private."/sec_share/header.php");?>
<?php $sql = "SELECT `name`,`id` FROM `members` WHERE `gender`='0'  and `members`.`martial_stat`!='1'";
$result=$DBC->query($sql); ?>
<style>
  .content
  {
    top: 10px;
  }
  .main
    {
        display:flex;
        flex-wrap: wrap;
        
    }
  </style>
<div class="content">
    <div class="main">
        <div class="new">
            <form action="marriage.php" method="post">
                <div class="tb">
                    <h1 class="tr">add new family</h1>
                    <div class="tr">
                        <h2 class="td">name of the husband: </h2>
                        <select name="husband" id="husband" class="td">
                            <?php while($x=$result->fetch_assoc())
                            {
                                ?>
                            <option value="<?php echo $x["id"];?>"><?php echo $x["name"]; ?></option>
                                <?php
                            } ?>
                                    
                        </select>
                    </div>
                    <div class="tr">
                        <h2 class="td">name of the wife: </h2>
                        <select name="wife" id="wife" class="td">
                            <?php 
                            $sql = "SELECT `name`,`id` FROM `members`  WHERE `gender`='1'  and `members`.`martial_stat`!='1'";
                            $result=$DBC->query($sql); 
                            while($y=$result->fetch_assoc())
                            {
                                ?>
                            <option value="<?php echo $y["id"];?>"><?php echo $y["name"]; ?></option>
                                <?php
                            } ?>
                                    
                        </select>
                    </div>
                    <div class="tr">
                        <h2 class="td">wedding date : </h2>
                        <input type="date" name="date" id="date" class="td" required>
                    </div>
                    <input type="submit" value="add to marriage book" class="td" name="mg">
                </div>
            </form>
        </div>

        <div class="old">
          <div class="tb">
            <h1 class="tr">existed family list</h1>
            <div class="tr">
                <h2 class="td">name of the father: </h2>
                <h3 class="td">view</h3>
            </div>
           
                <?php $sql = "SELECT `marriage_id`,`husband_id`,`wife_id`,`name` FROM `marriage` JOIN `members` ON `id`=`husband_id`"; 
                $result = $DBC->query($sql);
                while($x=$result->fetch_assoc())
                            {
                                 ?>
                    <div class="tr">
                        <h2 class="td"><?php echo $x["name"]?></h2>
                        <h3 class="td"><a href="family.php?mrrg_id=<?php echo $x['marriage_id']?>">detail</a></h3>
                    </div>
                                <?php
                            }
                ?>
            
          </div>  
        </div>
    </div>
</div>
<?php
if(isset($_POST["mg"]))
{
  $sql = "INSERT INTO `marriage`( `husband_id`, `wife_id`, `w_date`)
  VALUES ('$_POST[husband]','$_POST[wife]','$_POST[date]')";
  $DBC->query($sql);
  header("location:marriage.php");
}
?>
<?php include(_private."/sec_share/footer.php");?>