<?php include("../../../private/shared/init.php");?>
<?php include(_shared."/header.php");?>

<div class="content" style="backgroundcolor:green">

    <h1 style="background-color:green">service request</h1>

    <div style="background-color:#6666">

        <ul>
            <li id="b">baptism</li>
        </ul>

        <ul>
            <li id="m">memorial</li>
        </ul>

        <ul>
            <li id="how">holy water</li>
        </ul>

        <ul>
            <li id="cf">confession father</li>
        </ul>

    </div>

<?php 
    $baptism = new Baptism();
    $baptism->Values();
?>
        <div id="mem">
            <form action="req_services.php" method="post">
            <lable>name of the person to be memorized</label><br/>
            <input type="text" name="nm"><br/> </hr>
            <lable>christ name of the person</label><br/>
            <input type="text" name="cm"><br/> </hr>
            <lable>date of memorial</label><br/>
            <input type="text" name="dm"><br/> </hr>
            <lable>adddress</label><br/>
            <input type="text" name="addr"><br/> </hr>
            <input type="submit" value="send request" name="sb2">
            </form>
        </div>

        <div id="hw">
            <form action="req_services.php" method="post">
                <lable>adddress</label><br/>
                    <input type="text" name="addr"><br/> </hr>
                <lable>date</label><br/>
                    <input type="text" name="dt"><br/> </hr> 
                
                <lable>reason</label><br/>
                    <input type="text" name="rsn"><br/> </hr>
                    <input type="submit" value="send request" name="sb3">
            </form>
        </div>

        <div id="conf">

        </div>

        <!--  tabs emulation -->
        <script>

            //this script is for hiding and revealing the contenets to make it like a link

            const bapt = document.getElementById('b');
            const mem = document.getElementById('m');
            const h = document.getElementById('how');
            const c = document.getElementById('cf');
            const content = document.getElementById('bap');
            const content2 = document.getElementById('mem');
            const content3 = document.getElementById('hw');
            const content4 = document.getElementById('conf');
            content2.style.display="none";
            content3.style.display="none";
            content4.style.display="none";

            bapt.addEventListener('click', () => {
                content.style.display="block";
                content2.style.display="none";
                content3.style.display="none";
                content4.style.display="none";
                
            });
            mem.addEventListener('click', () => {
                content.style.display="none";
                content3.style.display="none";
                content2.style.display="block";
                content4.style.display="none";
                
            });
            h.addEventListener('click', () => {
                content2.style.display="none";
                content.style.display="none";
                content3.style.display="block";
                content4.style.display="none";
                
            });
            c.addEventListener('click', () => {
                content2.style.display="none";
                content.style.display="none";
                content3.style.display="none";
                content4.style.display="block";
                
            });

        </script>
        
</div>
<?php
//baptism request



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
    <?php
//memorial request

if(isset($_POST['sb2']))
{
  $sql = "INSERT INTO `request` ( `user_id`,`christ_name`, `request_type`, `date`, `service_customer`) 
                    VALUES ('$_SESSION[id]','$_POST[cm]', 'memorial', '$_POST[dm]', '$_POST[nm]');";
  $result =$DBC->query($sql);

    if($result)
    {
       echo "added succesfully"; 
    }
    else
    {
      echo "error: ".$DBC->error;
    } 
  //$_SESSION['user'] = " boom this is";
}

//holy water request

if(isset($_POST['sb3']))
{
  $sql = "INSERT INTO `request` ( `user_id`, `request_type`, `date`, `reason`) 
                    VALUES ('$_SESSION[id]', 'holy water', '$_POST[dt]', '$_POST[rsn]');";
  $result =$DBC->query($sql);

    if($result)
        {
        echo "added succesfully"; 
        }
    else
        {
        echo "error: ".$DBC->error;
        } 
  //$_SESSION['user'] = " boom this is";
}
   

?>
    
<?php include(_shared."/footer.php");?>