<?php
$servername = "localhost";
$tweets = "root";


try {
  $conn = new PDO("mysql:host=$servername;dbname=tweets", $tweets);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
</body>
</html>