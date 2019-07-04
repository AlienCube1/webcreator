<html>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>


<body>
<ul>
  <li><a href="#home">Add title</a></li>
  <li><a href="#news">Add paragraph</a></li>
  <li><a href="#contact">Add button</a></li>
  <li><a href="#about">Add entry field</a></li>
</ul>



<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<form method='post'>
	<input type='text' name = 'title'>
	<label for="title">Enter title</label>
	<input type='text' name = 'header'>
	<label for='header'>Enter header</label> 
	<input type='text' name = 'paragraph'>
	<label for='paragraph'>Enter a paragraph</label>
	<input type='submit' name = 'submit' value= 'Append'>
</form>

<form action='index.php' method='post'>
	<input type='submit' name = 'see' value= 'see your site'>
</form>



<div id="new" align="center">
</div> 


</div>
<!--
<script>
function create() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("new").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "index.php", true);
  xhttp.send();
}
</script>
-->

</body>
</html>

<?php

if(isset($_POST['submit'])){
	$title = $_POST['title'];
	$header = $_POST['header'];
	$paragraph = $_POST['paragraph'];

	if(file_exists("index.php")) {
	#echo "File exists!";
	$file = fopen("index.php", 'w') or die("Failed to open the file.");
	#echo "ajde";
	$text = "<html> \n <body> \n <title>" . $title . "</title> \n <header>" . $header ."</header> \n <p>" . $paragraph . "</p> \n </body> \n </html>";
	fwrite($file, $text) or die("Could not write to a file, please try again!");
	fclose($file); }
	


	elseif(file_exists('index.php') == false) {
		
		$new_file = fopen("index.php", 'w') or die("Failed creating a file.");
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






?>