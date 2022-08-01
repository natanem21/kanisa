<?php require_once("../private/shared/database.php");?>
    <?php session_start();?>
    <?php $title="login page";
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
<div class="background-img"></div>
<form action="login.php" method="post" class="con">
    <div class="container">
        <h2 class="welcome">WELCOME BACK</h2>
        <hr>
 
        <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="USERNAME OR EMAIL" name="un">
        </div>
        <div class="row">
            <i class="fas fa-key"></i>
            <input type="password" placeholder="PASSWORD" name="ps">
        </div>
        <div class="forget">
            <a href="#">FORGET PASSWORD?</a>    
        </div>
        
        <div class="button">
            <button type="submit" name="sb">LOGIN</button>
        </div>
        <div class="lastline">
            <em>NOT A MEMBER ? </em>
            <a href="req_membership.php">SIGN UP</a>
        </div>
   
    </div>
    <div class="container2">
    <h2 class="welcome">WELCOME BACK</h2>
        <hr>
    
        <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="USERNAME OR EMAIL" name="un">
        </div>
        <div class="row">
            <i class="fas fa-key"></i>
            <input type="password" placeholder="PASSWORD" name="ps">
        </div>
        <div class="forget">
            <a href="#">FORGET PASSWORD?</a>    
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