<?php
session_start();


if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bienvenue</title>
</head>
<body>
    <h2>Bienvenue, <?= htmlspecialchars($_SESSION["username"]) ?> !</h2>
    <p><a href="logout.php">Se déconnecter</a></p>
</body>
</html>
