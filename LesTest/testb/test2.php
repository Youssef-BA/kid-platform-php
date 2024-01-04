<!DOCTYPE html>
<html>
<head>
    <title>Test de reconnaissance d'images</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<?php include('verif.php') ?>
<body>
    <div class="test-container">
        <h1>Test de reconnaissance d'images</h1>

        <?php
        // Liste des images à afficher de manière aléatoire
        $images = array(
            array("image1.png", "la pomme"), // Remplacez par le nom de l'image et le mot attendu correspondant
            array("image2.jpg", "le chien"),
            array("image3.jpg", "le chat")
        );

        // Score initial
        $score = 0;

        // Vérification si le formulaire a été soumis
        if (isset($_POST['submit'])) {
            // Récupération de la saisie de l'utilisateur
            $saisie = $_POST['saisie'];

            // Conversion de l'entrée de l'utilisateur en minuscules pour faciliter la comparaison
            $saisie = strtolower($saisie);

            // Récupération de l'image actuelle
            $imageIndex = $_POST['imageIndex'];
            $image = $images[$imageIndex];
            $imageFile = $image[0];
            $motAttendu = $image[1];

            // Comparaison avec le mot attendu
            if ($saisie === $motAttendu) {
                $userId = $_SESSION['id'];
                $updatePointsQuery = "UPDATE registration SET Points = Points + 10 WHERE id = $userId";
                mysqli_query($conn, $updatePointsQuery);
                echo "<p>Bravo ! Vous avez bien identifié l'image.</p>";
                $score++;
            } else {
                $userId = $_SESSION['id'];
                $updatePointsQuery = "UPDATE registration SET Points = Points - 10 WHERE id = $userId";
                mysqli_query($conn, $updatePointsQuery);
                echo "<p>Dommage, vous n'avez pas identifié correctement l'image.</p>";
            }

            // Afficher le bouton "Suivant" ou le score final
            if ($imageIndex < count($images) - 1) {
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='imageIndex' value='".($imageIndex + 1)."'>";
                echo "<input type='submit' name='next' value='Suivant'>";
                echo "</form>";
            } else {
                echo "<p>Votre score final est de $score / ".count($images)."</p>";
            }
        } else {
            // Détermine l'index de l'image actuelle
            $imageIndex = isset($_POST['imageIndex']) ? $_POST['imageIndex'] : 0;

            // Vérifie si toutes les images ont été affichées
            if ($imageIndex >= count($images)) {
                echo "<p>Test terminé !</p>";
                echo "<p>Votre score final est de $score / ".count($images)."</p>";
            } else {
                // Récupération de l'image actuelle
                $image = $images[$imageIndex];
                $imageFile = $image[0];
                $motAttendu = $image[1];

                // Formulaire pour afficher l'image et saisir la réponse
                ?>
                <center><img class='ppp' src="pictures/5987898.png" width="30" alt="Image"></br>
    <b><?php echo $Points; ?></b></center>
                <form method="post" action="">
                    <label for="saisie">Écrivez ce que vous voyez :</label><br>
                    <input type="text" id="saisie" name="saisie" required><br><br>

<img src="<?php echo $imageFile; ?>" alt="Image"><br><br>

<input type="hidden" name="imageIndex" value="<?php echo $imageIndex; ?>">
<input type="submit" name="submit" value="Valider">
</form>
<?php
}
}
?>
</div>
</body>
</html>

