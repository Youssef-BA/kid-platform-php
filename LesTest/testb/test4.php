<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style4.css">
    <script>
        function playAudio(audioId) {
            var audio = document.getElementById(audioId);
            audio.play();
        }
    </script>
</head>
<?php include('verif.php') ?>
<body>
<?php
$saisons = array('printemps', 'été', 'automne', 'hiver');
$images = array(
    'printemps' => 'image_printemps_1.jpg',
    'été' => 'image_ete_1.jpg',
    'automne' => 'image_automne_1.jpg',
    'hiver' => 'image_hiver_1.jpg'
);

if (!isset($_SESSION['current_saison_index'])) {
    $_SESSION['current_saison_index'] = 0;
}

$current_saison_index = $_SESSION['current_saison_index'];
$saison_aleatoire = $saisons[$current_saison_index];
$url_image = $images[$saison_aleatoire];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saison'])) {
    $reponse_utilisateur = strtolower($_POST['saison']);

    if ($reponse_utilisateur == $saison_aleatoire) {
        $userId = $_SESSION['id'];
        $updatePointsQuery = "UPDATE registration SET Points = Points + 10 WHERE id = $userId";
        mysqli_query($conn, $updatePointsQuery);
        $message = "Félicitations ! Vous avez deviné correctement.";
        $gif_image = "bravo-amazed.gif";
        $sound = "applause.mp3";
    } else {
        $userId = $_SESSION['id'];
        $updatePointsQuery = "UPDATE registration SET Points = Points - 10 WHERE id = $userId";
        mysqli_query($conn, $updatePointsQuery);
        $message = "Désolé, vous vous êtes trompé. La saison représentée était $saison_aleatoire.";
        $gif_image = "wrong.gif";
        $sound = "despair.m4a";
    }

    $_SESSION['current_saison_index']++;
    if ($_SESSION['current_saison_index'] >= count($saisons)) {
        unset($_SESSION['current_saison_index']);
    }
}
?>
<div class="container">
<center><img style="width: 10%;" src="pictures/5987898.png" width="30" alt="Image"></br>
    <b><?php echo $Points; ?></b></center>
    <?php if(isset($message)): ?>
        <div class="message" style="<?php echo isset($style) ? $style : ''; ?>">
            <center><?php echo $message; ?></center>
        </div>
        <?php if(isset($gif_image)): ?>
            <center><img src="<?php echo $gif_image; ?>" alt="Applaudissements"></center>
        <?php endif; ?>
        <audio id="audio" autoplay>
            <source src="<?php echo $sound; ?>" type="audio/mpeg">
        </audio>
        <script>
            playAudio('audio');
        </script>
        <form method="POST" action="">
            <button type="submit">Suivant</button>
        </form>
    <?php else: ?>
        <p>Devinez la saison représentée dans l'image.</p>
        <center><img src="<?php echo $url_image; ?>" alt="Saison"></center>

        <form method="POST" action="">
            <label for="saison">Quelle est la saison représentée dans l'image ?</label>
            <input type="text" name="saison" id="saison">
            <button type="submit">Soumettre</button>
        </form>
    <?php endif; ?>
</div>

</body>
</html>
