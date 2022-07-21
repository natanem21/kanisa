<?php include("../shared/init.php");?>
<?php include(_private."/admin_share/header.php");?>
<div class="content">
     <h1>
        this will show members activate their account and deactivate their account
    </h1>
    <h1>
        this will also create and deactivate small groups
    </h1>
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
                        <td>
                        update
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
    <td><a href="../../public/members/profile/view.php?id=<?php  echo $x['id'];?>">detail information</a></td>
    <td><a href="update.php?id=<?php  echo $x['id'];?>">update</a></td>
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