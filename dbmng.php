<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form method='post'>
<input type='submit' name='create_user' value='Create user'>
</form>
<?php
include 'user_files/conf.php';
if(isset($_POST['create_user'])){
	?>
	<form action='create_user.php' method='post'>
	
	<?php 
	include 'user_files/conf.php';
	////This is so that it automatically creates all the fields needed 
	$get_types = $pdo->query('SELECT * FROM user');
	$names_of = array_keys($get_types->fetch(PDO::FETCH_ASSOC));
	$arr_lenght_of_tb = sizeof($names_of);

	for($i = 0; $i < $arr_lenght_of_tb; $i++){ 
	echo"<input type='text' name=".$names_of[$i] .">";
	echo"<label for=". $names_of[$i] . ">" . $names_of[$i] . "</label>";
	}
	echo "<input type='submit' value='Add_User'>";
	echo "</form>";
}

?>
<?php
###########################################
//// When you find a block of comment such as these, surrounded by pound signs it means it's something you have to change in the code to get it to work for you, everything is explained so it should not be an issue.
###########################################



include 'user_files/conf.php';
//// QUERY TO GET THE NAMES OF COLUMNS
$stmt = $pdo->query('SELECT * FROM user');
#$stmt->execute();
$fields = array_keys($stmt->fetch(PDO::FETCH_ASSOC));
$data = $stmt->fetchall(PDO::FETCH_ASSOC);
// var_dump($data);
// print_r($data);

//// ITERATING THROUGH AN ARRAY TO CREATE <h> ELEMENTS FOR AS MANY NAMES OF COLS THERE ARE
$arr_lenght = sizeof($fields);
echo "<div id='my_table'>";
echo "<table>";
echo "<tr>";
for($i = 0; $i < $arr_lenght; $i++){
	echo "<th>" . $fields[$i]."</th>" . "<br>";}

echo "</tr>";

#############################################
//// ADD ONE OF THESE FOR EACH ROW YOU HAVE
//// echo "<td>" . $row['id']."</td>" . "<br>"; in '$row['____']' change ____ with the name of the row in database because i still can't change theese to tell
#############################################
$sql = $pdo->query('SELECT * FROM user');
$sqldata = $sql->fetchall(PDO::FETCH_ASSOC);
foreach($sqldata as $row) {
	echo "<tr>";
	////Use a for here
echo "<td>" . $row['id']."</td>" . "<br>";
echo "<td>" . $row['username']."</td>" . "<br>";
echo "<td>" . $row['password']."</td>" . "<br>";
echo "<td>" . $row['password_reset_key']."</td>" . "<br>";
echo "</tr>";
}

echo "</table>";
echo "</div>";

?>
</form>


</body>
</html>




<?php
#########################################
#### CHANGE 'config.php' TO MATCH YOUR DATABASE #### NAME
########################################
require_once('user_files/conf.php');
// if($pdo){
// 	echo "Successfully Connected!";
// }




?>