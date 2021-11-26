<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "projeto";

	$connect = mysqli_connect($servername, $username, $password, $dbname);

	if(mysqli_connect_error()):
	echo "Falha de conexão:".mysqli_connect_error();
	endif;

?>