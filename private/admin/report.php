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
        this will generate both financial and personnel information in the church
    </h1>
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
          <?php echo $x['gender']?>
    </td>
    <td>
          <?php echo $x['age']?>
    </td>
    <td>
          <?php echo $x['phone']?>
    </td>
    <td>
          <?php echo $x['clerical_pos']?>
    </td>
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