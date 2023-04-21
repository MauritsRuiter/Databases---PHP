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
	class TableRows extends RecursiveIteratorIterator
	{
		function __construct($it)
		{
			parent::__construct($it, self::LEAVES_ONLY);
		}
	}
	$productid = $_GET['id'];
	include("dbconnect.php");
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT id, name, price, img FROM product WHERE id=$productid");
		$stmt->execute();

		while ($row = $stmt->fetch()) {
			echo '<div class="product-box">';
			echo '<img class="product-img" src="' . $row['img'] . '">';
			echo '<h1 class="product-title"> ' . $row['name'] . ' </h1>';
			echo '<h3 class="price">&euro;' . $row['price'] . '</h2>';
			echo '<i class="bx bx-shopping-bag add-cart"></i>';
			echo '</div>';

			echo '<div class="cart">';
			echo '<h2 class="cart-title">Your Cart</h2>';
			echo '<div class="cart-content">';
			echo '<div class="cart-box">';
			echo '<img src="' . $row['img'] . '" alt="" class="cart-img">';
			echo '<div class="detail-box">';
			echo '<div class="cart-product-title">' . $row['name'] . '</div>';
			echo '<div class="cart-price">&euro;' . $row['price'] . '</div>';
			echo '<input type="number" value="1"	 class="cart-quantity">';
			echo '</div>';
			echo '<i class="bx bxs-trash-alt cart-remove"></i>';
			echo '</div>';
			echo '</div>';
			echo '<div class="total">';
			echo '<div class="total-title">Total</div>';
			echo '<div class="total-price">&euro;' . $row['price'] . '</div>';
			echo '</div>';
			echo '<button type="button" class="btn-buy">Buy Now</button>';
			echo '<i class="bx bx-x" id="close-cart"></i>';
			echo '</div>';
			echo '</div>';
		}

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		foreach ($stmt->fetchAll() as $k => $v) {
			echo $v;
		}
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	?>
	<footer>
		<p>&copy; <?php echo date("Y"); ?> Dripstore. All rights reserved.</p>
		<br>
		<a href="#">Privacy Policy </a>
		<span style="font-size: 0.8rem;">|</span>
		<a href="#"> Return Policy </a>
		<span style="font-size: 0.8rem;">|</span>
		<a href="#"> Terms of Service</a>
	</footer>
	<script>
		let cartIcon = document.querySelector(".add-cart");
		let cart = document.querySelector(".cart");
		let closeCart = document.querySelector("#close-cart");
		//open Cart
		cartIcon.onclick = () => {
			cart.classList.toggle("active")
		}
		//close Cart
		closeCart.onclick = () => {
			cart.classList.remove("active")
		}
	</script>
</body>

</html>