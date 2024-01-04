<!DOCTYPE html>
<html>
<head>
  <title>Exercice de conjugaison</title>
  <link rel="stylesheet" type="text/css" href="stylpresb.css">
</head>
<?php include('verif.php') ?>
<body>
<?php
$questions = array(
  "Julie (aimer) les frites.",
  "Nous (regarder) un film.",
  "Tu (écouter) de la musique.",
  "Le chat (dormir) sur le canapé.",
  "Les oiseaux (chanter) dans les arbres.",
  "Je (lire) un livre intéressant.",
  "Vous (parler) français.",
  "Elle (danser) avec grâce.",
  "Le chien (aboyer) fort.",
  "Les enfants (jouer) dans le parc."
);

$answers = array(
  "aime",
  "regardons",
  "écoutes",
  "dort",
  "chantent",
  "lis",
  "parlez",
  "danse",
  "aboie",
  "jouent"
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
      $explanation = "Dans la troisième personne du singulier, le verbe 'aimer' se conjugue avec le 's' à la fin. Donc, la forme correcte est 'aime'.";
      break;
    case 1:
      $explanation = "Dans la première personne du pluriel, le verbe 'regarder' se conjugue avec le 'ons' à la fin. Donc, la forme correcte est 'regardons'.";
      break;
    case 2:
      $explanation = "Dans la deuxième personne du singulier, le verbe 'écouter' se conjugue avec le 's' à la fin. Donc, la forme correcte est 'écoutes'.";
      break;
    case 3:
      $explanation = "Dans la troisième personne du singulier, le verbe 'dormir' se conjugue sans changement. Donc, la forme correcte est 'dort'.";
      break;
    case 4:
      $explanation = "Dans la troisième personne du pluriel, le verbe 'chanter' se conjugue avec le 'ent' à la fin. Donc, la forme correcte est 'chantent'.";
      break;
        case 5:
      $explanation = "Dans la première personne du singulier, le verbe 'lire' se conjugue sans changement. Donc, la forme correcte est 'lis'.";
      break;
    case 6:
      $explanation = "Dans la deuxième personne du pluriel, le verbe 'parler' se conjugue avec le 'ez' à la fin. Donc, la forme correcte est 'parlez'.";
      break;
    case 7:
      $explanation = "Dans la troisième personne du singulier, le verbe 'danser' se conjugue sans changement. Donc, la forme correcte est 'danse'.";
      break;
    case 8:
      $explanation = "Dans la troisième personne du singulier, le verbe 'aboyer' se conjugue sans changement. Donc, la forme correcte est 'aboie'.";
      break;
    case 9:
      $explanation = "Dans la troisième personne du pluriel, le verbe 'jouer' se conjugue avec le 'ent' à la fin. Donc, la forme correcte est 'jouent'.";
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
  <h2>Exercice de conjugaison</h2>
  <center><img class='ppp' src="pictures/5987898.png" width="30" alt="Image"></br>
    <b><?php echo $Points; ?></b></center>
  <h2>Conjuguez les verbes entre () au présent de l'indicatif:</h2>
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