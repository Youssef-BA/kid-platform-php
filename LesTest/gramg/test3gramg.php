<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exercice de grammaire</title>
    <link rel="stylesheet" type="text/css" href="stile3gramg.css">
</head>
<?php include('verif.php')?>
<?php
// Définition du tableau de questions et réponses
$questions = array(
    array(
        "Donnez le féminin de 'acteur'.",
        "acteur",
        "actrice"
    ),
    array(
        "Quel est le masculin de 'actrice' ?",
        "actrice",
        "acteur"
    ),
    array(
        "Donnez le féminin de 'étudiant'.",
        "étudiant",
        "étudiante"
    ),
    array(
        "Quel est le masculin de 'enseignante' ?",
        "enseignante",
        "enseignant"
    ),
    array(
        "Donnez le féminin de 'chat'.",
        "chat",
        "chatte"
    ),
    array(
        "Quel est le masculin de 'chienne' ?",
        "chienne",
        "chien"
    ),
    array(
        "Donnez le féminin de 'acteur'.",
        "acteur",
        "actrice"
    ),
    array(
        "Quel est le masculin de 'autrice' ?",
        "autrice",
        "auteur"
    ),
    array(
        "Donnez le féminin de 'chef'.",
        "chef",
        "cheffe"
    ),
    array(
        "Quel est le masculin de 'princesse' ?",
        "princesse",
        "prince"
    )
);

// Vérification des réponses
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = 0;
    $totalQuestions = count($questions);

    for ($i = 0; $i < $totalQuestions; $i++) {
        $reponseUtilisateur = $_POST["reponse" . $i];

        if ($reponseUtilisateur == $questions[$i][2]) {
            $score++;
            $userId = $_SESSION['id'];
            $updatePointsQuery = "UPDATE registration SET Points = Points + 10 WHERE id = $userId";
            mysqli_query($conn, $updatePointsQuery);
        }
    }

    // Affichage du résultat
    echo "Vous avez obtenu un score de " . $score . "/" . $totalQuestions . ".";
}
?>

<body>
    <h1>Exercice de grammaire</h1>
    <center><img class='ppp' src="pictures/5987898.png" width="30" alt="Image"></br>
    <b><?php echo $Points; ?></b></center>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <?php
        // Affichage des questions
        for ($i = 0; $i < count($questions); $i++) {
            echo "<p>" . $questions[$i][0] . "</p>";
            echo "<input type='text' name='reponse" . $i . "'><br><br>";
        }
        ?>
        <input type="submit" value="Soumettre">
    </form>
</body>
</html>
