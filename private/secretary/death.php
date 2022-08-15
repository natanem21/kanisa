<?php include("../shared/init.php");?>
<?php include(_private."/sec_share/header.php");?>
<?php $sql = "SELECT `name`,`id` FROM `members`";
$result=$DBC->query($sql); ?>
<style>
  .content
  {
    top: 10px;
  }
  .main{
    display:flex;
    flex-wrap:wrap;
  }
  </style>
  <div class="content">
      <div class="main">
        <div class="reg">
          <div class="tb">
            <h1 class="tr">Dead Book</h1>
            <form action="death.php" method="post">
              <div class="tr">
                <h3 class="td">name of person :</h3>
                    <select name="pers" id="pers" class="td">
                                  <?php while($x=$result->fetch_assoc())
                                  {
                                      ?>
                                  <option value="<?php echo $x["id"];?>"><?php echo $x["name"]; ?></option>
                                      <?php
                                  } ?>
                              
                    </select>
              </div>
              <div class="tr">
                <h3 class="td">death date</h3>
                <input type="date" name="date" id="date" class="td">
              </div>
              <div class="tr">
                <h3 class="td">reason of death</h3>
                <textarea name="rsn" id="rsn" cols="30" rows="10" class="td"></textarea>
              </div>
              <div class="tr">
                <h3 class="td">burial place</h3>
                <input type="text" name="place" id="place" class="td">
              </div>
              <input type="submit" value="add to Death list" class="td" name="death">
            </form>
          </div>
        </div>

        <div class="unreg">
          <div class="tb">
            <form action="death.php" method="post">
            <h2 class="tr">un registered members</h2>
            <div class="tr">
              <h3 class="td">first name: </h3>
              <input type="text" name="fnm" id="fnm" class="td">
            </div>
            <div class="tr">
              <h3 class="td">last name:</h3>
              <input type="text" name="lnm" id="lnm" class="td">
            </div>
            <div class="tr">
              <h3 class="td">age : </h3>
              <input type="number" name="ag" id="ag" class="td">
            </div>
            <div class="tr">
              <h3 class="td">death date:</h3>
              <input type="date" name="DOD" id="DOD" class="td">
            </div>
            <input type="submit" value="new_death" class="td" name="new_death">
            </form>
          </div>
        </div>
    </div>
    
  </div>
  <?php
/* needs triger
CREATE TRIGGER `update_members_on_death` BEFORE INSERT ON `death` FOR EACH ROW UPDATE members SET STATUS ='2' WHERE members.id=new.m_id
*/
?>

<?php
if(isset($_POST["death"]))
{
  $sql = "INSERT INTO `death`( `m_id`, `reason_of_death`, `date_of_death`, `burial_place`) 
  VALUES ('$_POST[pers]','$_POST[rsn]','$_POST[date]','$_POST[place]')";
  $DBC->query($sql);
}
if(isset($_POST["new_death"]))
{
  $sql = "INSERT INTO `unregistered_dead`( `first_name`, `last_name`, `age`, `DOD`) 
  VALUES ('$_POST[fnm]','$_POST[lnm]','$_POST[ag]','$_POST[DOD]')";
  $DBC->query($sql);
}
?>
<?php include(_private."/sec_share/footer.php");?>