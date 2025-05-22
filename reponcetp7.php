<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réponse du formulaire</title>
</head>
<body>
<?php
if($_POST){
    $titre = strip_tags($_POST['titre']);
    $nom=strip_tags($_POST['nom']);
    $prenom=strip_tags($_POST['prenom']);
    $annee=strip_tags($_POST['annee']);
    $motpasse=strip_tags($_POST['motpasse']);
    $sexe=strip_tags($_POST['sexe']);
    echo "<h1>Bonjour $nom $prenom </h1>";
    echo"<p> votre email est:$email</p>";
    if($sexe=='F')
    echo" Vous êtes une femme</p>";
    else
    echo "<p>Vous êtes un homme</p>";


}
    ?>
    
</body>
</html>