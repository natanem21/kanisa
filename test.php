
<?php
/* forget password */
        /* if(isset($_POST["forg"])){
            ?>
          

          <!DOCTYPE html>
        <html lang="en">

        <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>GC-Students of GONDAR</title>

          <!--
            - favicon
          -->
          <link rel="shortcut icon" href="./assets/images/logo.ico" type="image/x-icon">

          <!--
            - custom css link
          -->
          <link rel="stylesheet" href="./assets/css/style.css">

          <!--
            - google font link
          -->
          <link rel="preconnect" href="https://fonts.googleapis.com">
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
          <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
        </head>

        <body>
        <main>


        <!--
          - #main-content
        -->

        <div class="main-content">

          <article class="about  active" data-page="about">



            
        

            <header>
              <h2 class="h2 article-title">forget password</h2>
            </header>

          
            <section class="contact-form">

              <h3 class="h3 form-title" id="m">inset your id number</h3>

              <form action="forget.php" method="POST" class="form" id="f" data-form enctype="multipart/form-data">

                <div class="input-wrapper">
                <input type="text" name="id" class="form-input" placeholder="ID" required data-form-input>    
                <input type="text" name="r_id" class="form-input" placeholder="reset id sent for you"  data-form-input>    
                  
            </div>
                <input type="text" name="forg" style="display:none">
                <button class="form-btn" type="submit" name="sbl" data-form-btn style="float:left">
                  <ion-icon name="paper-plane"></ion-icon>
                  <span>reset password</span>
                </button>
              
                
              </form>
            
          

              <?php
        if(isset($_POST['sbl']))

        {
                $sql = "SELECT   `email` FROM `user` where `id`='$_POST[id]'";
                $result = $DBC->query($sql);
                
            if($result)
            {
                    $log = mysqli_fetch_assoc($result);
                    $reset_key=mt_rand(1234,9876);
              
                if(!is_null($log))
                {

                    $sql="SELECT * FROM `reset` WHERE `u_id` = '$_POST[id]'";
                    $result = $DBC->query($sql);
                    $req_person = mysqli_fetch_assoc($result);
                    if(is_null($req_person))
                    {
                        $sql = "INSERT INTO `reset`  VALUE('$_POST[id]','$reset_key')";
                        $result = $DBC->query($sql);
                                        
                        $to  = '$log[email]';
                        $subject = 'Reseting key for your account';
                        $message = '<html><body><p><b>Dear user recently there were a password request for your account .</b></p><p><i>use this key to reset KEY='.$reset_key.'</i></p></body></html>';
                        $headers = implode("\r\n", [
                        "From: Estfanos Abebaw <estifanos@tewahido1.com>",
                        "Reply-To: estifanos@tewahido1.com",
                        "MIME-Version: 1.0",
                        "Content-Type: text/html; charset=UTF-8"]);

                        $x=mail($to, $subject, $message, $headers);
                        if($x)
                        {
                            echo "done";
                        }
                        else
                        {
                            echo "not sent";
                        }

                    }
                    else
                    {
                    ?>
                    <script>
                    alert("dear! we just have sent you email wait a bit and insert the code from your email");
                    </script>
                  <span class="f">
                    <?php
                        echo "<span id='s'style='color:white'>check your email we have just sent an email to ".$log["email"]."</span";?></span><?php
                    }       
                }
                else
                {     ?>
                        <script>
                        alert("dear! there is no account associating with the id you have inserted for more information contact the admins at estifanos@tewahido1.com");
                        </script>
                    
                    <?php
                }
            }
            else
            {
            echo "incorrect";
            }
        if(($_POST["r_id"])!=NULL)
        {

            $sql="SELECT * FROM `reset` WHERE `u_id` = '$_POST[id]' and `r_id`='$_POST[r_id]'";
            $result = $DBC->query($sql);
            $req_person = mysqli_fetch_assoc($result);
            if(is_null($req_person))
            {
                    ?>
                        <script>
                        alert("dear! the reset key you have inserted is incorrect please check email again for additional support please email us at estifanos@tewahido1.com");
                        </script>
                    
                    <?php
                
            }
            else
            {
              $_SESSION["id"] = $_POST["id"];
                ?>
            
                <script>
                    document.getElementById("m").innerHTML="set new password";
                    document.getElementById("m").style="color:red";
                    document.getElementById("f").style="display:none";
                    document.getElementById("s").innerHTML="";
                </script>
            
        <form action="setpass.php" method="post">
        <div class="input-wrapper r">
            <input type="password" name="nwpss" class="form-input" placeholder="new password"  data-form-input>    
            <button class="form-btn" type="submit" name="sb3" data-form-btn style="float:left">
                  <ion-icon name="paper-plane"></ion-icon>
                  <span>reset</span>
                </button>
            </div>

        </form>
                <?php
            }

        }
              
        }
              /* 

        {

        } */
        /* ?>
            </section>

          


          </article>

        
        </div>

        </main>
            <?php
        }
        else{
            header("location:login.php");
        } */ 


?>
<?php
$x="con";
for ($i=0; $i <2 ; $i++)
 { 
  $x.$i = 10;
  $y=20;
}

$z= $x0.$y;
echo $z;
?>
<!-- checking if the user exist on the system and send email  -->

<!-- checkng the credintial send to the customer withe the dataabse and if match prompt to setpass -->

