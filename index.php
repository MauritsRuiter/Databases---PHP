<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dripstore</title>
	<!-- CSS link -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Boxicons link -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
	<!-- Header -->
	<header>
		<!-- Nav -->
		<div class="nav container">
			<a href="#" class="logo">Dripstore</a>
			<!-- Cart Icon  -->
			<i class='bx bx-shopping-bag' id="cart-icon"></i>
		</div>
		<!-- Cart -->
		<div class="cart">
			<h2 class="cart-title">Your Cart</h2>
			<!-- Content -->
			<div class="cart-content">
				<div class="cart-box">
					<img src="img/product2.jpg" alt="" class="cart-img">
					<div class="detail-box">
						<div class="cart-product-title">Earbuds</div>
						<div class="cart-price">&euro; 100</div>
						<input type="number" value="1"	 class="cart-quantity">
					</div>
					<!-- Remove Cart -->
					<i class='bx bxs-trash-alt cart-remove' ></i>
				</div>
			</div>
			<!-- Total -->
			<div class="total">
				<div class="total-title">Total</div>
				<div class="total-price">&euro; 0</div>
			</div>
			<!-- Buy Button -->
			<button type="button" class="btn-buy">Buy Now</button>
			<!-- Cart Close -->
			<i class='bx bx-x' id="close-cart"></i>
		</div>
	</header>
	<!-- Shop -->
	<section class="shop container">
		<h2 class="section-title">Shop Products</h2>
		<!-- Content -->
		<div class="shop-content">
			<!-- Box 1 -->
			<div class="product-box">
				<img src="img/product1.jpg" alt="" class="product-img">
				<h2 class="product-title">AEROREADY SHIRT</h2>
				<span class="price">&euro; 25</span>
				<i class='bx bx-shopping-bag add-cart'></i>
			</div>
			<!-- Box 2 -->
			<div class="product-box">
				<img src="img/product2.jpg" alt="" class="product-img">
				<h2 class="product-title">WIRELESS EARBUDS</h2>
				<span class="price">&euro; 100</span>
				<i class='bx bx-shopping-bag add-cart'></i>
			</div>
			<!-- Box 3 -->
			<div class="product-box">
				<img src="img/product3.jpg" alt="" class="product-img">
				<h2 class="product-title">HOODED PARKA</h2>
				<span class="price">&euro; 45</span>
				<i class='bx bx-shopping-bag add-cart'></i>
			</div>
			<!-- Box 4 -->
			<div class="product-box">
				<img src="img/product4.jpg" alt="" class="product-img">
				<h2 class="product-title">STRAW METAL BOTTLE</h2>
				<span class="price">&euro; 24,95</span>
				<i class='bx bx-shopping-bag add-cart'></i>
			</div>
			<!-- Box 5 -->
			<div class="product-box">
				<img src="img/product5.jpg" alt="" class="product-img">
				<h2 class="product-title">METAL SUNGLASSES</h2>
				<span class="price">&euro; 50</span>
				<i class='bx bx-shopping-bag add-cart'></i>
			</div>
			<!-- Box 6 -->
			<div class="product-box">
				<img src="img/product6.jpg" alt="" class="product-img">
				<h2 class="product-title">BACK HAT</h2>
				<span class="price">&euro; 50</span>
				<i class='bx bx-shopping-bag add-cart'></i>
			</div>
			<!-- Box 7 -->
			<div class="product-box">
				<img src="img/product7.jpg" alt="" class="product-img">
				<h2 class="product-title">BACKPACK</h2>
				<span class="price">&euro; 70</span>
				<i class='bx bx-shopping-bag add-cart'></i>
			</div>
			<!-- Box 8 -->
			<div class="product-box">
				<img src="img/product8.jpg" alt="" class="product-img">
				<h2 class="product-title">ULTRABOOST 22</h2>
				<span class="price">&euro; 45</span>
				<i class='bx bx-shopping-bag add-cart'></i>
			</div>
			<!-- Box 9 -->
			<div class="product-box">
				<img src="img/product9.jpg" alt="" class="product-img">
				<h2 class="product-title">BLACK HAT</h2>
				<span class="price">&euro; 30</span>
				<i class='bx bx-shopping-bag add-cart'></i>
			</div>
			<!-- Box 10 -->
			<div class="product-box">
				<img src="img/product10.jpg" alt="" class="product-img">
				<h2 class="product-title">SHORTS</h2>
				<span class="price">&euro; 19,95</span>
				<i class='bx bx-shopping-bag add-cart'></i>
			</div>
			<!-- Box 11 -->
			<div class="product-box">
				<img src="img/product11.jpg" alt="" class="product-img">
				<h2 class="product-title">GLOVES</h2>
				<span class="price">&euro; 15</span>
				<i class='bx bx-shopping-bag add-cart'></i>
			</div>
			<!-- Box 12 -->
			<div class="product-box">
				<img src="img/product12.jpg" alt="" class="product-img">
				<h2 class="product-title">SUMMER HAT</h2>
				<span class="price">&euro; 25</span>
				<i class='bx bx-shopping-bag add-cart'></i>
			</div>
		</div>
	</section>
	<a href="form.php" class='bx bxs-user' id="user-icon"></a>
	<!-- Footer -->
	<footer>
		<p>&copy; <?php echo date("Y");?> Dripstore. All rights reserved.</p>
		<br>
		<a href="#">Privacy Policy </a>
		<span style="font-size: 0.8rem;">|</span>
		<a href="#"> Return Policy </a>
		<span style="font-size: 0.8rem;">|</span>
		<a href="#"> Terms of Service</a>
	</footer>
	<script defer src="script/script.js"></script>

<?php
	//Vars
	$log_statement = "Connected successfully to database";
	$log_statement2 = "New records created successfully";
	$servername = "localhost";
	$username = "root";
	$password = "";

	//Make console_log to be able to log instead of doc write
	function console_log($output, $with_script_tags = true) {
		$js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
	');';
		if ($with_script_tags) {
			$js_code = '<script>' . $js_code . '</script>';
		}
		echo $js_code;
	}
	//Connecting code to database
	try {
	$conn = new PDO("mysql:host=$servername;dbname=module_8", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//Succes Message
	console_log($log_statement);
	} catch(PDOException $e) {
	//Failed Message
	echo "Connection failed: " . $e->getMessage();
	//Inserting data to database
	$sql = "INSERT INTO MyGuests (firstname, lastname, email)
	VALUES ('John', 'Doe', 'john@example.com')";
	// use exec() because no results are returned
	$conn->exec($sql);
	console_log($log_statement2);
	}
?>
</body>

</html>