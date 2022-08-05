<?php
session_start();
require_once("database.php");


ob_start();//output beffering is on
define("_shared",dirname(__FILE__));//chms_for_eotc\private\shared
define("_private",dirname(_shared));//chms_for_eotc\private

define("main",dirname(_private));//chms_for_eotc
define("_public",main."\public");//chms_for_eotc\public

$pub = strpos($_SERVER['SCRIPT_NAME'],'/public')+1;
$doc= substr($_SERVER['SCRIPT_NAME'],0,$pub);
define("WWW_ROOT",$doc);



$pri = strpos($_SERVER['SCRIPT_NAME'],'/private')+1;
$doc1= substr($_SERVER['SCRIPT_NAME'],0,$pri);
define("PRI_ROOT",$doc1);
function is_post_req()
{
    return $_SERVER['REQUEST_METHOD']=='POST';
}


if(!isset($_SESSION['user']))
{
    header("location:"."/chms_for_eotc/guest/login.php");
}
else
{
  
}

?>

<?php
    class Baptism {
        
        function Values(){

        
?>

            <div id="bap">
                <form action="req_services.php" method="post">
                <lable>name of the person to be baptised</label><br/>
                <input type="text" name="nm"><br/>
                <lable>sex</label><br/>
                <input type="text" name="sx"><br/>

                <label>data of birth</label><br/>
                <input type="text" name="dob"><br/>
                <lable>place of birth</label><br/>
                <input type="text" name="pob"><br/>
                <lable>fathers name</label><br/>
                <input type="text" name="fm"><br/>
                <lable>mothers name</label><br/>
                <input type="text" name="mm"><br/>
                <lable>God father or mother name</label><br/>
                <input type="text" name="Gfm"><br/>
                <lable>reason</label><br/>
                <input type="text" name="rm"><br/> </hr>
                <input type="submit" value="send request" name="sb1">
                </form> 
            </div>
<?php
}}
?>

