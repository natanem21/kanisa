<?php include("../../../private/shared/init.php");?>
<?php include(_shared."/header.php");?>
<?php
$sql = "SELECT * from `members` WHERE `id`=$_SESSION[id]";
$result =$DBC->query($sql); //members table
$x = $result->fetch_assoc();
?>
<div class="content">
    <form action="view.php" method="post" enctype="multipart/form-data">
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
                <h3 class="td">password</h3>
                <input type="password" name="pswd" id="pswd" class="td" value="<?php  echo $x['password'];?>">
            </div>
            <div class="tr">
                <h3 class="td">profile image:</h3>
                <input type="file" name="pro_img" id="pro" class="td" accept="images/*">
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
                <h3 class="td">job</h3>
                <input type="text" name="job" id="job" class="td"  value="<?php  echo $x['job'];?>">
            </div>
            <div class="tr">
                <h3 class="td">position filled : </h3>
                <select name="cl_pos" id="cler_pos" class="td">
                    <option value="1" <?php  if($x['clerical_pos']==1) {  ?>selected <?php } ?>>non clergy</option>
                    <option value="2"<?php  if($x['clerical_pos']==2) { ?> selected <?php } ?>>deacon</option>
                    <option value="3"<?php  if($x['clerical_pos']==3) { ?>selected<?php } ?>>priest</option>
                    <option value="4"<?php  if($x['clerical_pos']==4) { ?>selected<?php } ?>>monk</option>
                </select> 
            <input type="submit" value="edit" class="td" name="edit">
                        
        </div>
    </form>
</div>
<?php
if(isset($_POST["edit"]))
{
     
    if($_FILES["pro_img"]["name"]==null)
    {
        $sql="UPDATE `members` SET  `name`='$_POST[name]',
        `last_name`='$_POST[lname]',
        `christ_name`='$_POST[c_name]',
        `clerical_pos`='$_POST[cl_pos]',
        `age`='$_POST[DOB]',
        `password` = '$_POST[pswd]',
        `gender`='$_POST[gen]',
        `phone`='$_POST[phone]',
        `address`='$_POST[addr]',
        `email`='$_POST[email]',
        `martial_stat`='$_POST[ms]',
        `job`='$_POST[job]'
         WHERE `id`='$_SESSION[id]'";   
       
    }
    else{

        $folderLocation = "../../../guest/myFiles"; 
        if (!file_exists($folderLocation)) mkdir($folderLocation);
    
        $name = basename($_FILES["pro_img"]["name"]);
        move_uploaded_file($_FILES["pro_img"]["tmp_name"], "$folderLocation/" .$name);
        $sql="UPDATE `members` SET  `name`='$_POST[name]',
        `last_name`='$_POST[lname]',
        `christ_name`='$_POST[c_name]',
        `img`='$name',
        `clerical_pos`='$_POST[cl_pos]',
        `age`='$_POST[DOB]',
        `password` = '$_POST[pswd]',
        `gender`='$_POST[gen]',
        `phone`='$_POST[phone]',
        `address`='$_POST[addr]',
        `email`='$_POST[email]',
        `martial_stat`='$_POST[ms]',
        `job`='$_POST[job]'
         WHERE `id`='$_SESSION[id]'";  
     }
   

  
    $DBC->query($sql);
    header("location:view.php");
}
?>
<?php include(_shared."/footer.php");?>