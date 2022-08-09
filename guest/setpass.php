<?php require_once("../private/shared/database.php");?>
<?php session_start();?>
<?php 
if(!isset($new_id))
{
$new_id = 0;
}
if(isset($_POST['sb']))
{
  if(!isset($_POST['sb2']))
  {
    
    $folderLocation = "myFiles"; 
    $name = basename($_FILES["prof_img"]["name"]);
    for($x=0;$x<=$_POST["num_of_cert"];$x++)
    {
    $name2[]= basename($_FILES["certificate$x"]["name"]);
    }
    // if the folder doesn't exist then make it
    if (!file_exists($folderLocation)) mkdir($folderLocation);
    // move the file into the folder

    move_uploaded_file($_FILES["prof_img"]["tmp_name"], "$folderLocation/" .$name);
    for($x=0;$x<=$_POST["num_of_cert"];$x++)
    {
    move_uploaded_file($_FILES["certificate$x"]["tmp_name"], "$folderLocation/" .$name2[$x]);
  }
    $sql = " INSERT INTO 
      members(`name`,`last_name`,`christ_name`,`img`,`age`,`gender`,`phone`,`address`,`email`,`martial_stat`,`clerical_pos`,`status`,`job`)
      VALUES('$_POST[u_name]','$_POST[l_name]','$_POST[c_name]','$name','$_POST[age]','$_POST[gender]','$_POST[phone_addr]','$_POST[home_addr]','$_POST[email_addr]','$_POST[martial]','$_POST[position]',0,'$_POST[job]')";
  
    
      if($DBC->query($sql))
      {
        global  $new_id;
        $new_id=mysqli_insert_id($DBC);
          echo " your id is ".$new_id;
                  for($x=0;$x<=$_POST["num_of_cert"];$x++)
                    {
                        $sql2 = "INSERT INTO `certificate`(`mem_id`,`img`)
                                    VALUE('$new_id','$name2[$x]')";
                        $ew=$DBC->query($sql2);
                    }
      }
    else
      {
          echo "error: ".$DBC->error;
      } 
  }
 $title="set password";
 $direct="<a href ='index.php'><img src='book.svg' alt='profile image' class='profile rect'>";   
 
 ?>
 <link rel="stylesheet" href="style/style.css">
 <!-- login form -->
                 <!DOCTYPE html>
                 <html lang="en">
                 <head>
                     <meta charset="UTF-8">
                     <meta http-equiv="X-UA-Compatible" content="IE=edge">
                     <meta name="viewport" content="width=device-width, initial-scale=1.0">
                     <title><?php echo $title;?></title>
                     <link rel="stylesheet"  href="style.css">      
                 </head>
 
                 <body>  
 
 
 
 <script>
  
    function validate()
    {
         var x = document.forms["myForm"]["un"].value;
         var y = document.forms["myForm"]["ps"].value;
         if (x != y) {
           alert("password must be simmilar");
           return false;
         }
 
     }
 </script>
 
 <div class="background-img"></div>
     
     <div class="container">
         <h2 class="welcome" id="hdr">set password</h2>
         <hr>
     <form action="setpass.php" method="post" name="myForm" id="mf" onsubmit="return validate()">
         <div class="row">
             <i class="fas fa-user"></i>
             <input type="password" placeholder="new password" name="un" required>
         </div>
         <div class="row">
             <i class="fas fa-key"></i>
             <input type="password" placeholder="re enter your password" name="ps" required>
             <input type="text" value="" name="sb" style="display:none;">
             <input type="text" value="<?php echo "$new_id";?>" name="id" style="display:none;">
         </div> 
         <div class="button">
             <button type="submit" name="sb2" >set</button>
         </div>
         
     </form>
     <div class="button" id="btn2" style="display:none">
          <a href="index.php"> <button type="submit">back to home page</button></a>  
         </div>
     </div>
 
  <!-- password checking  -->
 
 <?php
 if(isset($_POST['sb2']))
 {
 
   $sql = "UPDATE  `members` SET  `password` = '$_POST[un]' WHERE `id`='$_POST[id]'";
   $result =$DBC->query($sql);
 
     if($result)
     {
      
      ?>
 <script>
   document.getElementById("mf").style="display:none";
   document.getElementById("btn2").style="display:block";
   document.getElementById("hdr").innerHTML="you have succesfully set your password please wait till your account is approved by admin";
   document.getElementById("hdr").style="color:green";
 </script>
      <?php
     }
     else
     {
       echo "error: ".$DBC->error;
     } 
 }
}
 ?>

    <?php include("footer.php");?>