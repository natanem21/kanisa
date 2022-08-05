<?php include("../shared/init.php");?>
<?php include(_private."/admin_share/header.php");?>

      <div class="content">

            <h1>this will show members activate their account and deactivate their account </h1>
            <h1> this will also create and deactivate small groups</h1>

                  <table>
                        <tr>
                              <td> ID   </td>
                              <td>  NAME </td>
                              <td> CHRISTIAN NAME </td>
                              <td>  roles </td>
                              <td>  PHONE NUMBER </td>
                              <td>  update</td>
            

                        </tr>
                  </table>
      

<?php

            $sql = "SELECT * from `members`";
            $result =$DBC->query($sql);
            if($result)
                  {

                        while($x = $result->fetch_assoc())
                        {
                              
?>
                              <table>
                                    <tr class="info_row" >
                                          <td style="color:white;background-color:<?php if($x['status']==0){echo '#cc0000';} else{echo '#009973';}?>";> <?php echo $x['id']?> </td>
                                          <td><?php echo $x['name']?> </td>
                                          <td><?php echo $x['christ_name']?></td>
                                          <td><?php 
                                          if($x['role']==0)
                                          {
                                                echo "member";
                                          }
                                          else  if($x['role']==1)
                                          {
                                                echo "secretary";
                                          }
                                          else  if($x['role']==2)
                                          {
                                                echo "admin";
                                          }
                                          else  if($x['role']==3)
                                          {
                                                echo "father";
                                          }
                                          else  if($x['role']==4)
                                          {
                                                echo "teacher";
                                          }
                                         ?></td>
                                          <td><?php echo $x['phone']?></td>
                                           <td><a href="update.php?id=<?php  echo $x['id'];?>">update</a></td>
                                    </tr>
                                    <br/>

                              </table>
<?php
            
                        }
                        ?></div><?php
                  }
            else
                  {
                        echo "no record";
                  }
?>
      
<?php include(_private."/admin_share/footer.php");?>