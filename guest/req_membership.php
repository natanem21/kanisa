<?php require_once("../private/shared/database.php");?>
<?php session_start();?>
<?php $title="registration";
$direct="<a href ='index.php'><img src='book.svg' alt='profile image' class='profile rect'>";

?>

<style>
            .c
        {
        
            left: 30%;
            background-color: antiquewhite;
            border-radius:30px;
            font-family: 'Roboto', sans-serif;
            
        
        }
       
        .c3
        {
            background-color:black;
        }
        .certf
        {
            background-color:#6666;
        }
        .cert:hover
        {
            background-color:red;
        }
        @media  only screen and (max-width:600px)
        {.c{
            left:0%;
        }
        }
   /*  .inl{
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
    } */
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
    <link rel="stylesheet" href="style.css">     
</head>
<body> 
    <div class="tb c">
        <form action="setpass.php" method="post" name="myForm" onsubmit="return validate();" enctype="multipart/form-data">
            <h1 class="tr">create account</h1>

            <div class="tr">
                <h3 class="td">first name </h3>
                <input type="text" name="u_name" id="" required class="td">
            </div>

            <div class="tr">
                <h3 class="td">last name</h3>
                <input type="text" name="l_name" id="" required  class="td">
            </div>

            <div class="tr">
                <h3 class="td">christ name  </h3>
                <input type="text" name="c_name" id="" required  class="td">
            </div>

            <div class="tr">
                <h3 class="td">Date Of Birth</h3>
                <input type="date" name="age" id="" required class="td">
            </div>

            <div class="tr">
                <h3 class="td">phone number  </h3>
                <input type="text" name="phone_addr" id="" required  class="td">
            </div>
            <div class="tr">
                <h3 class="td">home adress  </h3>
                <input type="text" name="home_addr" id="" required  class="td">
            </div>
                    
             <div class="tr">
                <h3 class="td">email  </h3>
                <input type="email" name="email_addr" id="em" required class="td">
             </div>   
             <div class="tr">
                <h3 class="td">job/proffession</h3>
                <input type="text" name="job" id="" required class="td">
             </div>    
             <div class="tr">
                <h3 class="td">profile image</h3>
                <input type="file" name="prof_img" id="" accept="image/*">
             </div>
             <div class="tr certf">
                <input type="text" name="num_of_cert" id="cer_no" style="display:none">
                <div name="c"  class="mk_btn td" onclick="add();"> <h3>add certificate</h3></div> 
                <div class="cer" id ="cert" name="cert"></div> 
             </div>
                <div class="tr">
                   <h3 class="td">gender</h3>
                   <select name="gender" class="ddw td" required>
                                <option disabled selected value="x">select one</option>
                                <option value="0">male</option>
                                <option value="1">female</option>
                               
                    </select>
                </div>
                
                <div class="tr">
                    <h3 class="td">clerical position</h3>
                    <select name="position" class="ddw td" required>
                                <option disabled selected value="x">select one</option>
                                <option value="1">non clergy</option>
                                <option value="2">deacon</option>
                                <option value="3">priest</option>
                                <option value="4">monk</option>
                    </select>
                </div>
                   <div class="tr">
                        <h3 class="td">martial status</h3>
                        <select name="martial" class="ddw td" id="br3" required>
                                 <option disabled selected value="x">select one</option>
                                <option value="0">single</option>
                                <option value="1">married</option>
                                <option value="2">divorced</option>
                        </select>
                   </div>
                
                <div id="operation" class="button"> 
                  <input type="submit" value="create" name="sb" class="btn td"/>
                </div>
            
        </form>  
        <div class="button">  <h4>already has an account <a href="login.php">login</a> </h4> </div>
      
</div>
</body>
</html>


 <?php include("footer.php");?>