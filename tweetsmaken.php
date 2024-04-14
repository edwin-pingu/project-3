<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweetsmaken</title>
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
          <a class="nav-link" href="#">Link</a>
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
    try {
        $db = new PDO ("mysql:host=localhost;dbname=tweets", "root", "");
        if (isset($_POST['verzenden'])) {
            $tweets = filter_input(INPUT_POST, "tweets", FILTER_SANITIZE_STRING);


            $query = $db->prepare("INSERT INTO tweetsshow (tweets) VALUES (:tweets)");

            $query->bindParam("tweets", $tweets);

            if($query->execute()) {
                echo "De nieuwe gevens zijn toegevoegd";
            } else {
                echo "Er is een fout opgetreden";
            }
            echo "<br>";
        }
    }
    catch(PDOException $e) {
        die("Error!: " . $e->getMessage());
    }
    ?>
    <div class="kleur"></div>
        <form action="tweets.php" method="post">
        <label for="merk">Maak u tweet</label>
        <input type="text" name="tweets" id="tweets_id">
        <br>
        <input type="submit" name="verzenden" value="Verzenden">

    
</body>
</html>