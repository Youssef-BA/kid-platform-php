<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<?php include('verif.php') ?>
<body>
    <?php
    // Liste des fichiers audio à jouer de manière aléatoire
    $audios = array(
        array("pronunciation_fr_la_pomme.mp3", "la pomme"), // Remplacez par le nom du fichier audio et le mot attendu correspondant
        array("pronunciation_fr_un_homme.mp3", "un homme"),
        array("pronunciation_fr_une_banane.mp3", "une banane")
    );
    
    // Vérification si le formulaire a été soumis
    if (isset($_POST['submit'])) {
        // Récupération de la saisie de l'utilisateur
        $saisie = $_POST['saisie'];
    
        // Conversion de l'entrée de l'utilisateur en minuscules pour faciliter la comparaison
        $saisie = strtolower($saisie);
    
        // Récupération de l'audio actuel
        $audioIndex = $_POST['audioIndex'];
        $audio = $audios[$audioIndex];
        $audioFile = $audio[0];
        $motAttendu = $audio[1];
    
        // Comparaison avec le mot attendu
        if ($saisie === $motAttendu) {
            $userId = $_SESSION['id'];
            $updatePointsQuery = "UPDATE registration SET Points = Points + 10 WHERE id = $userId";
            mysqli_query($conn, $updatePointsQuery);
            echo "<p>Bravo ! Vous avez bien identifié le son.</p>";
            echo "<audio src='applause.mp3' autoplay></audio>";
        } else {
            $userId = $_SESSION['id'];
            $updatePointsQuery = "UPDATE registration SET Points = Points - 10 WHERE id = $userId";
            mysqli_query($conn, $updatePointsQuery);
            echo "<p>Dommage, vous n'avez pas identifié correctement le son.</p>";
            echo "<audio src='despair.mp3' autoplay></audio>";
        }
    
        // Afficher le bouton "Suivant"
        echo "<form method='post' action=''>";
        echo "<input type='hidden' name='audioIndex' value='".($audioIndex + 1)."'>";
        echo "<input type='submit' name='next' value='Suivant'>";
        echo "</form>";
    } else {
        // Détermine l'index de l'audio actuel
        $audioIndex = isset($_POST['audioIndex']) ? $_POST['audioIndex'] : 0;
    
        // Vérifie si tous les audios ont été joués
        if ($audioIndex >= count($audios)) {
            echo "<p>Test terminé !</p>";
        } else {
            // Récupération de l'audio actuel
            $audio = $audios[$audioIndex];
            $audioFile = $audio[0];
            $motAttendu = $audio[1];
    
            // Formulaire pour écouter le son
            ?>
            <form method="post" action="">
            <center><img class='ppp' src="pictures/5987898.png" width="30" alt="Image"></br>
    <b><?php echo $Points; ?></b></center>
                <label for="saisie">Écrivez ce que vous entendez :</label><br>
                <input type="text" id="saisie" name="saisie" required><br><br>
    
                <audio controls>
                    <source src="<?php echo $audioFile; ?>" type="audio/mpeg">
                    Votre navigateur ne prend pas en charge l'élément audio.
                </audio><br><br>
    
                <input type="hidden" name="audioIndex" value="<?php echo $audioIndex; ?>">
                <input type="submit" name="submit" value="Valider">
            </form>
            <?php
        }
    }
    ?>
</body>
</html>



