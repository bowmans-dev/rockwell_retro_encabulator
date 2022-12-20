<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

	if (isset($_SESSION['user_name']) && $_SESSION['password'] == true) {
		echo "Welcome to the member's area, " . $_SESSION['user_name'] . "!";
	} else {
		echo "Welcome page.";
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="./dropdown.js"></script>
		<link rel="stylesheet" href="style.css">
	</head>   
<body>

  <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $type = test_input($_POST["type"]);
      $category = test_input($_POST["category"]);
      $subCategory = test_input($_POST["subCategory"]);
      $africa = test_input($_POST["africa"]);
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  ?>

	<a href="logout.php">Logout</a>

	<div id="demo"></div>

	<br>
	Hello, <?php echo $user_data['user_name']; ?>

	<script defer> 
	  var username = <?php echo $user_name; ?>
	  document.getElementById("demo").innerHTML = "🐝"
	  console.log(username)

    function runSelectAfrica() {
      document.getElementById("resultCountryAfrica").innerHTML = document.getElementById("selectAfrica").value;
    }
	</script>

  <h2>Select a category</h2>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Type: <select name="type" id="type">
        <option value="Type 1 (default)" selected></option>
    </select>  
    <br><br>
    Category: <select name="category" id="category">
        <option value="Please Select a Category"></option>
    </select>
    <br><br>
    Sub-Category: <select name="subCategory" id="subCategory">
        <option value="Select a Category (optional)"></option>
    </select>
    <br><br>
    <input type="submit" value="Submit">
  </form>
  <?php 
    $mysqli = NEW MySQLi ('localhost', 'root', 'root', 'regions');
    $resultSet = $mysqli->query("SELECT name FROM africa");
  ?> 

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <select id="selectAfrica" name="africa" onchange="runSelectAfrica()">
      <option value="africa" selected="selected">Africa<option>
      <?php
      while($rows = $resultSet->fetch_assoc())
      {
        $name = $rows['name'];
        echo "<option>$name</option>";
      }
      ?>
    </select>
    
  </form>

  <?php
    echo "<h2>Your Input:</h2>";
    echo $type;
    echo "<br><br>";
    echo $category;
    echo "<br><br>";
    echo $subCategory;
    echo "<br><br>";
    echo $africa->name->value->text;
  ?>
  <p>Country Selected:</p><p id="resultCountryAfrica"></p>

</body>
</html>