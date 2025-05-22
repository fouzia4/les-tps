<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  
    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    $erreurs = [];
    

    if (empty($nom)) {
        $erreurs[] = "Le nom est obligatoire.";
    }
    
    if (empty($email)) {
        $erreurs[] = "L'email est obligatoire.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = "L'email n'est pas valide.";
    }
    
    if (empty($message)) {
        $erreurs[] = "Le message est obligatoire.";
    } elseif (strlen($message) < 10) {
        $erreurs[] = "Le message doit contenir au moins 10 caractères.";
    }
    
  
    if (empty($erreurs)) {
      
        $nom_affichage = htmlspecialchars($nom);
        $email_affichage = htmlspecialchars($email);
        $message_affichage = nl2br(htmlspecialchars($message));
        

        echo "<h2>Merci pour votre message, $nom_affichage !</h2>";
        echo "<p><strong>Email :</strong> $email_affichage</p>";
        echo "<p><strong>Message :</strong></p>";
        echo "<div style='border:1px solid #eee; padding:10px;'>$message_affichage</div>";
        echo "<p><a href='contact.html'>Envoyer un autre message</a></p>";
    } else {

        echo "<h2>Erreurs dans le formulaire :</h2>";
        echo "<ul style='color:red;'>";
        foreach ($erreurs as $erreur) {
            echo "<li>$erreur</li>";
        }
        echo "</ul>";
        echo "<p><a href='contact.html'>Retour au formulaire</a></p>";
    }
} else {
    
    header("Location: contact.html");
    exit;
}
?>