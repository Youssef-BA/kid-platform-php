<!DOCTYPE html>
<html>
<head>
    <title>Test de pluriels</title>
    <link rel="stylesheet" type="text/css" href="stile2gramb.css">
</head>
<?php include('verif.php')?>
<body>
    <?php
    // Array de mots avec leurs pluriels
    $mots = array(
        "chien" => "chiens",
        "chat" => "chats",
        "voiture" => "voitures",
        "maison" => "maisons",
        "arbre" => "arbres",
        "pomme" => "pommes",
        "fleur" => "fleurs",
        "joueur" => "joueurs",
        "ordinateur" => "ordinateurs",
        "livre" => "livres",
        "stylo" => "stylos",
        "table" => "tables",
        "chaise" => "chaises",
        "porte" => "portes",
        "fenêtre" => "fenêtres",
        "télévision" => "télévisions",
        "lit" => "lits",
        "bouteille" => "bouteilles",
        "couteau" => "couteaux",
        "fourchette" => "fourchettes",
        "cuillère" => "cuillères",
        "verre" => "verres",
        "assiette" => "assiettes",
        "crayon" => "crayons",
        "journal" => "journaux",
        "magazine" => "magazines",
        "ordinateur portable" => "ordinateurs portables",
        "montre" => "montres",
        "bracelet" => "bracelets",
        "collier" => "colliers",
        "bague" => "bagues",
        "sac" => "sacs",
        "chaussure" => "chaussures",
        "chemise" => "chemises",
        "pantalon" => "pantalons",
        "jupe" => "jupes",
        "veste" => "vestes",
        "manteau" => "manteaux",
        "écharpe" => "écharpes",
        "chapeau" => "chapeaux",
        "gants" => "gants",
        "parapluie" => "parapluies",
        "carte" => "cartes",
        "argent" => "argents",
        "porte-monnaie" => "porte-monnaies",
        "clé" => "clés",
        "téléphone" => "téléphones",
        "appareil photo" => "appareils photo",
        "tapis" => "tapis",
        "horloge" => "horloges",
    );


    // Vérifie si une réponse est correcte
    function verifierReponse($mot, $reponse, $mots)
    {
        if (isset($mots[$mot]) && $mots[$mot] === $reponse) {
            return true;
        } else {
            return false;
        }
    }

    // Traitement du formulaire
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $reponseUtilisateur = $_POST["reponse"];

        // Vérifie la réponse de l'utilisateur
        if (verifierReponse($_POST["motCourant"], $reponseUtilisateur, $mots)) {
            $userId = $_SESSION['id'];
            $updatePointsQuery = "UPDATE registration SET Points = Points + 10 WHERE id = $userId";
            mysqli_query($conn, $updatePointsQuery);
            echo "<p>La réponse est correcte !</p>";
        } else {
            $userId = $_SESSION['id'];
            $updatePointsQuery = "UPDATE registration SET Points = Points - 2 WHERE id = $userId";
            mysqli_query($conn, $updatePointsQuery);
            echo "<p>La réponse est fausse.</p>";
        }

        // Passe au mot suivant
        $motsRestants = array_diff(array_keys($mots), [$_POST["motCourant"]]);
        if (!empty($motsRestants)) {
            $motSuivant = array_rand($motsRestants);
            $motCourant = $motsRestants[$motSuivant];
        } else {
            echo "<p>Test terminé.</p>";
            // Vous pouvez ajouter ici d'autres actions à effectuer lorsque le test est terminé
        }
    } else {
        // Définit le premier mot à afficher
        $motCourant = array_rand($mots);
    }
    ?>

    <h1>Test de pluriels</h1>
    <center><img class='ppp' src="pictures/5987898.png" width="30" alt="Image"></br>
    <b><?php echo $Points; ?></b></center>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="reponse">Pluriel de <?php echo $motCourant; ?>:</label>
        <input type="text" name="reponse" id="reponse" required>
        <input type="hidden" name="motCourant" value="<?php echo $motCourant; ?>">
        <button type="submit">Vérifier</button>
    </form>
</body>
</html>
