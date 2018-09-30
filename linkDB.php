<?php
session_start();

$hostname = "localhost";
$username = "dbAdmin";
$password = "password1234";

//error reporting code
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors' , 1);

//db connection
//$db = mysqli_connect($hostname, $username, $password);
$db = new mysqli($hostname, $username, $password);
?>

<html>
    <h3>
<?php
if (mysqli_connect_errno())
{	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
exit();          }
else{
	print ('Successful');
}
?>

    </h3>
</html>
