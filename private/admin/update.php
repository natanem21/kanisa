<?php include("../shared/init.php");?>
<?php include(_private."/admin_share/header.php");?>
<style>
    .content2{
        display:none;
    }
</style>
<div class="content">
                <?php
            $sql = "SELECT * from `members` WHERE `id`=$_GET[id]";
            $result =$DBC->query($sql);
            if($result)
            {
                    $x = $result->fetch_assoc();?>
                <form action="update.php?id=<?php  echo $x['id'];?>" method="post">
                <h3>name : <input type="text" name="nm" value="<?php  echo $x['name'];?>"/>
                        <h3>christian name : <input type="text" name="cn" value="<?php  echo $x['christ_name'];?>"/>
                        <h3>age : <input type="text" name="ag" value="<?php  echo $x['age'];?>"/>
                        <h3>gendr :
                                    <select name="gen">
                                        <option value="0" <?php if($x['gender']==0){?>
                                                                selected="selected"<?php }?>>male</option>
                                        <option value="1"  <?php if($x['gender']==1){?>
                                                                selected="selected"<?php }?>>female</option>
                                    </select>

                        <h3>martial status :<input type="text" name="ms" value="<?php   if($x['martial_stat']==0) {echo "single";} elseif ($x['martial_stat']==1) {echo "married";}else {echo "divorced";};?>"/>
                        <h3>position : 
                                <SELECT name="pos">
                                <option value="1"  <?php if($x['clerical_pos']==1){?>
                                                            selected="selected"<?php }?>
                                                            >non clergy</option>
                                <option value="2" <?php if($x['clerical_pos']==2){?>
                                                            selected="selected"<?php }?>
                                                            >deacon</option>
                                <option value="3" <?php if($x['clerical_pos']==3){?>
                                                            selected="selected"<?php }?>
                                                            >priest</option>
                                <option value="4" <?php if($x['clerical_pos']==4){?>
                                                            selected="selected"<?php }?>
                                                            >monk</option>
                            </SELECT>
                            <?php
                                    if($x['clerical_pos']>1){
                                        echo "<a href='update.php?id=".$x['id']."&uc=1'>------clergies information----</a>";
                                        ?>
                            
                                        <?php
                                    }
                            ?>
                        
                    <input type="submit" name="sb">
                
                </form>
        <?php
        }
        else{
            echo "no data";
        }
        if(isset($_POST['sb']))
        {
        
            $sql2="UPDATE `members` SET `name` = '$_POST[nm]',
                                        `christ_name`='$_POST[cn]',
                                        `age`='$_POST[ag]',
                                        `gender`='$_POST[gen]',
                                        `martial_stat`='$_POST[ms]',
                                        `clerical_pos`='$_POST[pos]'
                                        WHERE `members`.`id` = $_GET[id]";
            $result =$DBC->query($sql2);
            if($result)
            {
                ?>
                <script>
                    alert("updated succesfuly");
                </script>
            <?php
                header("location:update.php?id=".$_GET['id']."&up=1");
                
            }


            else{
                echo "error".$DBC->error;
            }
        }
        if(isset($_GET['up']))
        {
            echo "updated";
        }


        ?>
</div>
<div class="content2">
    
    <?php $sql = "SELECT * FROM `clergy` WHERE `c_id`=$_GET[id]";
    if($x['clerical_pos']>1){
        echo "<a href='update.php?id=".$x['id']."&uc=2'>------basic information----</a>";
    }
                                                 
    $result =$DBC->query($sql);
    if($result)
    {
        $y = $result->fetch_assoc();
        ?>
         <form action="update.php?uc=1&id=<?php  echo $_GET['id'];?>" method="post">
                annoitation date:<input type="date" name="ad" id="ad" /></br></br>
                annoited by: <input type="text" name="ab" id="ab"/></br></br>
                on service date: <input type="text" name="sd" id="sd"/></br></br>
                served churches: <textarea name="sc" id="sc" ></textarea></br></br>
                clerical  type : <SELECT name="pos" >
                                <option value="1"  <?php if($x['clerical_pos']==1){?>
                                                            selected="selected"<?php }?>
                                                            >non clergy</option>
                                <option value="2" <?php if($x['clerical_pos']==2){?>
                                                            selected="selected"<?php }?>
                                                            >deacon</option>
                                <option value="3" <?php if($x['clerical_pos']==3){?>
                                                            selected="selected"<?php }?>
                                                            >priest</option>
                                <option value="4" <?php if($x['clerical_pos']==4){?>
                                                            selected="selected"<?php }?>
                                                            >monk</option>
                            </SELECT></br></br>
                education background: <textarea name="eb" id="eb"></textarea ></br>
                <input type="submit" name="sb4">
            </form>
        <?php
            if(isset($y['c_id']))
        {
            echo " saved";
            if(isset($_POST['sb4'])){

            
            $sql = "UPDATE `clergy` SET `annoitation_Date`='$_POST[ad]',
                                        `annoited_by` = '$_POST[ab]',
                                        `on_service_date`='$_POST[sd]',
                                        `served_churches`='$_POST[sc]',
                                        `type`='$_POST[pos]',
                                        `education_back`='$_POST[eb]'";
            
            $result = $DBC->query($sql);
            if($result)
            {
                echo "done";
            }
            else{
                echo "error".$DBC->error;
            }
            header("location:update.php?id=".$_GET['id']."&uc=1");
        }
            ?>
           <script>
                document.getElementById("ad").value="<?php echo $y['annoitation_Date'];?>";
                document.getElementById("ab").value="<?php echo $y['annoited_by'];?>";
                document.getElementById("sd").value="<?php echo $y['on_service_date'];?>";
                document.getElementById("sc").value="<?php echo $y['served_churches'];?>";
                document.getElementById("eb").value="<?php echo $y['education_back'];?>";
            </script>
            <?php
        }
        else{
            echo " not saved";

            ?>
            
            <?php
        }
    }
    else{
        echo "error".$DBC->error;
    }
    ?>
    
</div>
<?php 


if(isset($_GET['uc']))
{
    echo "voila";
if($_GET['uc']==1){
    ?>
<style>
.content{
   
    display:none;
}
.content2{
    display:block;
}
</style>

    <?php

}
else
{
    ?>
    <style>
    .content{
       
        display:block;
    }
    .content2{
        display:none;
    }
    </style>
    
        <?php  
}
}
?>
<?php include(_private."/admin_share/footer.php");?>