<?php include("../shared/init.php");?>
<?php include(_private."/sec_share/header.php");?>
<div class="content">
    <h1>add new material</h1>
    <form action="materials.php" method="post">
        <div class="tb">
            <div class="tr">
                <h2 class="td">name of material</h2>
                <input type="text" name="mat" id="mat" class="td">
            </div>
            <div class="tr">
                <h2 class="td">amount</h2>
                <input type="number" name="amt" id="amt" class="td">
            </div>
            <div class="tr">
                <h2 class="td">date of registration : </h2>
                <input type="date" name="date" id="date" class="td">
            </div>
            <div class="tr">
                <h2 class="td">added by</h2>
                <input type="text" name="by" id="by" class="td">
            </div>
            <input type="submit" value="add" name="add" class="td">
        </div>
    </form>
   
</div>
<?php
if(isset($_POST["add"]))
{
$sql="INSERT INTO `materials`( `material_name`, `amount`, `date_of_REG`, `added_by`)
 VALUES ('$_POST[mat]','$_POST[amt]','$_POST[date]','$_POST[by]')";
 $DBC->query($sql);

}
?>

<?php include(_private."/sec_share/footer.php");?>