#!/usr/bin/php
<?php

//Setting the loginDB login information for mysql
$servername = "localhost";
$username = "dbAdmin";
$password = "password123!";
$dbname = "loginDB";
$conn = mysqli_connect($servername, $username, $password, $dbname);
//Checking if connection is established and relaying the status in a message
if(!$conn)
{
        die("Connection failed: " . mysqli_connect_error());
}
if($conn)
{
        die("Connection Successful!");
}

//Setting the username received from the front end to the variable login
$login=$_POST['username'];

//Checking to see if the username is empty
if($username!='')
{
	$query = "select * from username where login='".$username."'" or die("Connection failed: " . mysqli_connect_error());
	$res = mysqli_fetch_row($query);
	if($res)
	{
		$_SESSION['username']=$login;
		echo "welcome to php";
	}
	else
	{
		echo 'You entered a username not found in the database';
	}
}
else
{
	echo 'Enter username';
}

function ActuallyDoLogin($username, $password)
{

	return true;
}




require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function doLogin($username,$password)
{
    // lookup username in databas
    // check password
    return true;
    //return false if not valid
}

function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "login":
      return doLogin($request['username'],$request['password']);
    case "validate_session":
      return doValidate($request['sessionId']);
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();
?>

