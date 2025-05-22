<?php
session_start();

$valid_username = "admin";
$valid_password = "1234";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION["username"] = $username;
        header("Location: welcome.php");
        exit();
    } else {
        $error = "Identifiants incorrects.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <?php if ($error): ?>
        <p style="color:red"><?= $error ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label>Nom d'utilisateur :</label>
        <input type="text" name="username" required><br><br>
        <label>Mot de passe :</label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
