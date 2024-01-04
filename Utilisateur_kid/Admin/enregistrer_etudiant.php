<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs soumises par le formulaire
    $prenom = $_POST['Prenom'];
    $nom = $_POST['Nom'];
    $sexe = $_POST['Sexe'];
    $email = $_POST['Email'];
    $motDePasse = $_POST['Password'];
    $type = $_POST['Type'];
    $points = $_POST['Points'];

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '', 'kids_sub');

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Préparer la requête SQL pour l'insertion de l'étudiant
    $sql = "INSERT INTO registration (Prenom, Nom, Sexe, Email, Password, Type, Points)
            VALUES ('$prenom', '$nom', '$sexe', '$email', '$motDePasse', '$type', '$points' )";

    // Exécuter la requête SQL
    if ($conn->query($sql) === TRUE) {
        // Rediriger vers la page principale en cas de succès
        header("Location: index.php");
        exit();
    } else {
        // Afficher un message d'erreur en cas d'échec
        echo "Erreur lors de l'enregistrement de l'étudiant : " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
}
?>
