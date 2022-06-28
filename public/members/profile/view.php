<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>personal profile</title>
</head>
<body>
   <a href="index.php" class="">back to main</a>
   <div class="new">
       <h1>edit  account</h1>
       <form action="" method="post">
           <dl>
               <dt>name</dt>
               <dd>
                   <input type="text" name="manu_name" id="">
               </dd>
           </dl>
           <dl>
               <dt>position</dt>
               <dd>
                   <select name="position" id="">
                       <option value="1">one</option>
                        <option value="2">two</option>
                   </select>
               </dd>
           </dl>
           <dl>
               <dt>visible</dt>
               <dd>
                   <input type="hidden" name="visible" value="0">
                   <input type="checkbox" name="visible" value="1"></dd>
           </dl>
           <div id="operation"> 
               <input type="submit" value="create">
           </div>
       </form>
   </div> 
</body>
</html>
<?php

?>