<?php 
include 'dbconnect.php';

if(isset($_POST['delete'])) {
    $product_id = $_POST['id'];
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("DELETE FROM product WHERE id=:product_id");
    $stmt->bindParam(':product_id', $product_id);
    
    if ($stmt->execute()) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>