<?php

session_start();
if(isset($_POST['send_over'])) {
$name = $_POST['vars'];
$_SESSION['code'] = $name;
if($name) {
	header('location: main.php');
}
}

?>