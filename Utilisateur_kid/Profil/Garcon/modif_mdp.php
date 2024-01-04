<?php
session_start();
include('../../../Connexion/connection.php');

// Vérifier si l'utilisateur est connecté (vérifier si l'ID utilisateur est présent dans la session)
if (!isset($_SESSION['id'])) {
    // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: ../../../Connexion/index.php");
    exit();
}

// Récupérer l'ID de l'utilisateur à partir de la session
$userId = $_SESSION['id'];

// Vérifier si l'ID de l'utilisateur est présent dans la session
if (isset($userId) && !empty($userId)) {
    // Vérification si le formulaire de modification a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Lastmdp = $_POST['Last'];
        $New1 = $_POST['new1'];
        $New2 = $_POST['new2'];

        // Récupérer le mot de passe actuel de l'utilisateur depuis la base de données
        $sql = "SELECT Password FROM registration WHERE id=$userId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userMdp = $row['Password'];

            if ($Lastmdp == $userMdp) {
                if ($New1 == $New2) {
                    $sql = "UPDATE registration SET Password='$New1' WHERE id=$userId";

                    if ($conn->query($sql) === TRUE) {
                        header("Location: index.php"); 
                        exit();
                    } else {
                        echo "Erreur lors de la mise à jour de l'utilisateur : " . $conn->error;
                    }
                } else {
                    echo "<script>alert('Confirmation incorrecte');</script>";
                }
            } else {
                echo "<script>alert('Ancien mot de passe incorrect');</script>";
            }
        } else {
            echo "Utilisateur non trouvé.";
        }
    }
} else {
    echo 'ID de l\'utilisateur non spécifié.';
}

// Fermer la connexion à la base de données
$conn->close();
?>
