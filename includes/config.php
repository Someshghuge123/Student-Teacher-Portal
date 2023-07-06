<?php
/*
$user_name = "root";
$password = "";
$database = "srtmun_sams";
$server = "localhost";
$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);


if (!$db_found) {
	die("DATABASE not found!contact glitchbusterTechnologies@gmail.com/app on +919372226665 or click the link for help.");
}

*/
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$db_found = mysqli_connect("localhost", "root", "", "mgmgoogleclass");
 
// Check connection
if($db_found === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>