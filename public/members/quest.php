<?php include("../../private/shared/init.php");?>
<?php include(_shared."/header.php");?>
<style>
    .content
    {
        display:flex;
        flex-wrap:wrap;

    }
    .tabs
    {
        background-color:#6666;
       border-radius:10px;
    }
    .tabs ul:hover{
        color:white;
        cursor:pointer;
    }
    .outer{
        width: 100%;
    }
    .bar{
        background-color:#6666;
    }
    .question_type{
        background-color:#9999ff;
        border-radius:10px;
    }
    .question_person
    {
            
    }
</style>
<div class="tabs">
        <ul>
            <li id="old_btn" >earlier questions</li>
        </ul>
        <ul>
        <li id="new_btn">new question</li>
        </ul>
    </div>

<div class="content">

    <div class="tb" id="new">
        <form action="quest.php" method="post">
            
                
                <div class="tr">
                    <h3 class="td">category : </h3>
                    <select name="cat" id="cat" class="td">
                        <option value="0">negere haimanot</option>
                        <option value="1">negere kristos</option>
                        <option value="2">negere mariam</option>
                        <option value="3">life issues</option>
                        <option value="4">other</option>
                    </select>
                </div>

                <div class="tr">
                    <h3 class="td">content : </h3>
                    <textarea name="quest" id="quest" cols="30" rows="10" class="td" required></textarea>
                </div>

                <input type="submit" value="Ask" class="td" name="ask" id="sub_btn">
            
        </form>
    </div>

    <div class="tb" id="old">
        <div class="tr bar"><h3 class="td">earlier questions</h3><h3 class="td">answers</h3></div>
        <?php 
            $sql4="SELECT * FROM `answer` JOIN `questions` ON `question_id`=`q_id` WHERE `to_stat`<'2' ORDER BY `type`";
            $re2=$DBC->query($sql4);
            while($ans =$re2->fetch_assoc())
            {
                ?>
                <div class="tr">
                    <h3 class="td"><?php if($ans["type"]==0){echo "<span class='question_type'>negere haimanot</br></span>";}elseif($ans["type"]==1){echo "<span class='question_type'>negere kristos</br></span>";}elseif($ans["type"]==2){echo "<span class='question_type'>negere mariam</br></span>";}elseif($ans["type"]==3){echo "<span class='question_type'>life issues</br></span>";}
                    echo $ans['cont']?></h3>
                    <h3 class="td question_person"><?php echo $ans['content']?></h3>
                </div><hr>
                <?php
            }
            ?>

        
    </div>

</div>
<script>
    const new_body = document.getElementById("new");
    const old_body = document.getElementById("old");
    const new_btn=document.getElementById("new_btn");
    const old_btn=document.getElementById("old_btn");
    const sub = document.getElementById("sub_btn");
    new_body.style.display="none";
    new_btn.addEventListener('click', ()=>{
        new_body.style.display="block";
    });
    sub.addEventListener('click', ()=>{
        new_body.style.display="none";
    })


</script>
<?php 
$now = date("Y-j-d",time());
if(isset($_POST["ask"]))
{
$sql = "INSERT INTO `questions` (`q_id`, `q_m_id`, `type`, `cont`, `date`) 
VALUES (NULL, '$_SESSION[id]', '$_POST[cat]', '$_POST[quest]', '$now');";
$DBC->query($sql);

}
?>
<?php include(_shared."/footer.php");?>