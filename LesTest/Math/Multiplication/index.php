<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Test-de-multiplication.css">
    <title>Test de multiplication</title>
</head>
<?php include('Test-de-multiplication.php'); ?>
<?php

// Vérifier si l'utilisateur est connecté (vérifier si l'ID utilisateur est présent dans la session)
if (!isset($_SESSION['id'])) {
    // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: ../../../Connexion/index.php");
    exit();
}

// Inclure le fichier de connexion à la base de données
include('../../../Connexion/connection.php');

// Récupérer le nombre de points de l'utilisateur à partir de la base de données
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $getPointsQuery = "SELECT Points FROM registration WHERE id = $userId";
    $result = mysqli_query($conn, $getPointsQuery);
    $row = mysqli_fetch_assoc($result);
    $points = $row['Points'];
}
?>

<body>
<div>
    <h1><i>Test de multiplication</i></h1>
    <img class='ppp' src="pictures/5987898.png" width="30" alt="Image">
    <center><b><?php echo $points; ?></b></center> <!-- Afficher le nombre de points de l'utilisateur -->
    <form method="POST" action="">
        <label for="answer">Combien font <?php echo $number1; ?> x <?php echo $number2; ?> ?</label><br><br>
        <input type="number" id="answer" name="answer" required><br>
        <button type="submit" name="submit">Vérifier</button>
    </form>
    <center><?php if ($verification == 1){
        echo $encouragement3;
        echo $encouragement;
    }
    elseif ($verification == 2){
        echo $encouragement4;
        echo $encouragement;
    }

    ?></center>
</div>

</body>
</html>
