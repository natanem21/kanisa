<?php require_once("../private/shared/database.php");?>
<?php $title="registration page";
$direct="<a href ='index.php'><img src='book.svg' alt='profile image' class='profile rect'>";
include("header.php");
?>
    <div class="c2 cent">
        <h1>create account</h1>
        <form action="req_membership.php" method="post">
                <dl>
                    <dt><label for="u_name">name</label></dt>
                        <dd><input type="text" name="u_name" id=""></dd>
                    <dt><label for="c_name">christ name</label></dt>
                       <dd> <input type="text" name="c_name" id=""></dd>
                    <dt><label for="age">age</label></dt>
                       <dd> <input type="number" name="age" id=""></dd>
                </dl>
                <dl>
                    <dt>gender</dt>
                        <dd>
                            <label for="gender">male</label>
                                <input type="radio" name="gender" value="0">
                            <label for="gender">female</label>
                                <input type="radio" name="gender" value="1">
                        </dd>        
                </dl>
               
                <dl>
                    <dt> <label for="phone_addr">phone</label></dt>
                        <dd>  <input type="text" name="phone_addr" id=""></dd>
                    <dt> <label for="home_addr">home address</label></dt>
                        <dd><input type="text" name="home_addr" id=""></dd>
                    <dt> <label for="email_addr">email</label> </dt>
                        <dd><input type="email" name="email_addr" id=""></dd>
                </dl>
                <dl>
                    <dt>clerical position</dt>
                        <dd>
                            <select name="position" id="">
                                <option value="1">non clergy</option>
                                <option value="2">deacon</option>
                                <option value="3">priest</option>
                                <option value="4">monk</option>
                            </select>
                        </dd>
                </dl>
                <dl>
                    <dt>martial status</dt>
                        <dd>
                            <label for="martial">single</label>
                                <input type="radio" name="martial" value="0">
                            <label for="martial">married</label>
                                <input type="radio" name="martial" value="1">
                            <label for="martial">divorced</label>
                                <input type="radio" name="martial" value="2">
                        </dd>        
                </dl>
                <div id="operation"> 
                    <input type="submit" value="create" name="sb">
                </div>
        </form>   
</div>
<?php 
if(isset($_POST['sb']))
{
    $sql = " INSERT INTO 
    members(`name`,`christ_name`,`age`,`gender`,`phone`,`address`,`email`,`martial_stat`,`clerical_pos`,`password`)
     VALUES('$_POST[u_name]','$_POST[c_name]','$_POST[age]','$_POST[gender]','$_POST[phone_addr]','$_POST[home_addr]','$_POST[email_addr]','$_POST[martial]','$_POST[position]','123')";
    if($DBC->query($sql))
{
    echo " data added succesfully ";
}
else{
    echo "error: ".$DBC->error;
} 
    
}
?>

 <?php include("footer.php");?>