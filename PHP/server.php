<?php
/**
 * Created by PhpStorm.
 * User: abanna
 * Date: 4/26/2017
 * Time: 7:20 AM
 */
/*$username=$_GET['txtUsername'];
$pass=$_GET['txtPassword'];
*/
$username=$_POST['txtUsername'];
$pass=$_POST['txtPassword'];
#echo "your name is " . $username ." your password is ".$pass;
if($username=="abed" && $pass=="123") {
    header("Location: /php_basics1/mail.php");
    die();
}
else
{
    header("Location: /php_basics1/login.html");
    die();

}
