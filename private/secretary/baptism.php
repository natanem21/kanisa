<?php include("../shared/init.php");?>
<?php include(_private."/sec_share/header.php");?>


  <div class="content">
  <h1>this register new baptism</h1>
    <form action="baptism.php" method="post">
    <?php
      $baptism = new Baptism();
      $baptism->Values();
    ?>
    </form>
    <?php
    if(isset($_POST['sb1']))
                {
                    $sql = "INSERT INTO `request` ( `user_id`, `request_type`, `sex`, `DOB`, `place_of_birth`,`service_customer`,`reason`) 
                                VALUES ('$_SESSION[id]', 'baptism', '$_POST[sx]', '$_POST[dob]', '$_POST[pob]','$_POST[nm]','$_POST[rm]');";
                    $result =$DBC->query($sql);

                        if($result)
                        {
                        
                        }
                        else
                        {
                        echo "error: ".$DBC->error;
                        } 

                }
      ?>
  </div>
<?php include(_private."/sec_share/footer.php");?>
