<?php include("../shared/init.php");?>
<?php include(_private."/admin_share/header.php");?>

    <style>
        /* this will hide the clerical information page */
        .content2
        {
            display:none;
            top:10px;
        }
        footer
        {
        height: 25px;
        width: 100vw;
        bottom: 0px;
        position:fixed;
        background-color:rgb(9, 210, 236);
        }
        img.td.profile {
    border-radius: 30px;
}
    </style>

<!-- this is basic information view -->

<div class="content tb">

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
            
            $y = $result2->fetch_assoc();
        }
        else
        {
            $y = NULL;
        }
        if($result)
                {
                    /* handles array from members table 

                        this will be executed if the members id is present
                    */
                    $x = $result->fetch_assoc();

                            ?>

                        <!-- form to update members table name = sb-->

                    <form action="update.php?id=<?php  echo $x['id'];?>" method="post">
                        <div class="tr"> <h3 class="td">id : <?php  echo $x['id'];?></div>
                        <div class="tr"> <h3 class="td">image : <img src="/chms_for_eotc/guest/myFiles/<?php  echo $x['img'];?>" alt="profile image" class="profile"></div>
                        <div class="tr"><h3 class="td">id: </h3><input type="text" name="me_id" id="" class="td" value="<?php  echo $x['id'];?>" disabled></div>
                        <div class="tr"> <h3  class="td">first name : </h3><input class="td" type="text" name="nm" value="<?php  echo $x['name'];?>"/></div>
                        <div class="tr"> <h3  class="td">last name : </h3><input class="td" type="text" name="lm" value="<?php  echo $x['last_name'];?>"/></div>
                        <div class="tr"> <h3  class="td">christian name :</h3> <input class="td" type="text" name="cn" value="<?php  echo $x['christ_name'];?>"/></div>
                        <div class="tr"> <h3  class="td">password :</h3> <input class="td" type="text" name="pswd" value="<?php  echo $x['password'];?>"/></div>
                        <div class="tr"> <h3  class="td">age :</h3> <input class="td" type="date" name="ag" value="<?php  echo $x['age'];?>"/></div>
                        <div class="tr"> <h3  class="td">phone number : </h3><input class="td" type="text" name="pn" value="<?php  echo $x['phone'];?>"/></div>
                        <div class="tr"> <h3  class="td">email : </h3><input class="td" type="text" name="em" value="<?php  echo $x['email'];?>"/></div>
                        <div class="tr"> <h3  class="td">address : </h3><input class="td" type="text" name="addr" value="<?php  echo $x['address'];?>"/></div>
                        <div class="tr"> <h3  class="td">registration date : </h3><input class="td" type="date" name="rd" value="<?php  echo $x['reg_date'];?>"/></div>
                        <div class="tr"> <h3  class="td">gender :</h3>
                                    <select class="td" name="gen">
                                        <option value="0" <?php if($x['gender']==0){?>
                                                                selected="selected"<?php }?>>male</option>
                                        <option value="1"  <?php if($x['gender']==1){?>
                                                                selected="selected"<?php }?>>female</option>
                                                                
                                    </select>
                                    </div>
                       <div class="tr"> <h3  class="td">martial status :</h3><input class="td" type="text" name="ms" value="<?php   if($x['martial_stat']==0) {echo "single";} elseif ($x['martial_stat']==1) {echo "married";}else {echo "divorced";};?>"/></div>
                       <div class="tr"><h3 class="td">position filled : </h3><span class="td"><?php   if($x['clerical_pos']==1) {echo "non-clergy";} elseif ($x['clerical_pos']==2) {echo "deacon";}elseif ($x['clerical_pos']==3) {echo "priest";}else {echo "monk";};?></span></div>
                       <div class="tr">  <h3  class="td">position in current church :</h3> 
                                                                                        <SELECT class="td" name="pos">
                                                                                            <option value="0"  <?php  if($y==NULL){?>selected="selected"<?php }?>>non clergy</option>
                                                                                            <option value="1" <?php if($y !=NULL){ if($y['type']==1){?>selected="selected"<?php }}?> >deacon</option>
                                                                                            <option value="2" <?php  if($y !=NULL){if($y['type']==2){?> selected="selected"<?php }}?> >priest</option>
                                                                                            <option value="3" <?php if($y !=NULL){ if($y['type']==3){?>selected="selected"<?php }}?>>monk</option>
                                                                                        </SELECT></div>
                        <div class="tr"><h3 class="td">role :</h3>
                                <select name="role" id="role" class="td">
                                    <option value="0" <?php if($x["role"]==0) { echo "selected"; } ?> >member</option>
                                    <option value="1" <?php if($x["role"]==1){echo "selected";}?>>secretary</option>
                                    <option value="2" <?php if($x["role"]==2){echo "selected";}?>>admin</option>
                                    <option value="3" <?php if($x["role"]==3){echo "selected";}?>>father</option>
                                    <option value="4" <?php if($x["role"]==4){echo "selected";}?>>teacher</option>
                                </select>
                        </div>
                                                                                                        <?php
                                                                                        if(isset($y['type']))
                                                                                        {
                                                                                                if($y['type']>0)
                                                                                                {
                                                                                                    echo "<a href='update.php?id=".$x['id']."&uc=1'>------clergies information----</a>";
                                                                                
                                                                                                }
                                                                                                
                                                                                                /* 
                                                                                                    to depromote a clergy to member first check if there are assocoiated confession childrens 
                                                                                                    delete from clergy to members relation
                                                                                                    then delete from clergies table
                                                                                                */

                                                                                                if($y['type']==0)   
                                                                                                {
                                                                                                    $sql8="SELECT * FROM `clergy_father` WHERE `c_id` = $_GET[id]"; //checking if there are confession children
                                                                                                    $result4=$DBC->query($sql8);
                                                                                                    if($result4)
                                                                                                    {
                                                                                                        while($x=$result4->fetch_assoc())
                                                                                                        {
                                                                                                            $sql9 = "DELETE FROM `clergy_father` WHERE `c_id`=$_GET[id]"; 
                                                                                                            $result5 = $DBC->query($sql9);
                                                                                                        }  
                                                                                                    }
                                                                                                    
                                                                                                    $sql7 = "DELETE FROM `clergy` WHERE `c_id`=$_GET[id]";
                                                                                                    $result3 = $DBC->query($sql7);
                                                                                                }
                                                                                                
                                                                                        }
                                                                                        ?>
                       
                       <div class="tr"><h3 class="td">certificates : </h3>
                                                                        <?php $sql10="SELECT * FROM `certificate` WHERE  `mem_id`='$x[id]'";
                                                                        $result6 = $DBC->query($sql10);
                                                                        while($cert = $result6->fetch_assoc())
                                                                        {
                                                                            ?>
                                                                            <a href="/chms_for_eotc/guest/myFiles/<?php  echo $cert['img']; ?>"><img src="/chms_for_eotc/guest/myFiles/<?php  echo $cert['img']; ?>" alt="img" class="td profile"></a>

                                                                            <?php

                                                                        }
                                                                            ?>
                    
                        </div>
                       <h3>account status :    <?php   if($x['status']==0)  { echo "deactivated  ";?><form action="view.php?id=<?php echo $_GET['id']?>" method="post"><button type="submit" name="act">activate</button> </form><?php  }
                                                            else {echo "activated";?><form action="view.php?id=<?php echo $_GET['id']?>" method="post"><button type="submit" name="deact">deactivate</button> </form> <?php   };?>
                       
                    
                       <input type="submit" name="sb">
                
                    </form>
                            <?php
                }
        else
        {
            echo "no data";
        }

    //form handler

        if(isset($_POST['sb']))
        {
        
            $sql5="UPDATE `members` SET `name` = '$_POST[nm]',
                                        `last_name` = '$_POST[lm]',
                                        `christ_name`='$_POST[cn]',
                                        `age`='$_POST[ag]',
                                        `phone`='$_POST[pn]',
                                        `email`='$_POST[em]',
                                        `gender`='$_POST[gen]',
                                        `address`='$_POST[addr]',
                                        `reg_date`='$_POST[rd]',
                                        `martial_stat`='$_POST[ms]',
                                        `role`='$_POST[role]'
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
            else
            {
                echo "error".$DBC->error;
            }

                //to update existing clergy  info

            if(isset($y['c_id']))
            {
               $sql6 = "UPDATE `clergy` SET `type`='$_POST[pos]' WHERE `c_id` = '$_GET[id]'" ;
               $result=$DBC->query($sql6);
               if($result)
               {
                    echo "success";
               }
               else
               {
                    echo "not success";
               }
            }

                //to insert new clergy or promoting

            else
            {
                $sql6 = "INSERT INTO `clergy` (`c_id`,`type`) VALUE('$_GET[id]','$_POST[pos]') ";
                $result=$DBC->query($sql6);
                if($result)
                {
                    echo "success";
                }
                else
                {
                    echo "not success";
                }
            }
        }
    //notify update succesful
        if(isset($_GET['up']))
        {
            echo "updated";
        }


        ?>
