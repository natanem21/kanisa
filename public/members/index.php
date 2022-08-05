<?php include("../../private/shared/init.php");?>
<?php include(_shared."/header.php");?>
<?php
if($_SESSION['role']!=0)
{
    header("location:"."/chms_for_eotc/guest/login.php");
}
?>

<div class="content">
    <h1>index page</h1>
    <?php
    $sql = "UPDATE `members` SET `reg_date` = '2022-07-05'";
    $result = $DBC->query($sql);
    if($result)
    {
        echo "succesfully updated all";
    }
    else{
        echo "error".$DBC->error;
    }
    ?>
</div>

<?php include(_shared."/footer.php");?>