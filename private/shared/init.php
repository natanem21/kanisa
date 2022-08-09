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

            <div id="bap" class="tb">
                <div class="tr">
                    <h3 class="td">name of the person to be baptised</h3>
                    <input type="text" name="nm" class="td">
                </div>
                <div class="tr">
                    <h3 class="td">data of birth</h3>
                    <input type="text" name="dob" class="td">
                </div>
                <div class="tr">
                    <h3 class="td">place of birth</h3>
                    <input type="text" name="pob" class="td">
                </div>
                <div class="tr">
                    <h3 class="td">fathers name</h3>
                    <input type="text" name="fm" class="td">
                </div>
                <div class="tr">
                    <h3 class="td">sex</h3>
                    <input type="text" name="sx" class="td">
                </div>
                <div class="tr">
                    
                    <h3 class="td">mothers name</h3>
                    <input type="text" name="mm" class="td">
                </div>

                <div class="tr">
                    
                    <h3 class="td">God father or mother name</h3>
                    <input type="text" name="Gfm" class="td">
                </div>
                <div class="tr">
                <h3 class="td">reason</h3>
                <input class="td" type="text" name="rm">
                </div>
              
                </hr>
                <input type="submit" value="send request" name="sb1" class="td">
                
            </div>
<?php
}}
?>

