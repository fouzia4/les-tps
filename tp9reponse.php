<?php
$nom = strip_tags($_POST['nom']);
$email = strip_tags($_POST['email']);
$message = strip_tags($_POST['message']);

echo "<h1>Merci $nom pour votre message !</h1>";
echo "<p>Email : $email</p>";
echo "<p>Message : $message</p>";
?>

