

<form method='post'>
<input type='text' name='file_name'>
<input type='submit' name='send_file_name' value="Create a file">
<?php

if(isset($_POST['send_file_name'])) {
$filename = $_POST['file_name'];
$source = 'user_files/' . $filename;
$new_file = fopen($source, 'w') or die("Failed creating a file.");
header("location:main.php");
}




?>