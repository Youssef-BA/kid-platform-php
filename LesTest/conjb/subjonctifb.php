<!DOCTYPE html>
<html>
<head>
  <title>Exercice de conjugaison</title>
  <link rel="stylesheet" type="text/css" href="stylsubjb.css">
</head>
<?php include('verif.php') ?>
<body>
<?php
$questions = array(
  "Il faut que je (faire) mes devoirs.",
  "Nous voulons que vous (venir) avec nous.",
  "Je cherche quelqu'un qui (parler) espagnol.",
  "Il est important que vous (finir) ce projet à temps.",
  "Elle souhaite que nous (réussir) dans nos projets.",
  "Je doute qu'il (comprendre) la situation.",
  "Il est temps que tu (changer) tes habitudes.",
  "Nous préférons que vous (attendre) un peu plus longtemps.",
  "Je veux que vous (venir) me voir demain.",
  "Il est nécessaire que nous (agir) rapidement."
);

$answers = array(
  "fasse",
  "veniez",
  "parle",
  "finissiez",
  "réussissions",
  "comprenne",
  "changes",
  "attendiez",
  "veniez",
  "agissions"
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
      $explanation = "Après 'Il faut que', le verbe 'faire' se conjugue au subjonctif présent. Donc, la forme correcte est 'fasse'.";
      break;
    case 1:
      $explanation = "Après 'Nous voulons que', le verbe 'venir' se conjugue au subjonctif présent. Donc, la forme correcte est 'veniez'.";
      break;
    case 2:
      $explanation = "Après 'Je cherche quelqu'un qui', le verbe 'parler' se conjugue au subjonctif présent. Donc, la forme correcte est 'parle'.";
      break;
    case 3:
      $explanation = "Après 'Il est important que', le verbe 'finir' se conjugue au subjonctif présent. Donc, la forme correcte est 'finissiez'.";
      break;
    case 4:
      $explanation = "Après 'Elle souhaite que', le verbe 'réussir' se conjugue au subjonctif présent. Donc, la forme correcte est 'réussissions'.";
      break;
    case 5:
      $explanation = "Après 'Je doute que', le verbe 'comprendre' se conjugue au subjonctif présent. Donc, la forme correcte est 'comprenne'.";
      break;
    case 6:
      $explanation = "Après 'Il est temps que', le verbe 'changer' se conjugue au subjonctif présent. Donc, la forme correcte est 'changes'.";
      break;
    case 7:
      $explanation = "Après 'Nous préférons que', le verbe 'attendre' se conjugue au subjonctif présent. Donc, la forme correcte est 'attendiez'.";
      break;
    case 8:
      $explanation = "Après 'Je veux que', le verbe 'venir' se conjugue au subjonctif présent. Donc, la forme correcte est 'veniez'.";
      break;
    case 9:
      $explanation = "Après 'Il est nécessaire que', le verbe 'agir' se conjugue au subjonctif présent. Donc, la forme correcte est 'agissions'.";
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
  <h2>Conjuguez les verbes entre () au subjonctif présent :</h2>
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