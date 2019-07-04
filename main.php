<html>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>


<body>


<a href='user_files/index.php' target= "_blank" id='check_web' >Check your website</a>
<div class = 'buttons'>
<form action = "create.php">
<input class = 'butn' type='submit' id= "submit_new" value= 'Create a file'>
</form>
</div>

<div class = 'buttons'>
<form action = "dbconnect.php">
<input class = 'butn' type='submit' id="create_db" value= 'Create a database'>
</form>
</div>
 


<?php

//// Used for scanning the directory and returning file names that are in that directory, I'm doing this so i can go throug my files and pick which one to display.
$path = 'user_files/';
$files = scandir($path);
//// It's returning an array, hence the foreach.
$files = array_diff(scandir($path), array('.','..'));




echo"<div class='span-row-2' style='borded: thin solid black'>";
foreach($files as $file_name) { ?>   
	
	<form action='read_file.php' method='post'>
	<input readonly type='text'  name= 'vars' value='<?php echo $file_name ?>'>
	<input type='submit' name='send_over' value ='Check the code'>
	<input type='submit' name='delete_over' value='Delete File'>
	</form>  
	
	<?php
	#
}
echo"</div>";
#echo "</div>";
?>

<div style="borded: thin solid black float:left">
<form method='post'>
	<textarea rows="40" cols="110" name ='code'>
	<?php    
	

	//// TO READ THE CONTENTS OF CODE AND DISPLAY
	//// The reason i Inlcuded this file is so that I can send info over
	//// to another page that looks what file I request and here it shows
	//// It's content, it's sloppy but it's working.
	include 'read_file.php';
	$name = $_SESSION['code'];
	$source = 'user_files/' . $name;
	$open_file = fopen($source, 'r') or die("File does not exist");
	while(!feof($open_file)){
		$line = fgets($open_file);
		echo $line;
	}


	fclose($open_file)

	?>
	</textarea>
	<input type='submit' name = 'submit' value= 'Append'>
</form>
</script>
</div>
</body>
</html>



 <!--- Function to create a new file -->
<?php
include 'read_file.php';
$name = $_SESSION['code'];
$source = 'user_files/' . $name;
if(isset($_POST['submit'])){
	$code = $_POST['code'];
	if(file_exists($source)) {
	echo "File exists!";
	$file = fopen($source, 'w') or die("Failed to open the file.");
	$text = $code;
	fwrite($file, $text) or die("Could not write to a file, please try again!");
	fclose($file); 
	header("location: main.php");
	}
	

//// Only do this if the file does not exist
	elseif(file_exists($source) == false) {
		
		$new_file = fopen($source, 'w') or die("Failed creating a file.");
		$text = "<html> \n <body> \n <title>" . $title . "</title> \n <header>" . $header ."</header> \n <p>" . $paragraph . "</p> \n </body> \n </html>";
		if (!$new_file) {
			echo "Error while opening file";
		}
		else {
			#echo "Opened file successfuly";
		fwrite($new_file, $text) or die("Could not write to a file, please try again!");
		fclose($new_file);}
	}
	elseif(file_exists($source)) {
		echo "That file alredy exists!";
	}
}

?>