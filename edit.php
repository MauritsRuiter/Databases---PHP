<?php
// Start the session
session_start();

// Include the database connection
require_once "dbconnect.php";


// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {

	// Get the name ID and new name information from the form
	$id = $_POST["id"];
	$name = $_POST["name"];
	$price = $_POST["price"];
	$img = $_POST["img"];

	// Prepare the SQL statement
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare("UPDATE product SET name=:name, price=:price, img=:img WHERE id=:id");

	// Bind the parameters to the statement
	$stmt->bindParam(':id', $id);
	$stmt->bindParam(':name', $name);
	$stmt->bindParam(':price', $price);
	$stmt->bindParam(':img', $img);

	// Execute the statement
	$stmt->execute();


	$conn = null;
}


if (isset($_POST["id"])) {
	$id = $_POST["id"];

	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare("SELECT * FROM product WHERE id=:id");
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	$nameData = $stmt->fetch(PDO::FETCH_ASSOC);

	
	$name = $nameData["name"];
	$price = $nameData["price"];
	$img = $nameData["img"];
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Edit name</title>
	<link rel="stylesheet" href="css/editstyle.css">
</head>

<body>
	<div class="flex-wrapper">
		<div class="wrapper">
			<h1>Edit name</h1>
			<form action="edit.php" method="post">
				<label for="id">Id:</label><br>
				<span><?php echo $id; ?></span>
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<br><br>
				<label for="name">name:</label><br>
				<input type="text" name="name" value="<?php echo $name; ?>">
				<br><br>
				<label for="price">Price:</label><br>
				<input type="text" name="price" value="<?php echo $price; ?>">
				<br><br>
				<label for="img">Image:</label><br>
				<input type="text" name="img" value="<?php echo $img; ?>">
				<br><br>
				<button class="update-button" type="submit" name="update">Update name</button>
			</form>
		</div>
	</div>
</body>

</html>