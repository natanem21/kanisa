<?php include("../shared/init.php");?>
<?php include(_private."/sec_share/header.php");?>
<?php 
if(isset($_GET["m_id"]))
{
$sql = "";
$result=$DBC->query($sql);
}
?>

<style>
  .content
  {
    top: 10px;
  }
 
  </style>
<div class="content">
    <div class="tb">
        <div class="tr">
            <h2 class="td">parent name </h2>
            <h2 class="td">age</h2>
        </div>
        <div class="tr">
            <h3 class="td">father name : </h3>
            <h3 class="td"><?php ?></h3>
        </div>

    </div>
   
</div>
<?php include(_private."/sec_share/footer.php");?>