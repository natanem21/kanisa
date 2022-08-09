<?php include("../../../private/shared/init.php");?>
<?php include(_shared."/header.php");?>
<div class="content">
    <h1>show all groups in the church</h1>
    <?php 
            $sql ="SELECT * FROM `church_groups`";
            $result=$DBC->query($sql);
            while($x=$result->fetch_assoc())
            {
            ?>
            <div class="post">
                <h2><?php echo $x["g_name"]  ?>&nbsp&nbsp&nbsp</h2>
               <p class="p_cont"><?php echo $x["Description"]?> </p>
            </div>
           
          <?php
            }
            ?>
            </div>
</div>
<?php include(_shared."/footer.php");?>