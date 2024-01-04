<?php 
$NomComp = $_POST['nom_complet'];
$Email = $_POST['email'];
$Adresse = $_POST['adresse'];
$Postal = $_POST['code_postal'];
$Phone = $_POST['telephone'];
$Cadeau = 'Monopoly Classique';

// Connect to the database to store user information
$connexion = new mysqli('localhost','root','','kids_sub');
if ($connexion->connect_error){
    die('Connection Failed : '.$connexion->connect_error);
}
else{
    // Vérifier si l'utilisateur est déjà inscrit
    $check_query = "SELECT * FROM demande_cadeaux WHERE Email='$Email'";
    $check_result = mysqli_query($connexion, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        echo "L'utilisateur est déjà inscrit.";
        header("Location: index.php?error=already_registered");
        exit();
    }

    // Vérifier si tous les champs sont remplis
    if (empty($NomComp) || empty($Email) || empty($Adresse) || empty($Postal) || empty($Phone)) {
        echo "Veuillez remplir tous les champs.";
        header("Location: index.php?error=empty_fields");
        exit();
    }

    // Insérer les données de l'utilisateur dans la base de données
    $stmt = $connexion->prepare('INSERT INTO demande_cadeaux (Nom complet, email, adresse, code postal, Numero, Cadeau) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->bind_param("ssssis", $NomComp, $Email, $Adresse, $Postal, $Phone, $Cadeau);
    $stmt->execute();
    $stmt->close();

    
    $connexion->close();
    
    // Afficher une alerte de succès après l'inscription réussie
    echo "<script>alert('Inscription réussie');</script>";
    
    header("Location: ../../Connexion/index.php");
    exit();
}
?>
