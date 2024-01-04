<!DOCTYPE html>
<html>
<head>
  <title>Exercice de conjugaison au passé composé</title>
  <link rel="stylesheet" type="text/css" href="stylpascompg.css">
</head>
<body>
<?php
$questions = array(
  "Je (aller) au parc.",
  "Tu (écouter) de la musique.",
  "Il/Elle (regarder) la télévision.",
  "Nous (rencontrer) des amis.",
  "Vous (manger) au restaurant.",
  "Ils/Elles (partager) le gâteau.",
  "Le chien (courir) dans le jardin.",
  "Les oiseaux (voler) dans le ciel.",
  "Le professeur (parler) aux étudiants.",
  "Les enfants (jouer) dans la cour."
);

$answers = array(
  "suis allé",
  "as écouté",
  "a regardé",
  "avons rencontré",
  "avez mangé",
  "ont partagé",
  "a couru",
  "ont volé",
  "a parlé",
  "ont joué"
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

function getExplanation($questionIndex) {
  switch ($questionIndex) {
    case 0:
      $explanation = "Le verbe 'aller' au passé composé se conjugue avec l'auxiliaire 'être' et le participe passé 'allé' au masculin ou 'allée' au féminin. Donc, la forme correcte est 'je suis allé(e)'.";
      break;
    case 1:
      $explanation = "Le verbe 'écouter' au passé composé se conjugue avec l'auxiliaire 'avoir' et le participe passé 'écouté'. Donc, la forme correcte est 'tu as écouté'.";
      break;
    case 2:
      $explanation = "Le verbe 'regarder' au passé composé se conjugue avec l'auxiliaire 'avoir' et le participe passé 'regardé'. Donc, la forme correcte est 'il/elle a regardé'.";
      break;
    case 3:
      $explanation = "Le verbe 'rencontrer' au passé composé se conjugue avec l'auxiliaire 'avoir' et le participe passé 'rencontré'. Donc, la forme correcte est 'nous avons rencontré'.";
      break;
    case 4:
      $explanation = "Le verbe 'manger' au passé composé se conjugue avec l'auxiliaire 'avoir' et le participe passé 'mangé'. Donc, la forme correcte est 'vous avez mangé'.";
      break;
    case 5:
      $explanation = "Le verbe 'partager' au passé composé se conjugue avec l'auxiliaire 'avoir' et le participe passé 'partagé'. Donc, la forme correcte est 'ils/elles ont partagé'.";
      break;
    case 6:
      $explanation = "Le verbe 'courir' au passé composé se conjugue avec l'auxiliaire 'avoir' et le participe passé 'couru'. Donc, la forme correcte est 'le chien a couru'.";
      break;
    case 7:
      $explanation = "Le verbe 'voler' au passé composé se conjugue avec l'auxiliaire 'avoir' et le participe passé 'volé'. Donc, la forme correcte est 'les oiseaux ont volé'.";
      break;
    case 8:
      $explanation = "Le verbe 'parler' au passé composé se conjugue avec l'auxiliaire 'avoir' et le participe passé 'parlé'. Donc, la forme correcte est 'le professeur a parlé'.";
      break;
    case 9:
      $explanation = "Le verbe 'jouer' au passé composé se conjugue avec l'auxiliaire 'avoir' et le participe passé 'joué'. Donc, la forme correcte est 'les enfants ont joué'.";
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
  <h2>Exercice de conjugaison<br> Conjuguez les verbes entre () au passé composé :</h2>
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
