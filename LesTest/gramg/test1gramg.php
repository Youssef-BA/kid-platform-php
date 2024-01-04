<!DOCTYPE html>
<html>
<head>
  <title>Test de grammaire</title>
  <link rel="stylesheet" type="text/css" href="stile1gramg.css">
</head>
<?php include("verif.php") ?>
<body>
  <h1>Test de grammaire</h1>
  <center><img class='ppp' src="pictures/5987898.png" width="30" alt="Image"></br>
    <b><?php echo $Points; ?></b></center>
  <?php
  // Définition des mots à tester et de leurs articles correspondants
  $mots = array(
    "voiture" => "une",
    "chien" => "un",
    "maison" => "une",
    "chat" => "un",
    "table" => "une"
  );

  // Vérification de la réponse de l'élève
  if (isset($_POST['mot']) && isset($_POST['article'])) {
    $mot = $_POST['mot'];
    $article = $_POST['article'];

    if (isset($mots[$mot])) {
      $articleCorrect = $mots[$mot];
      if ($article == $articleCorrect) {
        $userId = $_SESSION['id'];
        $updatePointsQuery = "UPDATE registration SET Points = Points + 10 WHERE id = $userId";
        mysqli_query($conn, $updatePointsQuery);
        echo "<p>Bonne réponse !</p>";
      } else {
        $userId = $_SESSION['id'];
        $updatePointsQuery = "UPDATE registration SET Points = Points - 2 WHERE id = $userId";
        mysqli_query($conn, $updatePointsQuery);
        echo "<p>Mauvaise réponse. L'article correct pour \"$mot\" est \"$articleCorrect\".</p>";
      }
    } else {
      echo "<p>Mot inconnu.</p>";
    }

    // Passer au mot suivant
    next($mots);
  }

  // Affichage du prochain mot
  $motCourant = key($mots);
  $articleCourant = current($mots);
  if ($motCourant !== false && $articleCourant !== false) {
    echo "<p>Mot suivant : $motCourant</p>";
    echo "<form method='POST' action=''>";
    echo "<input type='hidden' name='mot' value='$motCourant'>";
    echo "<label for='article'>Article :</label>";
    echo "<input type='text' name='article' id='article'>";
    echo "<input type='submit' value='Vérifier'>";
    echo "</form>";
  } else {
    echo "<p>Test terminé.</p>";
  }
  ?>

</body>
</html>
