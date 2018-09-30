#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
$user="peter";
$pass="1234";
$conn = mysqli_connect("localhost","dbAdmin","password123!","loginDB");
if($conn)
{
	printf("Connection Succeful");
}
$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}

if($user == "peter" && $pass == "1234")
{
	printf("Login Successful\nWelcome user peter");
}
else
{
	printf("Login failed\n");
}

$request = array();
$request['type'] = "Login";
$request['username'] = "steve";
$request['password'] = "password";
$request['message'] = $msg;
$response = $client->send_request($request);
//$response = $client->publish($request);

echo "client received response: ".PHP_EOL;
print_r($response);
echo "\n\n";

echo $argv[0]." END".PHP_EOL;

