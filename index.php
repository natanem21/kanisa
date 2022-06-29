<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home </title>
    <link rel="stylesheet"  href="guest/style.css">      
</head>
<body>  
<div class="c">
    <div class="c1">
        <nav class="n1"><a href ='about_this_church.php'> <img src='guest/gg.png' alt='profile image' class='profile'>
            <h1 id="h">Ethiopian Orthodox Tewahido Church</h1>
            <h1 id="h">kidane mihret church</h1></a>
        </nav>
        <nav class="nn"> 
            <nav class="n2">
                <button class="b"onclick="window.open('login.php','_self','width=500px,height=500px,left=500px,top=300px')">LOGIN</button>
            </nav>
            <!-- this wil help to open the page in new window
                <nav class="n3"><button class="b" onclick="window.open('req_membership.php','_blank','width=500px,height=500px,left=500px,top=300px')">SIGNUP</button></nav> -->
            <nav class="n3">
                <button class="b" onclick="window.open('req_membership.php','_self')">SIGNUP</button>
            </nav>
        </nav>
        </div>
<div class="c2">
    <div class="go_right">
        <script>
              if(navigator.onLine)
                {
                     document.write('<iframe class="responsive-iframe" src="https://www.ethiopicbible.com/readings/today" sandbox="allow-forms allow-scripts"   ></iframe>');
                 }

                 else
                 {
                    document.write('<iframe class="responsive-iframe" src="book_holder.php" sandbox="allow-forms allow-scripts"   ></iframe>');
                 }
        </script>
    </div>

    <div class="go_left">
        <h1>books</h1>
        <button>book</button>
    </div>
</div>
<div class="cm">
<!-- reserved for futute use -->
</div>
<?php include("guest/footer.php");?>