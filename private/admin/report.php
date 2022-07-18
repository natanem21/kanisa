<?php include("../shared/init.php");?>
<?php include(_private."/admin_share/header.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>report</title>
</head>
<body>
    <h1>
        this will generate both financial and personnel information in the church  </h1>
        <table>
 <tr>
            <td>
              ID    
            </td>
            <td>
                  NAME
            </td>
            <td>
                 CHRISTIAN NAME 
                  </td>
                  
                  <td>
                  PHONE NUMBER
                  </td>
                  <td>
                  position
                  </td>
                  <td>
                      session_status
                    </td>
                  <td>
                  more information
                  </td>
</table>

 </tr>
  
</body>
</html>
<?php

    $sql = "SELECT * from `members`";
    $result =$DBC->query($sql);
    if($result)
{

 while($x = $result->fetch_assoc())
 {?>
<table>
     
 <tr class="info_row">
      <td>
          <?php echo $x['id']?>
    </td>
    <td>
          <?php echo $x['name']?>
    </td>
    <td>
          <?php echo $x['christ_name']?>
    </td>
    
    
    <td>
          <?php echo $x['phone']?>
    </td>
    <td>
    <?php   if($x['clerical_pos']==1) {echo "non clergy";} elseif ($x['clerical_pos']==2) {echo "deacon";}elseif ($x['clerical_pos']==3) {echo "priest";}else 
  {echo "monk";};?>
    </td>
    <td>
          <?php echo $x['status']?>
    </td>
    <td><a href="../../public/members/profile/view.php?id=<?php  echo $x['id'];?>">detail information</a>
 </tr><br/>
 </table>
           <?php
  
 }
}
else{
    echo "no record";
}
?>
<?php include(_private."/admin_share/footer.php");?>