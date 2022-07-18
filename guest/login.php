<?php require_once("../private/shared/database.php");?>
<?php session_start();?>
<?php $title="login page";
$direct="<a href ='index.php'><img src='book.svg' alt='profile image' class='profile rect'>";
include("header.php");
?>

<!-- login form -->

<div class="c2">
    <h1>login page</h1>
    <form action="login.php" method="post" >
      <label for="un">user name </label> 
         <input type="text" name = "un"><br/><br/>
      <label for="ps"> password </label>
         <input type="password" name="ps"><br/>
       <input type="submit" value="login" name="sb" style="background-color:green"><br/></br/>   
    </form>
 </div>

 <!-- password checking  -->

<?php
if(isset($_POST['sb']))
{
  $sql = "SELECT * from `members` where `name`='$_POST[un]' and  `password` ='$_POST[ps]'";
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
    ?>
    <?php include("footer.php");?>