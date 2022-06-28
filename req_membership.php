<?php $title="registration page";
$direct="<a href ='index.php'><img src='book.svg' alt='profile image' class='profile rect'>";
include("header.php");
?>
    <div class="c2 cent">
        <h1>create account</h1>
        <form action="req_membership.php" method="post">
            <dl>
                <dt>name</dt>
                <dd>
                    <input type="text" name="menu_name" id="">
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
                <input type="submit" value="create" name="sb">
            </div>
        </form>   
</div>
 <?php include("footer.php");?>