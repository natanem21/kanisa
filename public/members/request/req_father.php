<?php include("../../../private/shared/init.php");?>
<?php include(_shared."/header.php");?>
<div class="content">
    <h1>church fathers</h1>
    <?php  if(class_exists("Baptism"))
    {
        echo "yeay";
    }
    else{
        echo "no";
    }?>
</div>
<?php include(_shared."/footer.php");?>