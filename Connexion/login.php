<?php
session_start();
include('connection.php');

if (isset($_POST['submit'])) {
    $Email = $_POST['Email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM registration WHERE Email = '$Email' AND password = '$password'";  
    $result = mysqli_query($conn, $sql);  
    $count = mysqli_num_rows($result);  
    
    if ($count == 1) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $Sexe = $row['Sexe'];
        
        // Stocker l'ID utilisateur dans la session
        $_SESSION['id'] = $row['id'];
        if ($_SESSION['id'] == 1) {
            $userId = $_SESSION['id'];
            $updatePointsQuery = "UPDATE registration SET Type = 'Admin' WHERE id = $userId";
            mysqli_query($conn, $updatePointsQuery);
        }
        if ($Sexe == 'Garçon') {
            header("Location: ../Utilisateur_kid/acceuil/Garcon/index.php");
        } elseif ($Sexe == 'Fille') {
            header("Location: ../Utilisateur_kid/acceuil/Fille/index.php");
        } else {  
            echo '<script>
                window.location.href = "index.php";
                alert("Email ou mot de passe incorrect")
            </script>';
        }
    } else {
        echo '<script>
            window.location.href = "index.php";
            alert("Email ou mot de passe incorrect")
        </script>';
    }
}
?>
