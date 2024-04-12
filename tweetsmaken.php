<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweets</title>
</head>
<body>
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

        <form action="tweetsmaken.php" method="post">
        <label for="merk">Maak u tweet</label>
        <input type="text" name="tweets" id="tweets_id">
        <br>
        <input type="submit" name="verzenden" value="Verzenden">
</body>
</html>