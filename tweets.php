<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweets</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link" href="registeer.php">Aanmelden</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="tweets.php">Tweets</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logintest.php">Sign In</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php
$servername = "localhost";
$tweets = "root";
$sql = "SELECT * FROM tweetsshow";
$conn = new PDO("mysql:host=$servername;dbname=tweets", $tweets);
$result = $conn->query($sql);

if ($result->servername > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Tweets: " . $row["tweets"]. "<br>";
  }
} else {
  echo "0 results";
}
?>

<div class="kleur">

</div>

</body>
</html>