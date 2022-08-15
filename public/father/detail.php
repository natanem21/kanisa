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
                        <div class="tr"> <h3  class="td">first name : </h3><input disabled  class="td" type="text" name="nm" value="<?php  echo $x['name'];?>"/></div>
                        <div class="tr"> <h3  class="td">last name : </h3><input disabled class="td" type="text" name="lm" value="<?php  echo $x['last_name'];?>"/></div>
                        <div class="tr"> <h3  class="td">christian name :</h3> <input disabled class="td" type="text" name="cn" value="<?php  echo $x['christ_name'];?>"/></div>
                        <div class="tr"> <h3  class="td">age :</h3> <input disabled class="td" type="date" name="ag" value="<?php  echo $x['age'];?>"/></div>
                        <div class="tr"> <h3  class="td">phone number : </h3><input disabled class="td" type="text" name="pn" value="<?php  echo $x['phone'];?>"/></div>
                        <div class="tr"> <h3  class="td">email : </h3><input disabled class="td" type="text" name="em" value="<?php  echo $x['email'];?>"/></div>
                        <div class="tr"> <h3  class="td">address : </h3><input disabled class="td" type="text" name="addr" value="<?php  echo $x['address'];?>"/></div>
                        <div class="tr"> <h3  class="td">registration date : </h3><input disabled class="td" type="date" name="rd" value="<?php  echo $x['reg_date'];?>"/></div>
                        <div class="tr"> <h3  class="td">gender :</h3>
                                    <select class="td" name="gen" disabled>
                                        <option value="0" <?php if($x['gender']==0){?>
                                                                selected="selected"<?php }?>>male</option>
                                        <option value="1"  <?php if($x['gender']==1){?>
                                                                selected="selected"<?php }?>>female</option>
                                                                
                                    </select>
                                    </div>
                       <div class="tr"> <h3  class="td">martial status :</h3><input disabled class="td" type="text" name="ms" value="<?php   if($x['martial_stat']==0) {echo "single";} elseif ($x['martial_stat']==1) {echo "married";}else {echo "divorced";};?>"/></div>
                       <div class="tr"><h3 class="td">position filled : </h3><span class="td"><?php   if($x['clerical_pos']==1) {echo "non-clergy";} elseif ($x['clerical_pos']==2) {echo "deacon";}elseif ($x['clerical_pos']==3) {echo "priest";}else {echo "monk";};?></span></div>
                       <div class="tr">  <h3  class="td">position in current church :</h3> 
                                                                                        <SELECT class="td" name="pos" disabled>
                                                                                            <option value="0"  <?php  if($y==NULL){?>selected="selected"<?php }?>>non clergy</option>
                                                                                            <option value="1" <?php if($y !=NULL){ if($y['type']==1){?>selected="selected"<?php }}?> >deacon</option>
                                                                                            <option value="2" <?php  if($y !=NULL){if($y['type']==2){?> selected="selected"<?php }}?> >priest</option>
                                                                                            <option value="3" <?php if($y !=NULL){ if($y['type']==3){?>selected="selected"<?php }}?>>monk</option>
                                                                                        </SELECT></div>
                                                                                                      
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
                      
                     
                
                    </form>
                            <?php
                }
        else
        {
            echo "no data";
        }

    
        ?>
</div>


<?php include(_private."/admin_share/footer.php");?>