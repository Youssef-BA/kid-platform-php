<?php
session_start();
include('../../Connexion/connection.php');

// Vérifier si l'utilisateur est connecté (vérifier si l'ID utilisateur est présent dans la session)
if (!isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: ../../Connexion/index.php");
    exit();
}

// Inclure le fichier de connexion à la base de données


else {
    $userId = $_SESSION['id'];
    
    // Requête pour récupérer le nom et le prénom de l'utilisateur
    $getUserQuery = "SELECT nom, prenom, Type, Points FROM registration WHERE id = $userId";
    $userResult = mysqli_query($conn, $getUserQuery);
    
    // Vérifier si la requête a renvoyé un résultat
    if ($userResult && mysqli_num_rows($userResult) > 0) {
        $userData = mysqli_fetch_assoc($userResult);
        $nom = $userData['nom'];
        $Type = $userData['Type'];
        $prenom = $userData['prenom'];
        $Points = $userData['Points'];
    }}
?>
