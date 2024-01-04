<?php
session_start();
include('../../../Connexion/connection.php');

// Vérifier si l'utilisateur est connecté (vérifier si l'ID utilisateur est présent dans la session)
if (!isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: ../../../Connexion/index.php");
    exit();
}

// Inclure le fichier de connexion à la base de données


else {
    $userId = $_SESSION['id'];
    
    if (isset($userId) && !empty($userId)) {
        // Vérification si le formulaire de modification a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Prenom = $_POST['Prenom'];
            $Nom = $_POST['Nom'];
            $Email = $_POST['Email'];
    
            // Mise à jour de l'utilisateur dans la base de données
            $sql = "UPDATE registration SET Prenom='$Prenom', Nom='$Nom', Email='$Email' WHERE id=$userId";
    
            if ($conn->query($sql) === TRUE) {
                header("Location: index.php"); // Redirection vers index.php après enregistrement
                exit();
            } else {
                echo "Erreur lors de la mise à jour de l'utilisateur : " . $conn->error;
            }
        }
    } else {
        echo 'ID de l\'utilisateur non spécifié.';
    }}
    // Fermer la connexion à la base de données
$conn->close();
?>

