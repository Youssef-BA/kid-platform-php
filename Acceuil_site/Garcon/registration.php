<?php 
$Prenom = $_POST['Prenom'];
$Nom = $_POST['Nom'];
$Sexe = 'Garçon';
$Type = 'Utilisateur';
$Email = $_POST['Email'];
$Password = $_POST['password'];

// Connect to the database to store user information
$connexion = new mysqli('localhost','root','','kids_sub');
if ($connexion->connect_error){
    die('Connection Failed : '.$connexion->connect_error);
}
else{
    // Vérifier si l'utilisateur est déjà inscrit
    $check_query = "SELECT * FROM registration WHERE Email='$Email'";
    $check_result = mysqli_query($connexion, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        echo "L'utilisateur est déjà inscrit.";
        header("Location: index.php?error=already_registered");
        exit();
    }

    // Vérifier si tous les champs sont remplis
    if (empty($Prenom) || empty($Nom) || empty($Email) || empty($Password)) {
        echo "Veuillez remplir tous les champs.";
        header("Location: index.php?error=empty_fields");
        exit();
    }

    // Insérer les données de l'utilisateur dans la base de données
    $stmt = $connexion->prepare('INSERT INTO registration (Prenom, Nom, Sexe, Email, password, Type) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->bind_param("ssssss",$Prenom,$Nom,$Sexe,$Email,$Password,$Type);
    $stmt->execute();
    $stmt->close();
    $connexion->close();
    
    // Afficher une alerte de succès après l'inscription réussie
    echo "<script>alert('Inscription réussie');</script>";
    
    header("Location: ../../Connexion/index.php");
    exit();
}
?>
