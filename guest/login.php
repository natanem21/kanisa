<?php require_once("../private/shared/database.php");?>
<?php session_start();?>
<?php $title="login page";
$direct="<a href ='index.php'><img src='book.svg' alt='profile image' class='profile rect'>";
?>

<!-- login form -->

  <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title;?></title>
        <link rel="stylesheet" href="style/style.css">     
      </head>

      <body>  
          <div class="background-img"></div>
          <div class="container">
            <h2 class="welcome">WELCOME BACK</h2>
            <hr>
            <form action="login.php" method="post">

                    <div class="row">
                        <i class="fas fa-key"></i>
                        <input type="number" placeholder="ID" name="u_id">
                    </div>   

                    <div class="row">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="USERNAME OR EMAIL" name="un">
                    </div>

                    <div class="row">
                        <i class="fas fa-key"></i>
                        <input type="password" placeholder="PASSWORD" name="ps">
                    </div>

                    <div class="button">
                        <button type="submit" name="sb">LOGIN</button>
                    </div>

                    <div class="lastline">
                        <em>NOT A MEMBER ? </em>
                        <a href="req_membership.php">SIGN UP</a>
                    </div>
                    
            </form>
         </div>

 <!-- password checking  -->

<?php
if(isset($_POST['sb']))
{
      
  $sql = "SELECT * from `members` where `name`='$_POST[un]' and  `password` ='$_POST[ps]' and `id`='$_POST[u_id]'";
  $result =$DBC->query($sql);
  $chk = $result->fetch_assoc();

  if(is_null($chk))
  {
    echo "<h2 style='color:red'>there is no account associating with the credintial you inseted </h2>";
          
  }
  else
  {
         if($chk['status']==1)
            {
                $_SESSION['user'] = $_POST['un'];
                $_SESSION['pswd'] = $_POST['ps'];
                $_SESSION['id'] = $chk['id'];
                $_SESSION['role']=$chk['role'];
                if($chk['role']==0){
                header("location:../public/members/index.php");
                }
                else if($chk['role']==1)
                {
                  header("location:../private/secretary/index.php"); 
                }
                else if($chk['role']==2)
                {
                  header("location:../private/admin/index.php"); 
                }
                else if($chk['role']==3)
                {
                  header("location:../public/father/index.php");
                }
                else if($chk['role']==4)
                {
                  header("location:../public/teacher/index.php");
                }
                else{
                  header("location:index.php");
                }
            }
              else
              {
                ?>
                <script>
                  alert("dear user your application is on process please wait till you are approved")
                  </script>
                <?php
                
              }
            
  } 
           
           
}
   


?>
    <?php include("footer.php");?>