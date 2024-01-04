<!DOCTYPE html>
<html>
<head>
    <title>Coloriage</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['reset'])) {
        // Réinitialiser la session et recommencer le test
        session_unset();
    } else {
        // Récupérer les cercles coloriés par l'utilisateur
        $choixUtilisateur = $_POST['choix'];

        // Récupérer le nombre aléatoire généré précédemment
        $nombreAleatoire = $_SESSION['nombreAleatoire'];

        // Vérifier si le choix est correct
        $estCorrect = count($choixUtilisateur) == $nombreAleatoire;

        echo "Votre choix : " . implode(", ", $choixUtilisateur) . "<br>";
        echo "Le nombre aléatoire : " . $nombreAleatoire . "<br>";
        echo "Votre réponse est " . ($estCorrect ? "correcte" : "incorrecte") . "<br>";
        echo "<form method='post'><input type='submit' name='reset' value='Refaire'></form>";
        exit(); // Terminer le script après avoir affiché le résultat
    }
}

// Vérifier si le nombre aléatoire est déjà généré
if (!isset($_SESSION['nombreAleatoire'])) {
    // Générer un nombre aléatoire entre 1 et 30
    $_SESSION['nombreAleatoire'] = mt_rand(1, 30);
}
$nombreAleatoire = $_SESSION['nombreAleatoire'];

// Afficher les cercles à colorier
echo "Coloriez {$nombreAleatoire} cercle(s) :<br>";
echo "<form method='post'>";
for ($i = 1; $i <= 30; $i++) {
    echo "<div class='circle' onclick='toggleColor(this)' data-value='$i'></div>";
}
echo "<br><input type='hidden' name='nombreAleatoire' value='$nombreAleatoire'>";
echo "<input type='submit' value='Vérifier'></form>";
?>

<script>
    function toggleColor(element) {
        element.classList.toggle('colored');
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'choix[]';
        input.value = element.getAttribute('data-value');
        if (element.classList.contains('colored')) {
            document.querySelector('form').appendChild(input);
        } else {
            var inputs = document.querySelectorAll('input[name="choix[]"]');
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].value === input.value) {
                    inputs[i].parentNode.removeChild(inputs[i]);
                    break;
                }
            }
        }
    }
</script>
</body>
</html>

