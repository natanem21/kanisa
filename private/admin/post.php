<?php include("../shared/init.php");?>
<?php include(_private."/sec_share/header.php");
if(isset($_GET["id"]))
{
    $sql3 = "SELECT * FROM `posts` WHERE `post_id`='$_GET[id]'";
    $re = $DBC->query($sql3);
    $content = $re->fetch_assoc();
}
?>
<style>
.tr .profile
{
    border-radius:20px;
    #id{
        display:none;
    }
}
h2 li {
    display:inline;
    border:1px dashed grey;
    padding:5px;
    margin:5px;
    border-radius:10px;
}
h2 li:hover{
    background-color:white;
    color:red;
    cursor:pointer;
    border:none;
}
</style>

<!-- uploading -->
<div class="content">
    <h1>post church information</h1>
    <h2><li id="n">new post     </li><li id="o">older posts</li></h2>

    <form action="post.php" method="post" enctype="multipart/form-data">
       <div class="tb" id="new">
            <div class="tr">
                <h3 class="td">header : </h3><input type="text" class="td" name="hdr" required value="<?php if(isset($_GET['id'])){echo $content['header'];} ?>">
            </div>
            <div class="tr">
                <h3 class="td">adressed to : </h3>
                <select name="who" id="who" class="td">
                    <option value="0" <?php if(isset($_GET["id"])) {if($content['receiver']==0){?>selected<?php }}?>>guest</option>
                    <option value="1" <?php if(isset($_GET["id"])) {if($content['receiver']==1){?>selected<?php }}?>>member</option>
                    <option value="2" <?php if(isset($_GET["id"])) { if($content['receiver']==2){?>selected<?php }}?>>fahters</option>
                    <option value="3" <?php if(isset($_GET["id"])) {if($content['receiver']==3){?>selected<?php }}?>>teachers</option>
                </select>
            </div>
            <div class="tr">
                <h3 class="td">image : </h3><input type="file" name="post_img" id="" accept="image/*">
                <?php  if(isset($_GET["id"])){
                    ?>
                        <img src="myFiles/<?php echo $content['img']?>" alt="img" class="profile td">
                    <?php
                } ?>
            </div>
            <div class="tr">
                <h3 class="td">content: </h3><textarea name="cont" id="cont" cols="80" rows="20" class="td" required><?php if(isset($_GET['id'])){echo $content['content'];} ?></textarea>
            </div>
           
            <div class="tr">
                <input type="submit" class="td" id="sub_post"name="sub_post">
                <?php if(isset($_GET["id"])){
                    ?>
                    <style>
                                #sub_post
                                {
                                    display:none;
                                }
                        </style>
                     <input type="submit" class="td" name="edit_post" value="edit">
                     <input type="submit" class="td" name="delet_post" value="delete">
                     <input type="text" display="hidden"name="id" id="id" value="<?php echo $_GET['id']?> " style="display:none">
                    <?php
                } ?>
            </div>
        </div>
    </form>
    
    <div class="tb" id="old">
        <div class="tr">
            <h3 class="td">post number  </h3>
            <h3 class="td">header &nbsp&nbsp&nbsp&nbsp </h3>
            <h3 class="td">date  &nbsp&nbsp&nbsp&nbsp</h3>
            <h3 class="td"><a href="">update &nbsp&nbsp&nbsp&nbsp</a></h3>
           
        </div>
        <?php
        $sql = "SELECT * FROM `posts` WHERE `m_id`='$_SESSION[id]'";
        $result = $DBC->query($sql);
        while($x=$result->fetch_assoc())
        {
            ?>
            <div class="tr">
                <h3 class="td"><?php echo $x['post_id']; ?></h3>
                <h3 class="td"><?php echo $x['header'];?>&nbsp&nbsp&nbsp&nbsp</h3>
                <h3 class="td"><?php echo $x['date'];?>&nbsp&nbsp&nbsp&nbsp</h3>
                <h3 class="td"><a href="<?php echo "post.php?id=$x[post_id]" ?>">view </a></h3>
                
            </div>
            <?php
        }
        ?>
    </div>
    
    <!-- form handler -->
        <?php
        $date=new DateTime();
        $now=date("Y-m-d-h-i",$date->getTimestamp());

        if(isset($_POST["sub_post"]) )
        {
            if($_FILES["post_img"]["name"]==null)
            {
                $sql="INSERT INTO `posts`(`m_id`,`header`,`content`,`date`,`receiver`)
                VALUE('$_SESSION[id]','$_POST[hdr]','$_POST[cont]','$now','$_POST[who]')";
            }
            else
            {    $folderLocation = "myFiles"; 
                $name = basename($_FILES["post_img"]["name"]);
                if (!file_exists($folderLocation)) mkdir($folderLocation);

                move_uploaded_file($_FILES["post_img"]["tmp_name"], "$folderLocation/" .$name);

                $sql="INSERT INTO `posts`(`m_id`,`header`,`content`,`date`,`img`,`receiver`)
                VALUE('$_SESSION[id]','$_POST[hdr]','$_POST[cont]','$now','$name','$_POST[who]')";
                ?>
                <script>
        alert("your have posted succesfully");
                    </script>
        
            <?php
        }
            $DBC->query($sql);
            echo $now;
        
        }
        elseif(isset($_POST["edit_post"]))
        {
            
            if($_FILES["post_img"]["name"]==null)
            {
                $sql="UPDATE `posts` SET `header`='$_POST[hdr]',`content`='$_POST[cont]',`date`='$now',`receiver`='$_POST[who]'  WHERE `post_id` = '$_POST[id]';";
               
               
            }
            else
            {    $folderLocation = "myFiles"; 
                $name = basename($_FILES["post_img"]["name"]);
                if (!file_exists($folderLocation)) mkdir($folderLocation);

                move_uploaded_file($_FILES["post_img"]["tmp_name"], "$folderLocation/" .$name);
                $sql="UPDATE `posts` SET `header`='$_POST[hdr]',`content`='$_POST[cont]',`date`='$now',`img`='$name',`receiver`=,'$_POST[who]' WHERE `post_id` = '$_POST[id]';";
               ?>
                <script>
        alert("your have updated succesfully");
                    </script>
        
            <?php
        }
        $DBC->query($sql);
        echo $now;
            
        }
        elseif(isset($_POST["delet_post"]))
        {
            $sql9 = "DELETE FROM `posts` WHERE `post_id` = '$_POST[id]'";
            $res = $DBC->query($sql9);
            header("location:post.php");
            
        }

        ?>
<!-- tab simulation -->
    <script>
    
        const writepost = document.getElementById("new");
        const viewpost = document.getElementById("old");
        const writetab = document.getElementById("n");
        const viewtab =document.getElementById("o");
        viewpost.style.display="none";

        writetab.addEventListener('click',()=>{
            window.location="post.php";
        });
        viewtab.addEventListener('click',()=>{
            viewpost.style.display="block";
            writepost.style.display="none";
        });

    </script>
</div>

<?php include(_private."/sec_share/footer.php");?>