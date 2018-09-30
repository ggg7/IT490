#!/usr/bin/php
<?php
	//Mock data
	//$user = 'peter';
	//$pass  '';

	//Connecting to
	//the server and selecting the database
	$servername = "localhost";
	$username = "dbAdmin";
	$password = "password123!";
	$dbname = "loginDB";
	$conn = mysqli_connect($servername, $username, $password,$dbname);

	$user = $_POST['user'];
        $pass = $_POST['pass'];

	//Checking if connection is established and relaying the status in a message
	if(!$conn)
	{
        	printf ("Connection failed: " . mysqli_connect_error());
	}
	if($conn)
	{
       		printf ("Connection Successful!\n");
	}

	//Query the database
	$result = mysqli_query($conn, "select * from loginTable where username ='$user' and password = '$pass'") or die("Failed to query".mysqli_error());

	$row = mysqli_fetch_array($result);
	//Check to see if mock username and password match the data in the database
	//if matches display this
	if($row['username'] == $user && $row['password'] == $pass)
	{
		printf ("Login successful!\nWelcome user ".$row['username']);
	}
	//if it does not, display this
	else
	{
		printf ('Login failed\n');
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

