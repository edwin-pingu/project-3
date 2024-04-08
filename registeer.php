<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    try {
        $db = new PDO ("mysql:host=localhost;dbname=inloggen testje", "root", "");
        if (isset($_POST['verzenden'])) {
            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

            $query = $db->prepare("INSERT INTO loginpagetest (username, password) VALUES (:username, :password)");

            $query->bindParam("username", $username);
            $query->bindParam("password", $password);

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

        <form action="registeer.php" method="post">
        <label for="merk">username</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="type">password</label>
        <input type="text" name="password" id="password">
        <br>
        <input type="submit" name="verzenden" value="Verzenden">

</body>
</html>