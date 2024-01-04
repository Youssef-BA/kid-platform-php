<!DOCTYPE html>
<html>
<head>
    <title>Demande d'envoie</title>
    <link
      rel="stylesheet"
      href="stylee.css"/>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des données du formulaire
        $email = $_POST["email"];
        $adresse = $_POST["adresse"];
        $codePostal = $_POST["code_postal"];
        $telephone = $_POST["telephone"];
        $nomComplet = $_POST["nom_complet"];
        $cadeau = 'Baby My Little Love';

        
        // Connexion à la base de données et enregistrement des données
        // Remplacez les détails de la connexion avec vos propres informations
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "kids_sub";

        // Établissement de la connexion
        $conn = new mysqli($host, $username, $password, $database);

        // Vérification de la connexion
        if ($conn->connect_error) {
            die("Échec de la connexion à la base de données: " . $conn->connect_error);
        }

        // Préparation de la requête SQL
        $sql = "INSERT INTO demande_cadeaux (`Nom complet`, email, adresse, `code postal`, Numero, Cadeau) VALUES ('$nomComplet', '$email', '$adresse', '$codePostal', '$telephone', '$cadeau')";

        // Exécution de la requête SQL
        if ($conn->query($sql) === TRUE) {
            header('Location: merci.html');
        } else {
            echo "Erreur lors de l'enregistrement des données dans la base de données: " . $conn->error;
        }

        // Fermeture de la connexion à la base de données
        $conn->close();
    }
    ?>

    <div class="form-container">
        <h1>Formulaire</h1>

        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="form-row">
                <label for="nom_complet">Nom complet:</label>
                <input type="text" name="nom_complet" id="nom_complet" required>
            </div>
            <div class="form-row">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="form-row">
                <label for="adresse">Adresse:</label>
                <input type="text" name="adresse" id="adresse" required>
            </div>

            <div class="form-row">
                <label for="code_postal">Code postal:</label>
                <input type="text" name="code_postal" id="code_postal" required>
            </div>

            <div class="form-row">
                <label for="telephone">Numéro de téléphone:</label>
                <input type="tel" name="telephone" id="telephone" required>
            </div>

            <div class="form-row">
                <label for="cadeau">Cadeau : Baby My Little Love</label>
            </div>

            <div class="form-row">
                <input type="submit" class='marg' value="Soumettre">
            </div>
        </form>
    </div>
</body>
</html>
