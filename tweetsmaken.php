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
            $tweet = filter_input(INPUT_POST, "tweet", FILTER_SANITIZE_STRING);


            $query = $db->prepare("INSERT INTO tweetsshow (tweets) VALUES (:tweets)");

            $query->bindParam("tweet", $tweet);

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

        <form action="tweetmaken.php" method="post">
        <label for="merk">Maak u tweet</label>
        <input type="text" name="tweet" id="tweet">
        <br>
        <input type="submit" name="verzenden" value="Verzenden">
</body>
</html>