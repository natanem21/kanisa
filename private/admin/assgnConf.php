<?php include("../shared/init.php");?>
<?php include(_private."/admin_share/header.php");

  
$sql = "SELECT * FROM `request` WHERE `request_type`='confession father'";
$sql = "SELECT `id`,`name`,`date`,`request_type` FROM `members` JOIN `request` ON `user_id`=`id`  WHERE `request_type`='confession father'";
$sql2 = "SELECT `c_id`,`name` FROM `members` JOIN `clergy` ON `c_id`=`id` WHERE `type`>1";
$sql3 = "SELECT `id`,`name`,`date`,`request_type` FROM `members` JOIN `request` ON `user_id`=`id`  WHERE `request_type`='confession father' and `id`='$_GET[id] limit 1'";

$result = $DBC->query($sql);
$result2=$DBC->query($sql2);
$result3=$DBC->query($sql3);
?>
<div class="content3">
<table>
                <tr>
                    <td>id</id>
                    <td>name</id>
                    
                    <td>date</td>
                    
            </tr>
            </table>

        <?php
        echo "hey";
        if($result3)
        {
            $z = $result3->fetch_assoc()
        ?>
        <table>
            
        <tr class="info_row">
            <td>
                <?php echo $z['id']?>
            </td>
            <td>
                <?php echo $z['name']?>
            </td>
          
            
            
            <td>
                <?php echo $z['date']?>
            </td>
           
        
        </tr><br/>

        </table>
                <?php
        
        
        }
            ?>
   
</div>
<div class="content2">
            <table>
                <tr>
                    <td>id</id>
                    <td>name</id>
                    <td>request type</id>
                    <td>date</td>
                    <td>action</td>
            </tr>
            </table>

        <?php
        if($result)
        {
            echo "fineee";
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
                <?php echo $x['request_type']?>
            </td>
            
            
            <td>
                <?php echo $x['date']?>
            </td>
            <td><a href="assgnConf.php?id=<?php  echo $x['id'];?>&uc=1">assign</a></td>
        
        </tr><br/>

        </table>
                <?php
        
        }
        }
            ?>
</div>
<div class="content">
    <p>
        this will show all the requests from the members and assigns to the confessino fathers
    </p>
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