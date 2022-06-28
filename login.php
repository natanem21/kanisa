<?php $title="login page";
$direct="<a href ='index.php'>back to main page</a>";
include("header.php");
?>
<div class="c2">
    <h1>login page</h1>
    <form action="redirect.php" method="get" >
       user name <input type="text" name = "un"><br/><br/>
       password  <input type="password" name="ps"><br/>
       
       <input type="submit" value="login" name="sb" style="background-color:green"><br/></br/>
       
    </form>
    
    <button class="b1" type="submit" onclick="window.open('req_membership.php')">membership</button>
    </div>
    <?php include("footer.php");?>