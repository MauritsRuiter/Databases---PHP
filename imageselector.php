<!-- <?php

  if(isset($_GET['id']))
  $id = $_GET['id'];
  // do some validation here to ensure id is safe

  $link = mysql_connect("localhost", "root", "");

  mysql_select_db("module_8");

  $sql = "SELECT product FROM img WHERE id=$id";

  $result = mysql_query("$sql");

  $row = mysql_fetch_assoc($result);

  mysql_close($link);

  header("Content-type: image/jpeg");
  echo $row['img'];
?> -->