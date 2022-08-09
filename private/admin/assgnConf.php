<?php include("../shared/init.php");?>
<?php include(_private."/admin_share/header.php");

  
$sql = "SELECT * FROM `request` WHERE `request_type`='confession father'";
$sql = "SELECT `Request_id`,`id`,`name`,`date`,`request_type` FROM `members` JOIN `request` ON `user_id`=`id`  WHERE `request_type`='confession father'";
$sql2 = "SELECT `c_id`,`name` FROM `members` JOIN `clergy` ON `c_id`=`members`.`id` WHERE `type`>1";
if(isset($_GET['id'])){
$sql3 = "SELECT `id`,`name`,`date`,`request_type` FROM `members` JOIN `request` ON `user_id`=`id`  WHERE `request_type`='confession father' and `id`='$_GET[id] limit 1'";
$result3=$DBC->query($sql3);
}
$result = $DBC->query($sql);
$result2=$DBC->query($sql2);

?>
<!-- the inforamtion of the person requested the service content 3  -->
    <div class="content3">
        <h3>the person requested service</h3>
            <?php
            
            if($result3)
            {
                    $z = $result3->fetch_assoc()
                ?>
                <dl>
                    <dt> id:
                        <?php echo $z['id']?>
                    <dt> name:
                    <?php echo $z['name']?>
                    </dt>
                    <dt> req date:
                    <?php echo $z['date']?>
                    </dt>
                </dl>
                <br/>
                <?php
                
            
            }
            $sql5="SELECT *FROM `clergy_father` WHERE `m_id`='$_GET[id]'";
           
            $result5 = $DBC->query($sql5);
           
            if($result5){
                $x=$result5->fetch_assoc();
                if($x!=NULL){
                    $sql7 = "SELECT `name` FROM `members` WHERE `id`='$x[c_id]'";
                    $result7 = $DBC->query($sql7);
                    $y=$result7->fetch_assoc();
                echo "<span style='color:red'>has been assigned to name :</span>".$y['name']."</br>";
               
                }
                else{

                }
            }
                ?>
    
    </div>

<!-- all the requested service for father assignment content 2 -->
    <div class="content2">
        
                <table>
                    <tr>
                        <td>request id</td>
                        <td>member id</id>
                        <td>name</id>
                        <td>request type</id>
                        <td>date</td>
                        <td>action</td>
                        <td>status</td>
                </tr>
                </table>

            <?php
            if($result)
            {
                
                 
                 while($x = $result->fetch_assoc())
            {
                       
                    ?>
                    <table>
                        
                    <tr class="info_row">
                        <td>
                            <?php echo $x['Request_id']?>
                        </td>    
                        <td>
                            <?php echo $x['id']?>
                        </td>    
                    
                        <td>
                            <?php echo $x['name']?>
                        </td>
                        <td>
                            <?php echo $x['request_type']?>
                        </td>
                        
                        
                        <td>
                            <?php echo $x['date']?>
                        </td>
                        <td>
                            <a href="assgnConf.php?id=<?php  echo $x['id'];?>&uc=1">assign</a>
                            <a href="assgnConf.php?id=<?php  echo $x['id'];?>&uc=2&rid=<?php  echo $x['Request_id'];?>">delete</a>
                            
                        </td>
                    
                    

                
                            <?php
                    $sql5="SELECT * FROM `clergy_father` WHERE `m_id`='$x[id]'";
                    $result5 = $DBC->query($sql5);
                        if($result5)
                        {
                                $x2=$result5->fetch_assoc();
                                if($x2!=NULL)//check if the person has been assigned
                                {
                                //the above code findes who is the c.father of this person
                                    /* $sql6 = "SELECT * FROM `members` WHERE `id`=$x[c_id]";
                                    $result6=$DBC->query($sql6);
                                    if($result6){
                                    $y = $result6->fetch_assoc();
                                    echo "<span style='color:white'>you have been assigned to name :</span>".$y['name']."</br>";
                                    echo "address: ".$y['address']."</br>";
                                    echo "phone number: ".$y['phone'];
                                } */
                                ?> <td>
                            has been assigned
                            </td><br/><?php
                                
                                }
                            
                                else{// if the person is not assigned
                            ?> <td>
                        not assigned
                        </td><br/><?php
                                }
                        }
                        ?></tr> </table><?php
            }
           
            }
                ?>
    </div>
<!-- list of all clergies above than deacon  content-->
    <div class="content">
        <p>
            this will show all the requests from the members and assigns to the confessino fathers
        </p>
        <h3>available church fathers to be assigned</h3>
        <table>
                    <tr>
                        <td>id</id>
                        <td>name</id>
                        <td>action</td>
                </tr>
                </table>

            <?php
            if($result2)
            {
                
                while($y = $result2->fetch_assoc())
            {?>
            <table>
                
            <tr class="info_row">
                <td>
                    <?php echo $y['c_id']?>
                </td>
                <td>
                    <?php echo $y['name']?>
                </td>
                
                <td><a href="assgnConf.php?id=<?php  echo $_GET['id']?>&uc=1&ac=<?php echo $y['c_id']?>">assign</a></td>
            
            </tr><br/>

            </table>
                    <?php
            
            }
            }
            else{
                echo "error".$DBC->error;
            }
                ?>

    </div>

<?php
if(isset($_GET['ac']))
{
    
    
       
        $sql4 = "INSERT INTO `clergy_father`(`c_id`,`m_id`) VALUE('$_GET[ac]','$_GET[id]')";
        $sql5="SELECT *FROM `clergy_father` WHERE `m_id`='$_GET[id]'";
        $result5 = $DBC->query($sql5);
        if($result5){
            $x=$result5->fetch_assoc();
            if($x!=NULL){
            echo "<span style='color:red'>has been assigned</span>";
            }
            else{
                $result4 = $DBC->query($sql4);
                if($result4)
                {
                    echo "this priest has been assigned to this man";
                }
                else{
                    echo "error".$DBC->error;
                }
            }
        }
       
    
}
if(isset($_GET['uc']))
{
    if($_GET['uc']==1){
    ?>
    <style>
  .content2{
        display:none;
    }
    .content{
        display:block;
    }
    .content3{
        display:block;
    }
    </style>
    <?php
    }
    if($_GET['uc']==2)
    {?>
            <style>
                .content2{
                    display:block;
                }
                .content{
                    display:none;
                }
                .content3{
                    display:none;
                }
                
            </style>
    <?php
        $sql8 = "DELETE FROM `request` WHERE `Request_id`=$_GET[rid]";
        $result8 = $DBC->query($sql8);
        if($result8){
            echo "this has  been deleted from request";
            header("location:assgnConf.php");
        }
    }
}
if(!isset($_GET['uc']))
{
    ?>
    <style>
    .content{
        display:none;
    }
    .content3{
        display:none;
    }
    
    </style>
    <?php
}
include(_private."/admin_share/footer.php");?>