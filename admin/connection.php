<?php 

ob_start();
session_start();

$mysql_data = array(
	"host" => "localhost",
	"name" => "sport_center",
	"user" => "root",
	"pass" => "123456",
	);

$db = @new mysqli($mysql_data["host"], $mysql_data["user"], $mysql_data["pass"], $mysql_data["name"]);

mysqli_query($db,"SET NAMES UTF8");
mysqli_query($db,"SET CHARACTER SET UTF8");

if($db->connect_errno){
	die($db->connect_error);
	mysqli_close($db);
}

?>