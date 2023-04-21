<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/database.css">
</head>

<body>
    <?php
    include 'dbconnect.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {

      
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        //     // set the resulting array to associative
        //     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //     foreach ($stmt->fetchAll() as $k => $v) {
        //         echo $v;
        //     }
        //     } catch (PDOException $e) {
        //     echo "Error: " . $e->getMessage();
        //     }

            $name = $_POST['name'];
            $price = $_POST['price'];
            $img = $_POST['img'];

            $stmt = $conn->prepare("INSERT INTO product (name, price, img) VALUES (:name, :price, :img)");

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':img', $img);

        if ($stmt->execute()) {
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }

    ?>
    <div class="main-wrapper">
        <h1>Database</h1>
        <div class="crud-wrapper">

            <form action="" method="POST">
                <div class="database-inssert ">
                    <label>Name</label>
                    <input type="text" name="name" value="" placeholder="product name">
                </div><br>
                <div class="database-inssert">
                    <label>Price</label>
                    <input type="text" name="price" value="" placeholder="price">
                </div><br>
                <div class="database-inssert">
                    <label>Img</label>
                    <input type="text" name="img" value="" placeholder="image link">
                </div><br>
                <div class="database-inssert"><br>
                    <button class="btn" type="submit" name="save">Insert</button>
                </div>
            </form>
        </div>

        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include the database connection
                    require_once "dbconnect.php";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $conn->prepare("SELECT id, name, price FROM product");
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo '€' . $row['price']; ?></td>
                                <td>
                                    <div class="actions-wrapper">
                                        <form action="edit.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button class="btn" type="submit" name="edit">Edit</button>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="actions-wrapper">
                                        <form action="delete.php" method="post" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button class="btn" type="submit" name="delete">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>