
<?php $conn->close(); ?>
<?php
$conn = new mysqli('localhost', 'username', 'password', 'TP10');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nom'])) {
    $nom = $_POST['nom'];
    
  
    $check = $conn->prepare("SELECT id FROM guerrier WHERE nom=?");
    $check->bind_param("s", $nom);
    $check->execute();
    $check->store_result();
    
    if ($check->num_rows > 0) {
        $message = "Ce nom est déjà pris";
    } else {
        $stmt = $conn->prepare("INSERT INTO guerrier (nom) VALUES (?)");
        $stmt->bind_param("s", $nom);
        
        if ($stmt->execute()) {
            $message = "Guerrier créé avec succès";
        } else {
            $message = "Erreur lors de la création";
        }
        $stmt->close();
    }
    $check->close();
}

if (isset($_GET['frapper'])) {
    $id_victime = $_GET['frapper'];
    $id_attaquant = $_GET['attaquant'];
    
  
    $conn->query("UPDATE guerrier SET degats = degats + 5 WHERE id=$id_victime");
    
   
    $result = $conn->query("SELECT degats FROM guerrier WHERE id=$id_victime");
    $row = $result->fetch_assoc();
    
    if ($row['degats'] >= 100) {
        $conn->query("DELETE FROM guerrier WHERE id=$id_victime");
        $message = "Le guerrier a été éliminé!";
    } else {
        $message = "Le guerrier a été frappé!";
    }
}


$guerriers = $conn->query("SELECT * FROM guerrier");
?>