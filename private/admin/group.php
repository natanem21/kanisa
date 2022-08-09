<?php include("../shared/init.php");?>
<?php include(_private."/admin_share/header.php");?>
<?php $sql = "SELECT * FROM `church_groups`";
$result = $DBC->query($sql); ?>
<style>
    .content
    {
        top: 20px;
        display:flex;
        flex-direction:row;
    }
    .old
    {
        border:1px dashed red;
    }
</style>
<div class="content">
    <div class="new">
        <form action="group.php" method="post">
            <div class="tb">
                <div class="tr">
                    <h2 class="td">add new group</h2>
              
                </div>
                <div class="tr">
                    <h3 class="td">group name : </h3>
                    <input type="text" class="td" name="g_name" value="<?php  
                    if(isset($_GET['id'])) 
                    {$sql2 = "SELECT * FROM `church_groups` WHERE `g_id`='$_GET[id]'";
                        $res = $DBC->query($sql2);
                        $x = $res->fetch_assoc();
                        echo $x['g_name'];
                       
                     } ?>
                    ">
                </div>
                <div class="tr">
                    <h3 class="td">description</h3>
                    <textarea name="desc" id="desc" cols="30" rows="10" class="td"><?php  
                    if(isset($_GET['id'])) 
                    {
                        echo $x['Description'];
                       
                     } ?>
                    </textarea>
                </div>
                <div class="tr">
                    <h3 class="td"> type</h3>
                    <select name="type" id="type" class="td">
                        <option value="0" <?php if(isset($_GET['id'])) {if($x['type']==0) echo "selected";} ?>>ጥዋ</option>
                        <option value="1" <?php if(isset($_GET['id'])) {if($x['type']==1) echo "selected";} ?>>ማህበር</option>
                        <option value="2" <?php if(isset($_GET['id'])) {if($x['type']==2) echo "selected";} ?>>ሰንበቴ</option>
                        <option value="3" <?php if(isset($_GET['id'])) {if($x['type']==3) echo "selected";} ?>>በጎ አድራጎት</option>
                    </select>
                </div>
                <div class="tr">
                    <input type="submit" value="add" class="td" name="pst_group">
                </div>
            </div>
        </form>
    </div>
    <div class="old" >
       <div class="tb">
        <h2 class="tr">existed groups</h2>
        <div class="tr">
         <h3 class="td">group name</h3>
        <h3 class="td">type</h3>
       <h3 class="td">update</h3>
        </div>
        <?php
        while($x = $result->fetch_assoc())
        {
            ?>
            <div class="tr">
                <h3 class="td"><?php echo $x["g_name"];?></h3>
                <h3 class="td"><?php echo $x["type"]?></h3>
                <h3 class="td"> <a href="group.php?id=<?php echo $x['g_id'] ?>"> update</a></h3>
            </div>
            <?php
        }
        ?>
       </div> 
    </div>
</div>
<?php

    if(isset($_POST["pst_group"]))
    {
        $now= date("Y-j-d ",time());

        $sql = "INSERT INTO `church_groups` ( `g_name`, `type`, `Description`, `created_date`, `added_by`) 
        VALUES ('$_POST[g_name]', '$_POST[type]', '$_POST[desc]', '$now', '$_SESSION[id]');";
        $DBC->query($sql);
        header("location:group.php");
    }

?>
<?php include(_private."/admin_share/footer.php");?>