<?php include("../../../private/shared/init.php");?>
<?php include(_shared."/header.php");?>
<?php
$sql = "SELECT * from `members` WHERE `id`=$_SESSION[id]";
$result =$DBC->query($sql); //members table
$x = $result->fetch_assoc();
?>
<div class="content">
 
    <div class="tb">
        <h2 class="tr">profile datail </h2>
        <div class="tr">
            <h3 class="td">first name : </h3>
            <input type="text" name="name" id="name" class="td" value="<?php  echo $x['name'];?>">
        </div>
        <div class="tr">
            <h3 class="td">last name : </h3>
            <input type="text" name="lname" id="lname" class="td" value="<?php  echo $x['last_name'];?>">
        </div>
        <div class="tr">
            <h3 class="td">christ name</h3>
            <input type="text" name="c_name" id="c_name" class="td" value="<?php  echo $x['christ_name'];?>">
        </div>
        <div class="tr">
            <h3 class="td">date of birth</h3>
            <input type="date" name="DOB" id="DOB" class="td" value="<?php  echo $x['age'];?>">
        </div>
        <div class="tr">
            <h3 class="td">phone number</h3>
            <input type="tel" name="phone" id="phone" class="td"  value="<?php  echo $x['phone'];?>">
        </div>
        <div class="tr">
            <h3 class="td">email</h3>
            <input type="email" name="email" id="email" class="td" value="<?php  echo $x['email'];?>">
        </div>
        <div class="tr">
            <h3 class="td">home address</h3>
            <input type="text" name="addr" id="addr" class="td" value="<?php  echo $x['address'];?>">
        </div>
        <div class="tr">
            <h3 class="td">gender</h3>
                <select class="td" name="gen">
                    <option value="0" <?php if($x['gender']==0){?>
                                            selected="selected"<?php }?>>male</option>
                    <option value="1"  <?php if($x['gender']==1){?> selected="selected"<?php }?>>female</option>
                 </select>
        </div>
        <div class="tr">
             <h3  class="td">martial status :</h3>
             <input class="td" type="text" name="ms" value="<?php   if($x['martial_stat']==0) {echo "single";} elseif ($x['martial_stat']==1) {echo "married";}else {echo "divorced";};?>"/>
        </div>
        <div class="tr">
            <h3 class="td">position filled : </h3>
            <input type="text" class="td" value="<?php   if($x['clerical_pos']==1) 
                                                            { echo 'non-clergy'; } 
                                                        elseif ($x['clerical_pos']==2) 
                                                            {echo 'deacon';}
                                                        elseif ($x['clerical_pos']==3)
                                                            {echo 'priest';} 
                                                        else 
                                                            {echo 'monk';}?>">
        </div>
                      
    </div>
</div>
<?php include(_shared."/footer.php");?>