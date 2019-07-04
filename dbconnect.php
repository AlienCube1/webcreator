<html>
<body>

<form method='post'>
<select name="Database">
  <option value="MYSQL">MySQL</option>
  <option value="POSTGRES">POSTGRES</option>
</select>
<br></br>
<h4>Name of file: </h4>
<input type='text' name='name_of_file'> <br>
<h4>Host name:</h4>
<input type='text' name='host'> <br>
<h4>Username: </h4>
<input type='text' name='username'> <br>
<h4>Password:</h4>
<input type='password' name='password'> <br>
<h4>Database Name:</h4>
<input type='text' name = 'db_name'> <br>
<input type='submit' name='upload'>
</form>



</body>
</html>



<?php
if(isset($_POST['upload'])) {
$get_name = $_POST['Database'];
if ($get_name == 'MYSQL') {
	$name = $_POST['name_of_file'];
	$host = $_POST['host'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$db_name = $_POST['db_name'];
	$source = 'user_files/' . $name;
	$file = fopen($source, 'w') or die("Failed to open the file.");
	$file = fopen($source, 'a') or die("i fucked up");
	$dsn = "$dsn";
	$start = "<?php";
	$first_row = '$dsn' ."=" ."'mysql:host=".$host.";dbname=".$db_name."'" . ";";
	$second_row = '$pdo'."=".'new PDO' . '(' . '$dsn' . ',' . "'" . $username . "'" . ',' ."'" .$password ."'" .');'; 
	$third_row = '$pdo' . '->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);';
	$fourth_row = 'if' . '(' . '$pdo' . ')' . '{';
	$fifth_row = "echo 'Connection successful'" . ';' . '}'; 
	$end = '?>';
	$text = $start . "\n" . $first_row . "\n" . $second_row . "\n" . $third_row . "\n" . $fourth_row . "\n" .$fifth_row ."\n".$end;
	fwrite($file, $text) or die("Could not write to a file, please try again!");
	if (fwrite) {
		header("location: user_files/conf.php");

	}

	fclose($file); 

}
}

/*
<?php 
$dsn='mysql:host=localhost;dbname=user';
$pdo = new PDO($dsn,'root','Marcel123');
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
if($pdo)  { 
 echo 'Connection successful'; } ?>



$host = "localhost";
$name = "root";
$pw = "Marcel123";
$dbname = 'user';
$uname = $_POST['usrnm'];
$psw = $_POST['psw'];
$hashpsw = md5($psw);
*/
?>