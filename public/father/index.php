<?php include("../../private/shared/init.php");?>
<?php include(_shared."/header.php");?>
        <ul>
            <li><a href="children.php" class="">view confession childrens</a></li>
        </ul>
        <ul>
            <li><a href="heresy.php" class="">heretics</a></li>
        </ul>

</div>
    </header>
<?php
if($_SESSION['role']!=3)
{
    header("location:"."/chms_for_eotc/guest/login.php");
}
?>

<div class="content">
    <h1>fathers page</h1>
</div>

<?php include(_shared."/footer.php");?>