<?php include("../../../private/shared/init.php");?>
<?php include(_shared."/header.php");?>
<style>
    .cont2
    {
        background-color:green;
    }
    .cont3
    {
        background-color:blue;
    }
    .cont4
    {
        background-color:red;
    }
    .cont3 a,.cont4 a
    {
        background-color:#ef23ef;
    }

</style>
<div class="content">
    <h1>show all church adminstrators and fathers </h1>
    <div class="cont3">
        <h2>adminstrator</h2>
        <?php 
                $sql ="SELECT * FROM `members` WHERE `role`=2";
                $result=$DBC->query($sql);
                while($x=$result->fetch_assoc())
                {
                ?>
                <div class="post">
                    <h2><?php echo $x["name"]  ?>&nbsp&nbsp&nbsp</h2>
                    <?php if(($x["img"])!=null){?>
                <img src="myFiles/<?php echo $x['img']?>" alt="post_img" class="p_img"> 
                <?php } ?>
                <p class="p_cont"><?php echo $x["christ_name"]?> </p>
                </div>
                <a href="../comment.php?r_id=<?php echo $x['id'] ?>">comment</a>
            <?php
                }
                ?>
                </div>
    </div>

    <div class="cont3">
        <h2>secretary</h2>
        <?php 
                $sql ="SELECT * FROM `members` WHERE `role`=1";
                $result=$DBC->query($sql);
                while($x=$result->fetch_assoc())
                {
                ?>
                <div class="post">
                    <h2><?php echo $x["name"]  ?>&nbsp&nbsp&nbsp</h2>
                    <?php if(($x["img"])!=null){?>
                    <img src="myFiles/<?php echo $x['img']?>" alt="post_img" class="p_img"> 
                    <?php } ?>
                    <p class="p_cont"><?php echo $x["christ_name"]?> </p>
                </div>
                <a href="../comment.php?r_id=<?php echo $x['id'] ?>">comment</a>
            <?php
                }
                ?>
                </div>
    </div>
    <div class="cont4">
        <h2>fathers</h2>
        <?php 
                $sql ="SELECT * FROM `members` WHERE `role`=3";
                $result=$DBC->query($sql);
                while($x=$result->fetch_assoc())
                {
                ?>
                <div class="post">
                    <h2><?php echo $x["name"]  ?>&nbsp&nbsp&nbsp</h2>
                    <?php if(($x["img"])!=null){?>
                <img src="myFiles/<?php echo $x['img']?>" alt="post_img" class="p_img"> 
                <?php } ?>
                <p class="p_cont"><?php echo $x["christ_name"]?> </p>
                </div>
                <a href="../comment.php?r_id=<?php echo $x['id'] ?>">comment</a>
            <?php
                }
                ?>
                </div>
    </div>
    <div class="cont4">
        <h2>teachers</h2>
        <?php 
                $sql ="SELECT * FROM `members` WHERE `role`=4";
                $result=$DBC->query($sql);
                while($x=$result->fetch_assoc())
                {
                ?>
                <div class="post">
                    <h2><?php echo $x["name"]  ?>&nbsp&nbsp&nbsp</h2>
                    <?php if(($x["img"])!=null){?>
                <img src="myFiles/<?php echo $x['img']?>" alt="post_img" class="p_img"> 
                <?php } ?>
                <p class="p_cont"><?php echo $x["christ_name"]?> </p>
                
                </div>
                <a href="../comment.php?r_id=<?php echo $x['id'] ?>">comment</a>
               
            <?php
                }
                ?>
                </div>
    </div>
</div>
<?php include(_shared."/footer.php");?>