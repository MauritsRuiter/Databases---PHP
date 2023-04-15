<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productspecificatie</title>
    <link rel="stylesheet" href="css/productstyle.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- Header -->
	<header>
		<!-- Nav -->
		<div class="nav container">
			<a href="http://localhost/module_8/Databases%20&%20PHP" class="logo">Dripstore</a>
			<!-- Back Icon  -->
            <a href="index.php" class='bx bx-arrow-back' id="back-icon"></a>
        </div>
	</header>
   <?php
	$productid = $_GET['id'];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "module_8";

	try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare("SELECT id, name, price, img FROM product WHERE id=$productid");
	$stmt->execute();

	while ($row = $stmt->fetch()) {
		echo '<div class="product-box">';
		echo '<img class="product-img" src="'. $row['img'].' ">';
		echo '<h1 class="product-title"> '.$row['name'].' </h1>';
		echo '<h3 class="price"> €'.$row['price']. '</h2>';
		echo '<i class="bx bx-shopping-bag add-cart"></i>';	
		echo '</div>';
	}

	// set the resulting array to associative
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
		echo $v;
	}
	} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
	}
	$conn = null;
	echo "</table>";

	?>
    <footer>
		<p>&copy; <?php echo date("Y");?> Dripstore. All rights reserved.</p>
		<br>
		<a href="#">Privacy Policy </a>
		<span style="font-size: 0.8rem;">|</span>
		<a href="#"> Return Policy </a>
		<span style="font-size: 0.8rem;">|</span>
		<a href="#"> Terms of Service</a>
	</footer>
</body>
</html>