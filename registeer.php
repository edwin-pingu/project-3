<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        $db = new PDO ("mysql:host=localhost;dbname=inloggen testje", "root", "");
        $password = password_hash("password", PASSWORD_DEFAULT);
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

        <form action="login.php" method="post">
        <label for="merk">username</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="type">password</label>
        <input type="text" name="password" id="password">
        <br>
        <input type="submit" name="verzenden" value="Verzenden">

</body>
</html>