<?php include("../../private/shared/init.php");?>
<?php include(_shared."/header.php");?>

<ul>
            <li><a href="questions.php" class="">questions</a></li>
        </ul>
</div>
    </header>
<?php
if($_SESSION['role']!=4)
{
    header("location:"."/chms_for_eotc/guest/login.php");
}
?>

<div class="content">
    <h1>teachers page</h1>
</div>

<?php include(_shared."/footer.php");?>