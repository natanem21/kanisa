<?php include("../../../private/shared/init.php");?>
<?php include(_shared."/header.php");
 $date = new DateTime();
 $now = date('Y-m-d ', $date->getTimestamp());
?>

        <!-- content of request -->
            <div class="content" style="backgroundcolor:green">
            <p>the problem is when the input is taken to the database special keys interpreted different ways like '</p>
                <h1 style="background-color:#7f34">request service</h1>

        <!-- tabs  -->
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
                <ul>
                    <li id="lr">leaving request</li>
                </ul>

            </div>

        <!-- baptism  request  by creating object from class -->
            <?php 
                $baptism = new Baptism();
                $baptism->Values();
            ?>
        <!-- memorial request form -->
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

        <!-- holy water request form -->
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

        <!-- confession father request form -->
                <div id="conf">
                    <?php
                    $sql5="SELECT * FROM `clergy_father` WHERE `m_id`='$_SESSION[id]'";

                    $result5 = $DBC->query($sql5);
                    if($result5){
                        $x=$result5->fetch_assoc();
                        if($x!=NULL)//check if the person has been assigned
                        {
                            $sql6 = "SELECT * FROM `members` WHERE `id`=$x[c_id]";
                            $result6=$DBC->query($sql6);
                            
                            if($result6){
                                $y = $result6->fetch_assoc();
                        echo "<span style='color:white'>you have been assigned to name :</span>".$y['name']."</br>";
                        echo "address: ".$y['address']."</br>";
                        echo "phone number: ".$y['phone'];
                            }
                        
                        }
                        else{
                    ?>
                    <form action="req_services.php" method="post">
                        <lable>adddress</label><br/>
                            <input type="text" name="addr"><br/> </hr>
                        
                        <lable>reason</label><br/>
                            <input type="text" name="rsn"><br/> </hr>
                            <input type="submit" value="send request" name="sb4">

                    </form>
                    <?php }}?>
                </div>
        <!-- leaving request request form --> 
                <div id="leav">
                        <form action="req_services.php" method="get">
                            where are you leaving: <input type="text" name="ptg"></br>
                            reason you are leaving: <input type="textarea" name="rol"></br>
                            time you leave : <input type="date" name="lt" ></br> 
                            <input type="submit" value="submit" name="sb9">
                        </form>
                </div>
        <!-- tabs simulation -->
            <script>

                const bapt = document.getElementById('b');
                const mem = document.getElementById('m');
                const h = document.getElementById('how');
                const c = document.getElementById('cf');
                const leaving = document.getElementById('lr');
                const content = document.getElementById('bap');
                const content2 = document.getElementById('mem');
                const content3 = document.getElementById('hw');
                const content4 = document.getElementById('conf');
                const content5 = document.getElementById('leav');
                content2.style.display="none";
                content3.style.display="none";
                content4.style.display="none";
                content5.style.display="none";

                bapt.addEventListener('click', () => {
                    content.style.display="block";
                    content2.style.display="none";
                    content3.style.display="none";
                    content4.style.display="none";
                    content5.style.display="none";
                    
                });
                mem.addEventListener('click', () => {
                    content.style.display="none";
                    content3.style.display="none";
                    content2.style.display="block";
                    content4.style.display="none";
                    content5.style.display="none";
                });
                h.addEventListener('click', () => {
                    content2.style.display="none";
                    content.style.display="none";
                    content3.style.display="block";
                    content4.style.display="none";
                    content5.style.display="none";
                    
                });
                c.addEventListener('click', () => {
                    content2.style.display="none";
                    content.style.display="none";
                    content3.style.display="none";
                    content4.style.display="block";
                    content5.style.display="none";
                    
                });
                leaving.addEventListener('click', () => {
                    content.style.display="none";
                    content3.style.display="none";
                    content5.style.display="block";
                    content4.style.display="none";
                    content2.style.display="none";
                    
                });
                

            </script>
        
            </div>

      
        <!-- this is form handler using js  -->
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

    // confession father request

        if(isset($_POST['sb4']))
        {
        
            $sql = "INSERT INTO `request` ( `user_id`, `request_type`,`address`, `reason`,`date`) 
                                VALUES ('$_SESSION[id]', 'confession father','$_POST[addr]', '$_POST[rsn]','$now');";
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

    //leaving request
        if(isset($_GET['sb9']))
        {
            
            $sql7 = "INSERT INTO `request`(`user_id`,`request_type`,`reason`,`address`,`date`) 
                                VALUES('$_SESSION[id]','leaving','$_GET[rol]','$_GET[ptg]','$now');";
            $result7 = $DBC->query($sql7);
            if($result7)
            {
                echo "request sent";
            }
        }


?>
    
<?php include(_shared."/footer.php");?>