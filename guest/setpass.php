<?php require_once("../private/shared/database.php");?>
<?php session_start();?>
<?php 
if(isset($_POST['sb']))
{
    $sql = " INSERT INTO 
    members(`name`,`christ_name`,`age`,`gender`,`phone`,`address`,`email`,`martial_stat`,`clerical_pos`,`status`)
     VALUES('$_POST[u_name]','$_POST[c_name]','$_POST[age]','$_POST[gender]','$_POST[phone_addr]','$_POST[home_addr]','$_POST[email_addr]','$_POST[martial]','$_POST[position]',0)";
    if($DBC->query($sql))
{
    echo " data added succesfully ";
    
}
else{
    echo "error: ".$DBC->error;
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
    alert("work1");
   function validate(){
        var x = document.forms["myForm"]["un"].value;
        var y = document.forms["myForm"]["ps"].value;
  if (x != y) {
    alert("password must be simmilar");
    return false;
  }
  else{
    return true;
  }
    }
    </script>



<div class="background-img"></div>
    
    <div class="container">
        <h2 class="welcome">set password</h2>
        <hr>
    <form action="setpass.php" method="post" name="myForm" onsubmit="return validate()">
        <div class="row">
            <i class="fas fa-user"></i>
            <input type="password" placeholder="new password" name="un" required>
        </div>
        <div class="row">
            <i class="fas fa-key"></i>
            <input type="password" placeholder="re enter your password" name="ps" required>
        </div> 
        <div class="button">
            <button type="submit" name="sb2" >set</button>
        </div>
        
    </form>
    </div>

 <!-- password checking  -->

<?php
if(isset($_POST['sb2']))
{
  $sql = "UPDATE TABLE  `members` SET  `password`='$_POST[un]' WHERE `id`=''";
  $result =$DBC->query($sql);

    if($result)
    {
      while($x = mysqli_fetch_assoc($result))
         {
            if($x['status']==1)
            {
              echo "loged";
              $_SESSION['user'] = $_POST['un'];
              $_SESSION['pswd'] = $_POST['ps'];
              $_SESSION['id'] = $x['id'];
              header("location:../public/members/index.php");
            }
            else
            {
              echo "<h2 style='color:red'>dear user your application is on process 
              <span style='color:green'>please wait till you are approved</span></h2>";
            }
          }
    }
    else
    {
      echo "error: ".$DBC->error;
    } 
  //$_SESSION['user'] = " boom this is";
}
  }  ?>
    <?php include("footer.php");?>