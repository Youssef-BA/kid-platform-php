<?php
session_start();

// Vérifier si l'utilisateur est connecté (vérifier si l'ID utilisateur est présent dans la session)
if (!isset($_SESSION['id'])) {
    // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: ../../../Connexion/index.php");
    exit();
}

// Inclure le fichier de connexion à la base de données
include('../../../Connexion/connection.php');

// Tableau des chemins vers les images d'encouragement
$imagesEncouragement = [
    'pictures/bravo.gif',
    'pictures/bravo1.gif',
    'pictures/bravo2.gif',
    'pictures/bravo3.gif',
    'pictures/bravo4.gif',
    'pictures/bravo5.gif',
    'pictures/bravo6.gif',
    'pictures/bravo7.gif',
    // Ajoutez ici d'autres chemins d'images d'encouragement si nécessaire
];
$imagesdessus= ['pictures/faux1.gif',
'pictures/faux2.gif',
'pictures/faux3.gif',
'pictures/faux4.gif',
'pictures/faux5.gif',
'pictures/faux6.gif',
// Ajoutez ici d'autres chemins d'images d'encouragement si nécessaire
];
$message1 = [
    "Bravo, super travail !",
    "Génial, continue comme ça !",
    "Fantastique, tu progresses !",
    "Magnifique, tu assures !",
    "Excellent, c'est parfait !",
    "Félicitations, tu cartonnes !",
    "Impressionnant, continue ainsi !",
    "Formidable, tu es sur la bonne voie !",
    "Exceptionnel, tu te surpasses !",
    "Admirable, tu es brillant(e) !",
    "Tu es incroyable !",
    "Tu es vraiment doué(e) !",
    "Tu es sur la bonne voie !",
    "Tu as fait un travail fantastique !",
    "Tu es un(e) champion(ne) !",
    "Tu es remarquable !",
    "Tu es talentueux(se) !",
    "Tu es un(e) vrai(e) artiste !",
    "Tu es un(e) génie !",
    "Tu es formidable !",
    "Tu es la star du jour !",
    "C'est parfait, continue comme ça !",
    "Continue comme ça, tu es sur la bonne voie !",
    "Tu as tout compris, continue ainsi !",
    "Tu as tous les atouts pour réussir !",
    "Tu es un(e) vrai(e) champion(ne) !",
    "Tu es exceptionnel(le) !",
    "Tu es un modèle pour les autres !",
    "Tu es un(e) battant(e) !",
    "Tu es sur la bonne voie pour atteindre ton objectif !",
    "Tu es un vrai rayon de soleil !",
    "Tu es un(e) véritable leader !",
    "Tu es un(e) aventurier(ère) !",
    "Tu es un(e) héros/héroïne !",
    "Tu es un(e) champion(ne) de la persévérance !"
];

$message2 = [
    "Oh non, essaye encore !",
    "Ne t'inquiète pas, tu vas y arriver !",
    "Tu vas y arriver, continue d'essayer !",
    "C'est pas grave, essaie encore une fois !",
    "N'abandonne pas, tu vas y arriver !",
    "Tu peux le faire, ne lâche pas !",
    "Ne baisse pas les bras, tu es capable de réussir !",
    "Tu es sur la bonne voie, continue comme ça !",
    "Ne t'inquiète pas, chaque erreur est une opportunité d'apprendre !",
    "N'abandonne pas, car chaque échec te rapproche de la réussite !",
    "Ne te décourage pas, tu vas finir par y arriver !",
    "Tu es capable de surmonter tous les obstacles !",
    "Tu peux le faire, crois en toi !",
    "La persévérance est la clé de la réussite, continue d'essayer !",
    "Tu es courageux(se), ne lâche pas !",
    "La réussite vient avec l'effort, continue de travailler dur !",
    "Tuas le potentiel de réussir, ne t'arrête pas maintenant !",
    "Chaque petit pas te rapproche de ton objectif, continue !",
    "Tu es capable de faire mieux, essaie encore !",
    "Tu peux le faire, ne te décourage pas !",
    "Tu es sur la bonne voie, continue comme ça !",
    "Crois en toi, tu es capable de réaliser de grandes choses !",
    "N'oublie pas que chaque échec est une opportunité d'apprendre !",
    "Ne te laisse pas décourager par les obstacles, continue d'avancer !",
    "Tu es un(e) battant(e), ne baisse pas les bras !",
    "Ne te décourage pas, la réussite est à portée de main !",
    "Ne lâche rien, tu es sur la bonne voie !",
    "La persévérance paie toujours, continue d'essayer !",
    "Continue à travailler dur, tu vas y arriver !",
    "Tu es capable de surmonter tous les défis, ne te laisse pas décourager !",
    "Tu as le potentiel de réussir, ne renonce pas maintenant !",
    "Tu es en train de progresser, continue ainsi !",
    "La réussite est au bout de l'effort, continue de travailler dur !"
];

// Générer un index aléatoire pour choisir une image
$randomIndex1 = array_rand($imagesEncouragement);
$encouragementImage = $imagesEncouragement[$randomIndex1];

$randomIndex2= array_rand($imagesdessus);
$encouragementImage2 = $imagesdessus[$randomIndex2];

$randomIndex3= array_rand($message1);
$encouragement3 = $message1[$randomIndex3];

$randomIndex4= array_rand($message2);
$encouragement4 = $message2[$randomIndex4];

$verification=0;


// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Vérifier si la réponse est correcte
    $userAnswer = $_POST['answer'];
    $expectedAnswer = $_SESSION['expectedAnswer'];
    
    if ($userAnswer == $expectedAnswer) {
        $encouragement = '<center><img src="' . $encouragementImage . '" alt="Encouragement" class="encouragement"></center>';
        $verification=1;
        // Mettre à jour les points de l'utilisateur dans la base de données
        if (isset($_SESSION['id'])) {
            $userId = $_SESSION['id'];
            $updatePointsQuery = "UPDATE registration SET Points = Points + 10 WHERE id = $userId";
            mysqli_query($conn, $updatePointsQuery);
        }
    } else {
        $encouragement = '<center><img src="' . $encouragementImage2 . '" alt="Encouragement" class="encouragement"></center>';
        $verification=2;
        // Mettre à jour les points de l'utilisateur dans la base de données
        if (isset($_SESSION['id'])) {
            $userId = $_SESSION['id'];
            $updatePointsQuery = "UPDATE registration SET Points = Points - 2 WHERE id = $userId";
            mysqli_query($conn, $updatePointsQuery);
        }
    }
}

// Générer deux nombres aléatoires entre -10000 et 10000
$number1 = rand(1, 10);
$number2 = rand(1, 10);

// Calculer la multiplication des deux nombres
$expectedAnswer = $number1 * $number2;

// Stocker la réponse attendue dans la session
$_SESSION['expectedAnswer'] = $expectedAnswer;
?>