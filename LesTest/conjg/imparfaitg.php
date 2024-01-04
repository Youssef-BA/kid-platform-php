<!DOCTYPE html>
<html>
<head>
  <title>Exercice de conjugaison à l'imparfait</title>
  <link rel="stylesheet" type="text/css" href="stylimpg.css">
</head>
<?php include('verif.php') ?>
<body>
<?php
$questions = array(
  "J' (aller) au parc.",
  "Tu (écouter) de la musique.",
  "Il/Elle (regarder) à la télévision.",
  "Nous (rencontrer) des amis.",
  "Vous (aller) au restaurant.",
  "Ils/Elles (aller) au cinéma.",
  "Le chien courir dans le jardin.",
  "Les oiseaux (voler) dans le ciel.",
  "Le professeur (parler) aux étudiants.",
  "Les enfants (jouer) dans la cour."
);

$answers = array(
  "allais",
  "écoutais",
  "regardait",
  "rencontrions",
  "alliez",
  "allaient",
  "courait",
  "volaient",
  "parlait",
  "jouaient"
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
      $explanation = "Le verbe 'aller' à l'imparfait se conjugue avec la terminaison 'ais' à la première personne du singulier. Donc, la forme correcte est 'j'allais'.";
      break;
    case 1:
      $explanation = "Le verbe 'écouter' à l'imparfait se conjugue avec la terminaison 'ais' à la deuxième personne du singulier. Donc, la forme correcte est 'tu écoutais'.";
      break;
    case 2:
      $explanation = "Le verbe 'regarder' à l'imparfait se conjugue avec la terminaison 'ait' à la troisième personne du singulier. Donc, la forme correcte est 'il/elle regardait'.";
      break;
    case 3:
      $explanation = "Le verbe 'rencontrer' à l'imparfait se conjugue avec la terminaison 'ions' à la première personne du pluriel. Donc, la forme correcte est 'nous rencontrions'.";
      break;
    case 4:
      $explanation = "Le verbe 'aller' à l'imparfait se conjugue avec la terminaison 'iez' à la deuxième personne du pluriel. Donc, la forme correcte est 'vous alliez'.";
      break;
    case 5:
      $explanation = "Le verbe 'aller' à l'imparfait se conjugue avec la terminaison 'aient' à la troisième personne du pluriel. Donc, la forme correcte est 'ils/elles allaient'.";
      break;
    case 6:
      $explanation = "Le verbe 'courir' à l'imparfait se conjugue avec la terminaison 'ait' à la troisième personne du singulier. Donc, la forme correcte est 'le chien courait'.";
      break;
    case 7:
      $explanation = "Le verbe 'voler' à l'imparfait se conjugue avec la terminaison 'aient' à la troisième personne du pluriel. Donc, la forme correcte est 'les oiseaux volaient'.";
      break;
    case 8:
      $explanation = "Le verbe 'parler' à l'imparfait se conjugue avec la terminaison 'ait' à la troisième personne du singulier. Donc, la forme correcte est 'le professeur parlait'.";
      break;
    case 9:
      $explanation = "Le verbe 'jouer' à l'imparfait se conjugue avec la terminaison 'aient' à la troisième personne du pluriel. Donc, la forme correcte est 'les enfants jouaient'.";
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
  <h2>Conjuguez les verbes entre () à l'imparfait:</h2>
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