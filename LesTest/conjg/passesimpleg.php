<!DOCTYPE html>
<html>
<head>
  <title>Exercice de conjugaison</title>
  <link rel="stylesheet" type="text/css" href="stylpassmplg.css">
</head>
<?php include('verif.php') ?>
<body>
<?php
$questions = array(
  "Le chat (manger) une souris.",
  "Nous (jouer) au football.",
  "Tu (prendre) une décision importante.",
  "Les oiseaux (chanter) dans le jardin.",
  "J'(aller) à la plage.",
  "Vous (finir) vos devoirs.",
  "Elle (dormir) toute la nuit.",
  "Les enfants (regarder) un film.",
  "Il (venir) me voir.",
  "Nous (partir) en vacances."
);

$answers = array(
  "mangea",
  "jouâmes",
  "pris",
  "chantèrent",
  "allai",
  "finîtes",
  "dormit",
  "regardèrent",
  "vint",
  "partîmes"
);

$score = 0;
$errors = array();
$corrections = array();
$explanations = array();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  for ($i = 0; $i < count($questions); $i++) {
    $userAnswer = isset($_POST["answer{$i}"]) ? strtolower(trim($_POST["answer{$i}"])) : "";
    $correctAnswer = $answers[$i];

    if ($userAnswer == $correctAnswer) {
      $score++;
    } else {
      $errors[] = $i + 1;
      $corrections[] = $correctAnswer;
      $explanations[] = getExplanation($i);
    }
  }
}
if ($score >5){
  $userId = $_SESSION['id'];
      $updatePointsQuery = "UPDATE registration SET Points = Points + 10 WHERE id = $userId";
      mysqli_query($conn, $updatePointsQuery);
}
else{
  $userId = $_SESSION['id'];
      $updatePointsQuery = "UPDATE registration SET Points = Points - 10 WHERE id = $userId";
      mysqli_query($conn, $updatePointsQuery);
}
function getExplanation($index) {
  $explanation = "";
  switch ($index) {
    case 0:
      $explanation = "Dans la troisième personne du singulier, le verbe 'manger' se conjugue au passé simple avec la terminaison 'a'. Donc, la forme correcte est 'mangea'.";
      break;
    case 1:
      $explanation = "Dans la première personne du pluriel, le verbe 'jouer' se conjugue au passé simple avec la terminaison 'âmes'. Donc, la forme correcte est 'jouâmes'.";
      break;
    case 2:
      $explanation = "Dans la deuxième personne du singulier, le verbe 'prendre' se conjugue au passé simple avec la terminaison 'is'. Donc, la forme correcte est 'pris'.";
      break;
    case 3:
      $explanation = "Dans la troisième personne du pluriel, le verbe 'chanter' se conjugue au passé simple avec la terminaison 'èrent'. Donc, la forme correcte est 'chantèrent'.";
      break;
    case 4:
      $explanation = "Dans la première personne du singulier, le verbe 'aller' se conjugue au passé simple avec la terminaison 'ai'. Donc, la forme correcte est 'allai'.";
      break;
    case 5:
      $explanation = "Dans la deuxième personne du pluriel, le verbe 'finir' se conjugue au passé simple avec la terminaison 'îtes'. Donc, la forme correcte est 'finîtes'.";
      break;
    case 6:
      $explanation = "Dans la troisième personne du singulier, le verbe 'dormir' se conjugue au passé simple avec la terminaison 'it'. Donc, la forme correcte est 'dormit'.";
      break;
    case 7:
      $explanation = "Dans la troisième personne du pluriel, le verbe 'regarder' se conjugue au passé simple avec la terminaison 'èrent'. Donc, la forme correcte est 'regardèrent'.";
      break;
    case 8:
      $explanation = "Dans la troisième personne du singulier, le verbe 'venir' se conjugue au passé simple avec la terminaison 't'. Donc, la forme correcte est 'vint'.";
      break;
    case 9:
      $explanation = "Dans la première personne du pluriel, le verbe 'partir' se conjugue au passé simple avec la terminaison 'îmes'. Donc, la forme correcte est 'partîmes'.";
      break;
    default:
      $explanation = "";
  }

  return $explanation;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  echo "<h2>Résultats de l'exercice</h2>";
  echo "<div id='result'>";

  if ($score === 10) {
    echo "Félicitations ! Vous avez obtenu un score parfait !";
  } else {
    echo "Votre score est de {$score}/10. Vous avez fait des erreurs dans les questions suivantes :";
    echo "<ul>";

    foreach ($errors as $error) {
      echo "<li>";
      echo "Question {$error} : {$questions[$error - 1]}";
      echo "<br>";
      echo "<span class='error'>Erreur : La réponse correcte est \"{$corrections[array_search($error, $errors)]}\".</span>";
      echo "<br>";
      echo $explanations[array_search($error, $errors)];
      echo "</li>";
    }

    echo "</ul>";
  }

  echo "</div>";
}
?>

<div class="exercise">
  <h2>Exercice de conjugaison<br></h2>
  <center><img class='ppp' src="pictures/5987898.png" width="30" alt="Image"></br>
    <b><?php echo $Points; ?></b></center>
  <h2> Conjuguez les verbes entre () au passé simple :</h2>
  <?php if ($score < 10) : ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <?php for ($i = 0; $i < count($questions); $i++) : ?>
        <p>
          <strong>Question <?php echo $i + 1; ?>:</strong>
          <?php echo $questions[$i]; ?><br>
          <input type="text" name="answer<?php echo $i; ?>" required>
        </p>
      <?php endfor; ?>
      <input type="submit" value="Vérifier">
    </form>
  <?php endif; ?>
</div>
</body>
</html>
