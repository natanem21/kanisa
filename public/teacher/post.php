<?php include("../../private/shared/init.php");?>
<?php include(_shared."/header.php");?>

<ul>
            <li><a href="questions.php" class="">questions</a></li>
        </ul>
</div>
    </header>
    <style>
        .td textarea{
            border-radius:20px;
        }
    </style>
<?php
if(isset($_GET["id"]))
{
    $sql3 = "SELECT `q_id`, `q_m_id`, `type`, `cont`, `status`, `date` FROM `questions`  WHERE `q_id`='$_GET[id]'";
    $sql4="SELECT * FROM `answer` WHERE `question_id`='$_GET[id]'";
    $re2=$DBC->query($sql4);
    $re = $DBC->query($sql3);
    $content = $re->fetch_assoc();

?>


<!-- uploading -->
<div class="content">
    <h1>answer questions</h1>
    <form action="post.php" method="post">
        <div class="tb">
            <h2 class="tr">question type:<?php  if($content["type"]==0){echo "negere haimanot";}elseif($content["type"]==1){echo "negere kristos";}elseif($content["type"]==2){echo "negere mariam";}elseif($content["type"]==0){echo "life issues";}?></h2>
            <h3 class="tr">question id : <input type="text" name="quest_id" value="<?php echo $_GET['id']?>"></h3>
            <h3 class="tr">asked on : <?php echo $content["date"]; ?></h3>
            <div class="tr">
                <h4 class="td">question :<?php  echo $content["cont"];?> </h4>
                <h4 class="td"> answer : <textarea name="answer" id="answer" cols="90" rows="10"></textarea></h4>
            </div>
            <div class="tr">
                    <h3 class="td">accessed by: </h3>
                <select name="to"  class="td">
                    <option value="0">everyone</option>
                    <option value="1">for members only</option>
                    
                </select>
            </div>
           
            <input type="submit" value="answer" class="td" name="post_answer">
            <hr>
            <div class="tr">
                <h3 class="td">earlier answers</h3>
            </div>
            <?php 
            while($ans =$re2->fetch_assoc())
            {
                ?>
                <div class="tr">
                    <h3 class="td"><?php echo $ans['content']?></h3>
                </div><hr>
                <?php
            }
            ?>
        </div>
    </form>

   
  
    
    <!-- form handler -->
        <?php
}
        $date=new DateTime();
        $now=date("Y-m-d-h-i",$date->getTimestamp());

        if(isset($_POST["post_answer"]) )
        {
            

                $sql="INSERT INTO `answer`( `question_id`, `content`, `answered_by`, `to_stat`, `date`) 
                VALUES ('$_POST[quest_id]','$_POST[answer]','$_SESSION[id]','$_POST[to]','$now')";
                    
                $DBC->query($sql);
                echo $now; ?>
                
                <script>
                alert("your have posted succesfully");
                </script>
        
            <?php
        
        }
    ?>
<!-- tab simulation -->
   
</div>

<?php include(_private."/sec_share/footer.php");?>