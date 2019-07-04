<?php

session_start();

if(isset($_POST['send_over'])) {
$name = $_POST['vars'];
$_SESSION['code'] = $name;
if($name) {
	header('location: main.php');
}
}
if(isset($_POST['delete_over'])){
	$name = "user_files/" . $_POST['vars'];
	if (!unlink($name)) echo "Could not delete file";
	else{ 
		echo "File " .$name . "delete successfully";
		header('location: main.php');
	}
}



?>