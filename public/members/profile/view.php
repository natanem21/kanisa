<?php include("../../../private/shared/init.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>personal profile</title>
</head>
<body>
<?php

$sql = "SELECT * from `members` WHERE `id`=$_GET[id]";
$sql2="UPDATE `members` SET `status` = '1' WHERE `members`.`id` = $_GET[id]";
$sql3="UPDATE `members` SET `status` = '0' WHERE `members`.`id` = $_GET[id]";
$result =$DBC->query($sql);
if($result)
{
     $x = $result->fetch_assoc();
  
/* }
else {
    echo "not worked";
}  */
?>
 <!--   <a href="index.php" class="">back to main</a> -->
  <!--  <div class="new">
       <h1>edit  account</h1>
       <form action="" method="post">
           <dl>
               <dt>name : </dt>
               <dd>
                   <input type="text" name="manu_name" id="">
               </dd>
           </dl>
           <dl>
               <dt>position</dt>
               <dd>
                   <select name="position" id="">
                       <option value="1">one</option>
                        <option value="2">two</option>
                   </select>
               </dd>
           </dl>
           <dl>
               <dt>visible</dt>
               <dd>
                   <input type="hidden" name="visible" value="0">
                   <input type="checkbox" name="visible" value="1"></dd>
           </dl>
           <div id="operation"> 
               <input type="submit" value="create">
           </div>
       </form>
   </div>  -->


  <center> <h1>profile detail</h1></center>
  <h3>id : </name><?php  echo $x['id'];?>
  <h3>name : </name><?php  echo $x['name'];?>
  <h3>christian name : </name><?php  echo $x['christ_name'];?>
  <h3>age : </name><?php  echo $x['age'];?>
  <h3>gendr : </name><?php  if($x['gender']==0) {echo "male";} else{echo "female";};?>
  <h3>martial status : </name><?php   if($x['martial_stat']==0) {echo "single";} elseif ($x['martial_stat']==1) {echo "married";
      # code...
  }else 
  {echo "divorced";};?>

  <h3>position : </name><?php   if($x['clerical_pos']==1) {echo "non clergy";} elseif ($x['clerical_pos']==2) {echo "deacon";}elseif ($x['clerical_pos']==3) {echo "priest";}else 
  {echo "monk";};?>

<h3>account status : </name><?php   
            if($x['status']==0) 
            {
                echo "deactivated  ";
             ?>
             <form action="view.php?id=<?php echo $_GET['id']?>" method="post">
                 <button type="submit" name="act">activate</button>

            </form>
 <?php   
            } 
            else {echo "activated";
            
            
            ?>
            <form action="view.php?id=<?php echo $_GET['id']?>" method="post">
                <button type="submit" name="deact">deactivate</button>

           </form>
<?php   };
            if(isset($_POST['act']))
            {
                $result =$DBC->query($sql2);
                if($result)
                {
                    //echo "worked";
                    header("location:view.php?id=".$_GET['id']);
                }
                else{
                    echo "not worked";
                }


            }
            if(isset($_POST['deact']))
            {
                $result =$DBC->query($sql3);
                if($result)
                {
                    //echo "worked";
                    header("location:view.php?id=".$_GET['id']);
                }
                else{
                    echo "not worked";
                }


            }
            ?>

   <?php

   }
   
   
   else{
       echo "error in loading the page.";
   }
   ?>
   

</body>
</html>
<?php

?>