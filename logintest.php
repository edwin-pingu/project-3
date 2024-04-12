<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
    try {
        $db = new PDO ("mysql:host=localhost;dbname=inloggen testje", "root", "");
        if (isset($_POST['inloggen'])) {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $password = $_POST['password'];

        $query = $db->prepare("SELECT * FROM loginpagetest WHERE username = :username");

        $query->bindParam("username", $username);
        $query->execute();
        if($query->RowCount() == 1) {
            $result = $query->fetch(PDO::FETCH_ASSOC)
            if (password_verify($password, $result ["password"])) {
            echo "Juist gegevenens!";
        } else {
            echo "Onjuiste gegevens!";
        } 
    }   else {
            echo "Onjuiste gegevens!";
        }
        echo "<br>";
    }

    
    } catch (PDOException $e) {
        die ("Error!: " . $e->getMessage());
    }

    ?>

    <form method="post" action="">
        <label>Username</label>
        <input type="text" name="username"><br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Wachtwoord"><br>
        
        <input type="submit" name="inloggen" value="Inloggen">
    </form>
</body>
</html>