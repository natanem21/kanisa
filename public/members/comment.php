<?php include("../../private/shared/init.php");?>
<?php include(_shared."/header.php");?>
<div class="content">
<!-- 
commet types and description
0 direct
1 from posts
2 conflict
3 heretics

-->

    <h1>give comments</h1>

    <?php  if(isset($_GET['r_id']))
    {
    ?>
    <form action="comment.php" method="post">
        <div class="tb">
            <div class="tr">
                <h3 class="td">comment :</h3>
                <textarea name="comment" id="comment" cols="30" rows="10" class="td"></textarea>
            </div>
            <input type="submit" class="td" name="d_cmt_pst">
            <input type="text" name="id" id="id" value="<?php echo $_GET['r_id'];?>">
        </div>
    </form>
    <?php
    }
    ?>
     <?php  if(isset($_GET['p_id']))
    {
    ?>
    <form action="comment.php" method="post">
        <div class="tb">
            <div class="tr">
                <h3 class="td">comment :</h3>
                <textarea name="comment" id="comment" cols="30" rows="10" class="td"></textarea>
            </div>
            <input type="submit" class="td" name="p_cmt_pst">
            <input type="text" name="id" id="id" value="<?php echo $_GET['p_id'];?>">
        </div>
    </form>
    <?php
    }
    ?>
</div>
<?php  if(isset($_POST["d_cmt_pst"]))
{
    $now=date("Y-j-d",time());
    $sql = "INSERT INTO `comment` (`com_id`, `cnr_id`, `rec_id`, `content`, `type`, `cmt_date`, `reported_per_id`, `reason`, `rep_date`, `evidence`, `post_id`) 
    VALUES (NULL, '$_SESSION[id]', '$_POST[id]', '$_POST[comment] ', '0', '$now', '', '', '', '', '1');";
    $DBC->query($sql);
}
?>
<?php  if(isset($_POST["p_cmt_pst"]))
{
    $now=date("Y-j-d",time());
    $sql2 = "SELECT * FROM `posts` WHERE `post_id`='$_POST[id]'";
                        $res = $DBC->query($sql2);
                        $x = $res->fetch_assoc();
    $sql = "INSERT INTO `comment` (`com_id`, `cnr_id`, `rec_id`, `content`, `type`, `cmt_date`, `reported_per_id`, `reason`, `rep_date`, `evidence`, `post_id`) 
    VALUES (NULL, '$_SESSION[id]', '$x[m_id]', '$_POST[comment] ', '1', '$now', '', '', '', '', '$_POST[id]');";
    $DBC->query($sql);
}
?>
<?php include(_shared."/footer.php");?>