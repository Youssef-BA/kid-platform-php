<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kids_sub";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Vérification si l'ID de l'utilisateur est présent dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Suppression de l'utilisateur de la base de données
    $sql = "DELETE FROM registration WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        echo "<script>alert('Utilisateur supprimé avec succès.');</script>";
    } else {
        echo "<script>alert('Erreur lors de la suppression de l'utilisateur : ');</script>" . $conn->error;
    }
} else {
    echo "<script>alert('ID de l\'utilisateur non spécifié.');</script>";
}

// Fermer la connexion à la base de données
$conn->close();
?>
