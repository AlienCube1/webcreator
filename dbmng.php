<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form method='post'>
<?php
include 'user_files/conf.php';
//// QUERY TO GET THE NAMES OF COLUMNS
$stmt = $pdo->query('SELECT * FROM user');
$fields = array_keys($stmt->fetch(PDO::FETCH_ASSOC));
//// ITERATING THROUGH AN ARRAY TO CREATE <h> ELEMENTS FOR AS MANY NAMES OF COLS THERE ARE
$arr_lenght = sizeof($fields);
echo "<table>";
echo "<tr>";
for($i = 0; $i < $arr_lenght; $i++){
	echo "<td>" . $fields[$i]."</td>" . "<br>";

}
echo "</tr>";
echo "</table>";


?>
</form>


</body>
</html>




<?php

#### CHANGE 'config.php' TO MATCH YOUR DATABASE #### NAME
require_once('user_files/conf.php');
// if($pdo){
// 	echo "Successfully Connected!";
// }




?>