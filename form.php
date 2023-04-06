<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/formstyle.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- Header -->
	<header>
		<!-- Nav -->
		<div class="nav container">
			<a href="#" class="logo">Dripstore</a>
			<!-- Back Icon  -->
            <a href="index.php" class='bx bx-arrow-back' id="back-icon"></a>
        </div>
	</header>
    <section id="contact">
        <h1>Login</h1>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <label for="name">Username:</label>
            <input class="name" type="text" id="name" name="name">
            <span style="color: #F00">*</span>
            <br><br>
            <label for="password">Password:</label>
            <input class="password" type="password" id="password" name="password">
            <span style="color: #F00">*</span>
            <br><br>
            <input class="submit" type="submit" value="Login">
        </form>
    </section>
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
<?php

?>