<?php include("../shared/init.php");?>
<?php include(_private."/admin_share/header.php");?>
   
    <form action="employees.php" method="post">
        <input type="submit"  name="sb" Value="add employees">
        
    </form>
    <h1>
        this will manage employees that is adding deactivating and retiring employees
    </h1>
   
<?php include(_private."/admin_share/footer.php");?>
<?php 
if(isset($_POST['sb']))
{
        echo "form has been set";
        $sql = "SELECT * from `members` ";
        $result =$DBC->query($sql);

        if($result)
            {

            while($x = $result->fetch_assoc())
            {

            }
            }
}

?>