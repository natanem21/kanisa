<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teachers page</title>
</head>
<body>
<?php
if($_SESSION['role']!=4)
{
    header("location:"."/chms_for_eotc/guest/login.php");
}
?>
    <h1>
        this is teachers page
    </h1>
</body>
</html>