</div>

<!-- this is clerical detail information -->
<div class="content2 tb">
    
    <?php $sql = "SELECT * FROM `clergy` WHERE `c_id`=$_GET[id]";
    if($y['type']>0)
    {
        echo "<a href='update.php?id=".$x['id']."&uc=2'>------basic information----</a>";
    }
                                                 
    $result =$DBC->query($sql);
    if($result)
    {
        $y = $result->fetch_assoc();
        ?>
         <form action="update.php?uc=1&id=<?php  echo $_GET['id'];?>" method="post">

                <div class="tr">
                        <h3 class="td">annoitation date:</h3>
                        <input class="td" type="date" name="ad" id="ad" />
                </div>

                <div class="tr">
                    <h3 class="td">annoited by:</h3> 
                     <input class="td" type="text" name="ab" id="ab"/>
                </div>  

                <div class="tr"> 
                    <h3 class="td">on service date: </h3>
                    <input class="td" type="text" name="sd" id="sd"/>
                </div>

                <div class="tr"> 
                    <h3 class="td">served churches: </h3>
                    <textarea class="td" name="sc" id="sc" ></textarea>
                </div>

                <div class="tr">
                    <h3 class="td">education background: </h3>
                    <textarea class="td" name="eb" id="eb"></textarea >
                </div>

                <input type="submit" name="sb4">
        </form>

        <?php
        if(isset($y['c_id']))
        {
           
            if(isset($_POST['sb4']))
            {
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
        else
        {
                if(isset($_POST['sb4']))
                {
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


           
        }
    }
    else
    {
        echo "error".$DBC->error;
    }
    ?>
    
</div>

<?php 

//hiding and reavealing detail information and basic information
    if(isset($_GET['uc']))
    {
    
        if($_GET['uc']==1)
        {
                    ?>
            <style>
                .content
                {
                
                    display:none;
                }
                .content2
                {
                    display:block;
                }
            </style>
                    <?php

        }
        else
        {
                            ?>
            <style>
                .content
                {
                
                    display:block;
                }
                .content2
                {
                    display:none;
                }
            </style>
        
                    <?php  
        }
    }
/*--------------- redirecting for activation and deactivation --------------*/
    if(isset($_POST['act']))
    {
        $result =$DBC->query($sql2);
        if($result)
        {
             header("location:update.php?id=".$_GET['id']);
        }
       
    }

    if(isset($_POST['deact']))
    {
        $result =$DBC->query($sql3);
        if($result)
        {
            header("location:update.php?id=".$_GET['id']);
        }
    }
/* ------------------------------------------------------------------------------ */        
            ?>
      

<?php include(_private."/admin_share/footer.php");?>