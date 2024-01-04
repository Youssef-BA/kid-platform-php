<!DOCTYPE html>
<html>
<head>
  <title>Exercice de conjugaison au futur simple</title>
  <link rel="stylesheet" type="text/css" href="stylfuturb.css">
</head>
<?php include('verif.php') ?>
<body>
<?php
$questions = array(
  "Je (manger) une glace demain.",
  "Tu (voyager) autour du monde.",
  "Il/Elle (apprendre) à jouer de la guitare.",
  "Nous (acheter) une nouvelle voiture.",
  "Vous (parler) couramment une nouvelle langue.",
  "Ils/Elles (lire) ce livre très prochainement.",
  "Le chat (dormir) toute la journée demain.",
  "Les oiseaux (chanter) joyeusement au printemps.",
  "Le professeur (enseigner) une nouvelle matière.",
  "Les enfants (grandir) rapidement."
);

$answers = array(
  "mangerai",
  "voyageras",
  "apprendra",
  "achèterons",
  "parlerez",
  "liront",
  "dormira",
  "chanteront",
  "enseignera",
  "grandiront"
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
function getExplanation($questionIndex) {
  switch ($questionIndex) {
    case 0:
      $explanation = "Le verbe 'manger' au futur simple se conjugue avec la terminaison 'ai' à la première personne du singulier. Donc, la forme correcte est 'Je mangerai une glace demain'.";
      break;
    case 1:
      $explanation = "Le verbe 'voyager' au futur simple se conjugue avec la terminaison 'as' à la deuxième personne du singulier. Donc, la forme correcte est 'Tu voyageras autour du monde'.";
      break;
    case 2:
      $explanation = "Le verbe 'apprendre' au futur simple se conjugue avec la terminaison 'a' à la troisième personne du singulier. Donc, la forme correcte est 'Il/Elle apprendra à jouer de la guitare'.";
      break;
    case 3:
      $explanation = "Le verbe 'acheter' au futur simple se conjugue avec la terminaison 'ons' à la première personne du pluriel. Donc, la forme correcte est 'Nous achèterons une nouvelle voiture'.";
      break;
    case 4:
      $explanation = "Le verbe 'parler' au futur simple se conjugue avec la terminaison 'ez' à la deuxième personne du pluriel. Donc, la forme correcte est 'Vous parlerez couramment une nouvelle langue'.";
      break;
    case 5:
      $explanation = "Le verbe 'lire' au futur simple se conjugue avec la terminaison 'ont' à la troisième personne du pluriel. Donc, la forme correcte est 'Ils/Elles liront ce livre très prochainement'.";
      break;
    case 6:
      $explanation = "Le verbe 'dormir' au futur simple se conjugue avec la terminaison 'a' à la troisième personne du singulier. Donc, la forme correcte est 'Le chat dormira toute la journée demain'.";
      break;
    case 7:
      $explanation = "Le verbe 'chanter' au futur simple se conjugue avec la terminaison 'ont' à la troisième personne du pluriel. Donc, la forme correcte est 'Les oiseaux chanteront joyeusement au printemps'.";
      break;
    case 8:
      $explanation = "Le verbe 'enseigner' au futur simple se conjugue avec la terminaison 'a' à la troisième personne du singulier. Donc, la forme correcte est 'Le professeur enseignera une nouvelle matière'.";
      break;
    case 9:
      $explanation = "Le verbe 'grandir' au futur simple se conjugue avec la terminaison 'ont' à la troisième personne du pluriel. Donc, la forme correcte est 'Les enfants grandiront rapidement'.";
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
<h2>Conjuguez les verbes entre () au futur simple:</h2>
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
