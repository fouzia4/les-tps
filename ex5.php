<?php
$filename = "messages.txt";
$date = date("d/m/Y H:i");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    if (!empty($name) && !empty($message)) {
        $entry = "$date | $name : $message" . PHP_EOL;
        file_put_contents($filename, $entry, FILE_APPEND);
    }
}


$messages = [];
if (file_exists($filename)) {
    $messages = file($filename, FILE_IGNORE_NEW_LINES);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Livre d’or</title>
</head>
<body>
    <h2>Laissez un message</h2>
    <form method="post" action="">
        <label>Nom :</label><br>
        <input type="text" name="name" required><br><br>
        
        <label>Message :</label><br>
        <textarea name="message" rows="4" cols="40" required></textarea><br><br>
        
        <button type="submit">Envoyer</button>
    </form>

    <h2>Messages précédents</h2>
    <?php if (!empty($messages)): ?>
        <?php foreach ($messages as $msg): ?>
            <p><?= nl2br(htmlspecialchars($msg)) ?></p>
            <hr>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun message pour le moment.</p>
    <?php endif; ?>
</body>
</html>
