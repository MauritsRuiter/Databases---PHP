<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dripstore</title>
	<!-- CSS link -->
	<link rel="stylesheet" href="css/indexstyle.css">
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
			<?php
				class TableRows extends RecursiveIteratorIterator {
				function __construct($it) {
					parent::__construct($it, self::LEAVES_ONLY);
				}

				function current() {
					return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
				}

				function beginChildren() {
					echo "<tr>";
				}

				function endChildren() {
					echo "</tr>" . "\n";
				}
			}

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "module_8";

			try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conn->prepare("SELECT id, name, price, img FROM product");
			$stmt->execute();

			while ($row = $stmt->fetch()) {
				echo '<div class="product-box">';
				echo '<a href="product'.$row['id'].'.php"><img class="product-img" src="'. $row['img'].' "></a>';
				echo '<h2 class="product-title"> '.$row['name'].' </h2>';
				echo '€'.$row['price']. "\n";
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
</body>
</html>