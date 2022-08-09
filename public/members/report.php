<?php include("../../private/shared/init.php");?>
<?php include(_shared."/header.php");?>
<?php $sql = "SELECT `name`,`id` FROM `members`";
$result=$DBC->query($sql); ?>
<!-- 
commet types and description
0 direct
1 from posts
2 conflict
3 heretics

-->
<style>
    .tabs
    {
        background-color:#6666;
    }
    .main
    {
        display:flex;
        flex-wrap: wrap;
        
    }
</style>
<div class="content">
    <div class="tabs">
        <ul>
            <li>report conflict</li>
        </ul>
        <ul>
        <li>report heretics</li>
        </ul>
    </div>
    <div class="main">
        <div class="heretics">
            <form action="report.php" method="post" enctype="multipart/form-data">
                <div class="tb">
                    <h2 class="tr">heretics report</h2>
                    <div class="tr">
                        <h3 class="td">select person name : </h3>
                        <select name="p_name" id="p_name" class="td">
                            <?php while($x=$result->fetch_assoc())
                            {
                                ?>
                            <option value="<?php echo $x["id"];?>"><?php echo $x["name"]; ?></option>
                                <?php
                            } ?>
                        
                        </select>
                        
                    </div>
                    <div class="tr">
                        <h3 class="td">what do you report : </h3>
                        <textarea name="content" id="content" cols="30" rows="10" class="td" required></textarea>
                    </div>
                    <div class="tr">
                        <h3 class="td">date of suspiction</h3>
                        <input type="date" name="date" id="date" class="td" required>
                    </div>
                    <div class="tr">
                        <h3 class="td">evidence if any :</h3>
                        <input type="file" name="evid" id="evid" class="td" required>
                    </div>
                    <input type="submit" value="report" class="td" name="r_hrtc">
                </div>
            </form>
        </div>
        <div class="conflict">
            <form action="report.php" method="post">
                <div class="tb">
                    <h2 class="tr">report conflicts</h2>
                    <div class="tr">
                        <h3 class="td">between : </h3>
                        <select name="p_1" id="p_1" class="td">
                            <?php $sql = "SELECT `name`,`id` FROM `members`";
                                    $result=$DBC->query($sql); 
                            while($x=$result->fetch_assoc())
                                {
                                    ?>
                                <option value="<?php echo $x["id"];?>"><?php echo $x["name"]; ?></option>
                                    <?php
                                } ?>
                        </select>
                        <select name="p_2" id="p_2" class="td">
                            <?php $sql = "SELECT `name`,`id` FROM `members`";
                                $result=$DBC->query($sql);
                            while($x=$result->fetch_assoc())
                                {
                                    ?>
                                <option value="<?php echo $x["id"];?>"><?php echo $x["name"]; ?></option>
                                    <?php
                                } ?>
                            
                        </select>
                    </div>
                    <div class="tr">
                        <h3 class="td">cause : </h3>
                        <input type="text" name="rsn" id="rsn" class="td">
                    </div>
                    <div class="tr">
                        <h3 class="td">the problem description  :</h3>
                        <textarea name="desc" id="desc" cols="30" rows="10" class="td"></textarea>
                    </div>
                    <div class="tr">
                        <h3 class="td">date of conflict</h3>
                        <input type="date" name="date" id="date" class="td">
                    </div>
                    <input type="submit" value="submit" class="td" name="r_cfct">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$now = date("Y-j-d",time());
if(isset($_POST["r_hrtc"]))
{

$name = basename($_FILES["evid"]["name"]);
$folderLocation = "../../private/shared/myFiles"; 
if (!file_exists($folderLocation)) mkdir($folderLocation);
move_uploaded_file($_FILES["evid"]["tmp_name"], "$folderLocation/" .$name);
$sql = "INSERT INTO `comment` (`com_id`, `cnr_id`, `rec_id`, `content`, `type`, `cmt_date`, `reported_per_1`, `reason`, `rep_date`, `evidence`, `post_id`) 
VALUES (NULL, '$_SESSION[id]', '11', '$_POST[content] ', '3', '$now', '$_POST[p_name]', '', '$_POST[date]', '$name', '1');";
$DBC->query($sql);
}
if(isset($_POST["r_cfct"]))
{
$sql = "INSERT INTO `comment` (`com_id`, `cnr_id`, `rec_id`, `content`, `type`, `cmt_date`, `reported_per_1`, `reported_per_2`, `reason`, `rep_date`, `evidence`, `post_id`) 
VALUES (NULL, '$_SESSION[id]', '11', '$_POST[desc] ', '2', '$now', '$_POST[p_1]', '$_POST[p_2]', '$_POST[rsn]', '$_POST[date]', '', '1');";
$DBC->query($sql);
}
?>
<?php include(_shared."/footer.php");?>