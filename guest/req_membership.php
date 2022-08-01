<?php require_once("../private/shared/database.php");?>
<?php session_start();?>
<?php $title="registration";
$direct="<a href ='index.php'><img src='book.svg' alt='profile image' class='profile rect'>";

?>
  
<!-- login form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="style/style.css">     
</head>
<body> 
    <div class="container c2">
 
        
        <form action="setpass.php" method="post">
        <h1>create account</h1>
        <div class="row">
                <dl>
                    <dt><label for="u_name">name</label></dt>
                        <dd><input type="text" name="u_name" id=""></dd>
                    <dt><label for="c_name">christ name</label></dt>
                       <dd> <input type="text" name="c_name" id=""></dd>
                    <dt><label for="age">age</label></dt>
                       <dd> <input type="number" name="age" id=""></dd>
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
                <dl>
                    <dt>gender</dt>
                        <dd>
                            <label for="gender">male</label>
                                <input type="radio" name="gender" value="0">
                            <label for="gender">female</label>
                                <input type="radio" name="gender" value="1">
                        </dd>        
                </dl>
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
                <div id="operation" class="button"> 
                  <input type="submit" value="create" name="sb" class="btn"/>
                </div>
            </div>
        </form>  
        <div class="button">  <h4>already has an account <a href="login.php">login</a> </h4> </div>
      
</div>
</body>
</html>


 <?php include("footer.php");?>