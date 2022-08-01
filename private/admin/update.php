<?php include("../shared/init.php");?>
<?php include(_private."/admin_share/header.php");?>
<style>
    /* this will hide the clerical information page */
    .content2{
        display:none;
    }
    footer{
    height: 25px;
    width: 100vw;
    bottom: 0px;
    position:absolute;
    background-color:rgb(9, 210, 236);
    
        }
</style>

                                    <!-- this is basic information view -->
<div class="content">

            <!-- sql defination part  -->
    <?php
        $sql = "SELECT * from `members` WHERE `id`=$_GET[id]";
        $sql4 = "SELECT * from `clergy` WHERE `c_id`=$_GET[id]";
        $sql2="UPDATE `members` SET `status` = '1' WHERE `members`.`id` = $_GET[id]";
        $sql3="UPDATE `members` SET `status` = '0' WHERE `members`.`id` = $_GET[id]";
        $result =$DBC->query($sql); //members table
        $result2 = $DBC->query($sql4);//clergy table
        if($result2)
        {
            echo "result 2 is working";
                $y = $result2->fetch_assoc();
        }
        else{
            $y = NULL;
        }
        if($result)
                {
                    /* handles array from members table 

                        this will be executed if the members id is present
                    */
                    $x = $result->fetch_assoc();
    ?>
                        <!-- form to update members table -->

                    <form action="update.php?id=<?php  echo $x['id'];?>" method="post">

                        <h3>id : </name><?php  echo $x['id'];?>
                        <h3>name : <input type="text" name="nm" value="<?php  echo $x['name'];?>"/>
                        <h3>christian name : <input type="text" name="cn" value="<?php  echo $x['christ_name'];?>"/>
                        <h3>age : <input type="text" name="ag" value="<?php  echo $x['age'];?>"/>
                        <h3>gender :
                                    <select name="gen">
                                        <option value="0" <?php if($x['gender']==0){?>
                                                                selected="selected"<?php }?>>male</option>
                                        <option value="1"  <?php if($x['gender']==1){?>
                                                                selected="selected"<?php }?>>female</option>
                                                                
                                    </select>

                        <h3>martial status :<input type="text" name="ms" value="<?php   if($x['martial_stat']==0) {echo "single";} elseif ($x['martial_stat']==1) {echo "married";}else {echo "divorced";};?>"/>
                        <h3>position : 
                                <SELECT name="pos">
                                <option value="0"  <?php 
                                    if($y==NULL){?>
                                                            selected="selected"<?php }?>
                                                            >non clergy</option>
                                <option value="1" <?php if($y !=NULL){
                                if($y['type']==1){?>
                                                            selected="selected"<?php }}?>
                                                            >deacon</option>
                                <option value="2" <?php  if($y !=NULL){
                                if($y['type']==2){?>
                                                            selected="selected"<?php }}?>
                                                            >priest</option>
                                <option value="3" <?php if($y !=NULL){
                                if($y['type']==3){?>
                                                            selected="selected"<?php }}?>
                                                            >monk</option>
                            </SELECT>
                            <?php
                            if(isset($y['type']))
                            {
                                    if($y['type']>0){
                                        echo "<a href='update.php?id=".$x['id']."&uc=1'>------clergies information----</a>";
                                    
                                    ?>
                                    
                                        <?php
                                    }
                                if($y['type']==0){
                                    $sql8="SELECT * FROM `clergy_father` WHERE `c_id` = $_GET[id]";
                                    $result4=$DBC->query($sql8);
                                    if($result4)
                                    {
                                        while($x=$result4->fetch_assoc())
                                        {
                                            $sql9 = "DELETE FROM `clergy_father` WHERE `c_id`=$_GET[id]";

                                            $result5 = $DBC->query($sql9);
                                        }  
                                        }
                                        echo "you are not clergy";
                                    $sql7 = "DELETE FROM `clergy` WHERE `c_id`=$_GET[id]";

                                    $result3 = $DBC->query($sql7);
                                    }
                                    
                                }
                        
                            ?>
                         <h3>account status : </name><?php   
                                        if($x['status']==0)  { echo "deactivated  ";?>
                                            <form action="view.php?id=<?php echo $_GET['id']?>" method="post">
                                                <button type="submit" name="act">activate</button>
                                            </form>
                                        <?php   
                                        } 
                                        else {echo "activated";?>
                                            <form action="view.php?id=<?php echo $_GET['id']?>" method="post">
                                                <button type="submit" name="deact">deactivate</button>
                                            </form>
                                        <?php   };?>
                    <input type="submit" name="sb">
                
                </form>
        <?php
        }
        else{
            echo "no data";
        }
        if(isset($_POST['sb']))
        {
        
            $sql5="UPDATE `members` SET `name` = '$_POST[nm]',
                                        `christ_name`='$_POST[cn]',
                                        `age`='$_POST[ag]',
                                        `gender`='$_POST[gen]',
                                        `martial_stat`='$_POST[ms]'
                                        WHERE `members`.`id` = $_GET[id]";
            
            $result =$DBC->query($sql5);
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

            if(isset($y['c_id']))
            {
               $sql6 = "UPDATE `clergy` SET `type`='$_POST[pos]' WHERE `c_id` = '$_GET[id]'" ;
               $result=$DBC->query($sql6);
               if($result)
               {
                echo "success";
               }
               else{
                echo "not success";
               }
            }
            else{
                $sql6 = "INSERT INTO `clergy` (`c_id`,`type`) VALUE('$_GET[id]','$_POST[pos]') ";
                $result=$DBC->query($sql6);
                if($result)
                {
                 echo "success";
                }
                else{
                 echo "not success";
                }
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
    if($y['type']>0){
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
                </br>
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
                                        
                                        `education_back`='$_POST[eb]' WHERE`c_id`='$_GET[id]'";
            
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
            if(isset($_POST['sb4'])){
                $sql = "INSERT INTO `clergy` (`c_id`, `annoitation_Date`, `annoited_by`, `on_service_date`, `served_churches`, `education_back`) 
                VALUES ('$_GET[id]', '$_POST[ad]', '$_POST[ab]', '$_POST[sd]', '$_POST[sc]', '$_POST[eb]'); ";
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
<?php
            if(isset($_POST['act']))

            {
                $result =$DBC->query($sql2);
                if($result)
                {
                    //echo "worked";
                    header("location:update.php?id=".$_GET['id']);
                }
                else{
                    echo "not worked";
                }


            }
            if(isset($_POST['deact']))
            {
                $result =$DBC->query($sql3);
                if($result)
                {
                    //echo "worked";
                    header("location:update.php?id=".$_GET['id']);
                }
                else{
                    echo "not worked";
                }


            }
           
            ?>
        </br>    <h2>add information on current occupation and working place father name and mother name </h2>
<?php include(_private."/admin_share/footer.php");?>