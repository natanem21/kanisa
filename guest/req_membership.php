<?php require_once("../private/shared/database.php");?>
<?php session_start();?>
<?php $title="registration";
$direct="<a href ='index.php'><img src='book.svg' alt='profile image' class='profile rect'>";

?>

<style>
    .inl{
    display:inline-block;
    position:relative;
    margin: 2px;
    padding: 10px;
    }
    #b1
    {
        left:-10%;
        
    }
    #r2{
    right:-10%;
    }
    #br2 
    {
        display:inline-block;
        position:relative;
        top: -50px;
        left: -2%;   
    }
    #br3 
    {
        display:inline-block;
    postition:relative;
    right:20px;

    
    }

    .ddw
    {
    width: 100px;
    height:10%;
    border: 1px solid green;
    border-radius:10px;
    }
    .ddw:hover{
        background-color:rgb(25,23,54);
        color:white;
   

    }
   
     .mk_btn
    {
    background-color:rgb(19,28,90);
    width:30%;
    border-radius:40px;
    
  
    box-shadow: inset 10px 10px 20px 10px rgb(110, 68, 48);
    color:rgb(184, 188, 192);
    cursor:hand;  
    }
    .mk_btn:hover
    {
        box-shadow:5px 5px 40px 10px rgb(175, 23, 235);
        color: aliceblue;
    }
</style>

<!-- form validation -->
<script>

    var number=0;
     function validate()
     {
       
        var x = document.forms["myForm"]["gender"].value;
        var y = document.forms["myForm"]["position"].value;
        var z = document.forms["myForm"]["martial"].value;
        if (x == "x" || y == "x" || z == "x")
         {
            alert("fill the form completely");
            return false;
        }
        
    }
    function add()
    {
      
     
      document.getElementById("cer_no").value=number;
      
        var element = document.createElement("input");
        element.type="file";
        element.name="certificate"+number.toString();
        document.getElementById("cert").appendChild(element);
        number++;
    }
</script>

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
 
        
        <form action="setpass.php" method="post" name="myForm" onsubmit="return validate();" enctype="multipart/form-data">
            <h1>create account</h1>
            <div class="row">
                <dl>
                    <dt><label for="u_name">first name</label></dt>
                        <dd><input type="text" name="u_name" id="" required></dd>
                    <dt><label for="l_name">last name</label></dt>
                        <dd><input type="text" name="l_name" id="" required></dd>
                    <dt><label for="c_name">christ name</label></dt>
                       <dd> <input type="text" name="c_name" id="" required></dd>
                    <dt><label for="age">Date of birth</label></dt>
                       <dd> <input type="date" name="age" id="" required></dd>
                </dl>
             
               
                <dl>
                    <dt> <label for="phone_addr" required>phone</label></dt>
                        <dd>  <input type="text" name="phone_addr" id="" required></dd>
                    <dt> <label for="home_addr">home address</label></dt>
                        <dd><input type="text" name="home_addr" id="" required></dd>
                    <dt> <label for="email_addr">email</label> </dt>
                        <dd><input type="email" name="email_addr" id="em" required></dd>
                    <dt> <label for="job">job/proffession/</label> </dt>
                        <dd><input type="text" name="job" id="" required></dd>
                    <dt> <label for="prof_img">profile image</label> </dt>
                        <dd><input type="file" name="prof_img" id="" accept="image/*"></dd>
                </dl>
                <dl>
                    <input type="text" name="num_of_cert" id="cer_no" style="display:none">
                <dt> <label for="c" >certificates</label> </dt>
                       <div name="c"  class="mk_btn" onclick="add();">add certificate</div> 
                       <div class="cer" id ="cert" name="cert"></div> 
                    <div>
                <dt class="inl" id="b1">gender</dt>
                        <dd  class="inl" id="r2">
                            <select name="gender" class="ddw" required>
                                <option disabled selected value="x">select one</option>
                                <option value="0">male</option>
                                <option value="1">female</option>
                               
                            </select>
                        </dd></div>
                    <dt class="inl">clerical position</dt>
                        <dd  class="inl">
                            <select name="position" class="ddw" required>
                                <option disabled selected value="x">select one</option>
                                <option value="1">non clergy</option>
                                <option value="2">deacon</option>
                                <option value="3">priest</option>
                                <option value="4">monk</option>
                            </select>
                        </dd>
                  
                </dl >
                
                <dl id="br2">
                <dt class="inl">martial status</dt>
                        <dd  class="inl">
                            <select name="martial" class="ddw" id="br3" required>
                                 <option disabled selected value="x">select one</option>
                                <option value="0">single</option>
                                <option value="1">married</option>
                                <option value="2">divorced</option>
                            </select>
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