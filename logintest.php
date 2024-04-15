<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link rel="stylesheet" href="main.css">
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
        <a class="nav-link" href="registeer.php">Aanmelden</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tweets.php">Tweets</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

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
            $result = $query->fetch(PDO::FETCH_ASSOC);
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
    <div class="kleur">
        <div class="doosje">
          <p>Nu dat u account hebt gemaakt, moet u nog even inloggen.</p>
            <form method="post" action="index.php">
                <label>Username</label>
                <input type="text" name="username" placeholder="Username">
                <br>
                <label>Password</label>
                <input type="password" name="password" placeholder="Password">
                <br>
                <input type="submit" name="inloggen" value="Inloggen">
            </form>
        </div>
    </div>
</body>
</html>