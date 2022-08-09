<?php include("../../private/shared/init.php");?>
<?php include(_shared."/header.php");?>
<div class="content">
    <form action="quest.php" method="post">
        <div class="tb">
            <h2 class="tr">ask questions</h2>
            <div class="tr">
                <h3 class="td">category : </h3>
                <select name="cat" id="cat" class="td">
                    <option value="0">negere haimanot</option>
                    <option value="1">negere kristos</option>
                    <option value="2">negere mariam</option>
                    <option value="3">life issues</option>
                </select>
            </div>
            <div class="tr">
                <h3 class="td">content : </h3>
                <textarea name="quest" id="quest" cols="30" rows="10" class="td" required></textarea>
            </div>
            <input type="submit" value="Ask" class="td" name="ask">
        </div>
    </form>
</div>
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