<html>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>


<body>
<!--
<ul>
  <li><button type='button' onclick='button()'>Add Button</button></li>
  <li><a href="#news">Add paragraph</a></li>
  <li><a href="#contact">Add button</a></li>
  <li><a href="#about">Add entry field</a></li>
</ul>
-->
<!-- <form action = "index.php">
<input type='submit' id= "submit_new" value= 'See your website'>
</form> -->

<a href='user_files/index.php' target= "_blank">Check your website</a>

<form action = "create.php">
<input type='submit' id= "submit_new" value= 'Create a file'>
</form>


<p> 


<?php

//// Used for scanning the directory and returning file names that are in that directory, I'm doing this so i can go throug my files and pick which one to display.
$path = 'user_files/';
$files = scandir($path);
//// It's returning an array, hence the foreach.
$files = array_diff(scandir($path), array('.','..'));
echo "<h4>Your Files</h4>";
foreach($files as $file_name) { ?>   
	
	<form action='read_file.php' method='post'>
	<input type='text'  name= 'vars' value='<?php echo $file_name ?>'>
	<input type='submit' name='send_over' value ='Check the code'>
	</form>  
	<?php
	#
}

//// I need a way so that when i click the link it remembers it in a variable which i can use in the 'To read the contents of code and display' block
?><!-- <p>
<div id ='Create'>
</div> -->

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<form method='post'>
	<textarea rows="40" cols="110" name ='code'>
	<?php    
	#sesion_start();
	//// TO READ THE CONTENTS OF CODE AND DISPLAY
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

<!--- FUNCTION TO SHOW THE WEBSITE -->
<!-- 
<script>
function show() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("Show").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "user_files/index.php", true);
  xhttp.send();
}
</script>

 --><!--- Function to create a new file -->


</div>
</body>
</html>

<?php
include 'read_file.php';
$name = $_SESSION['code'];
$source = 'user_files/' . $name;
if(isset($_POST['submit'])){
	$code = $_POST['code'];
	if(file_exists($source)) {
	#echo "File exists!";
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

}

// function code(string $header, string $title, string $paragraph ) {

// }




?>