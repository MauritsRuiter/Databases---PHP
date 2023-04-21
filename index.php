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
			<!-- Search Icon  -->
			<button class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>
		</div>
	</header>
	<ul class="nav-menu">
                <li class="nav-item">
                    <a href="login.php" class="nav-link">Database</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Search</a>
                </li>
                <li class="nav-item">
                    <a href="login.php" class="nav-link">Login</a>
                </li>
            </ul>
	<!-- Shop -->
	<section class="shop container">
		<h2 class="section-title">Shop Products</h2>
		<!-- Content -->
		<div class="shop-content">
			<!-- Box 1 -->
			<?php
			include("dbconnect.php");
			try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $conn->prepare("SELECT id, name, price, img FROM product");
				$stmt->execute();

				while ($row = $stmt->fetch()) {
					echo '<div class="product-box">';
					echo '<a href="product.php' . '?id=' . $row['id'] . '"><img class="product-img" src="' . $row['img'] . '"></a>';
					echo '<a href="product.php' . '?id=' . $row['id'] . '"><h2 class="product-title">' . $row['name'] . '</h2></a>';
					echo '€' . $row['price'] . "\n";
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
		</div>
	</section>
	<a href="login.php" class='bx bxs-user' id="user-icon"></a>
	<!-- Footer -->
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
	let hamburger = document.querySelector(".hamburger");
	let navMenu = document.querySelector('.nav-menu');

	hamburger.onclick = () => {
		hamburger.classList.toggle('active');
		navMenu.classList.toggle('active');
	}
</script>
</body>
</html>