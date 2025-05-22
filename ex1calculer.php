<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculer</title>
    <meta charset="utf-8">
</head>
<body>
    <h1> les resulats </h1>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre1 = filter_input(INPUT_POST, 'nbr1', FILTER_VALIDATE_FLOAT);
            $nombre2 = filter_input(INPUT_POST, 'nbr2', FILTER_VALIDATE_FLOAT);}
            $operation = $_POST['operation'];
            if($_nbr1===false || $_nbr2===false)
                echo"<div> entrer des nombres valides</div>';
            else{
            switch($operation){
            case 'addition':
                $resultat=$nbr1 + $nbr2;
                $symbole = '+';
                break;
            case 'soustraction':
                $resultat=$nbr1 -$nbr2;
                $symbole='-';
                break;
            case 'multiplication':
                $resultat = $nbr1 * $nbr2;
                $symbole = '*';
                break;
            case 'division':
                if(nbr2 ==0){
                echo ' Division par zéro impossible' ;
                exit;}
                }
                $resultat = $nbr1 / $nbr2;
                    $symbole = '÷';
                    break;
            default:
                    echo 'Opération non reconnue';
                    exit;
            }
            echo "<h3>$nbr1$symbole$nbr2 = $resultat</h3>"; 
            
</body>
</html>