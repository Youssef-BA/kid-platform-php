<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style11.css">
  <link rel="stylesheet" href="../Acceuil_site/z_backend/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <script src="script.js"></script>
</head>
<body>
<?php include('verif.php')?>

  <header>
    <button id="menu-button" onclick="toggleMenu()">&#9776;</button>
  </header>
  
  <aside id="sidebar">
    <center><img src="../../../images/fille.png" class="nom_util" alt="Photo de l'utilisateur">
      <h3 class="name"><?php echo $prenom . ' ' . $nom; ?></h3>
      <a href="../../Profil/Fille/index.php" class="btn"><p class='prof'>Profile</p></a>
      <div class='marg'></div>
        <?php if ($Type === 'Admin'): ?>
          <a href="../../Admin/index.php" class="btn2"><p class='prof'>Admin</p></a>
        <?php endif; ?>
        <a href="index.php" class="btn2"><p class='prof'>Accueil</p></a>
        <a href="../../A propos de nous/Fille/index.php" class="btn2"><p class='prof'>À propos de nous</p></a>
        <a href="../../Cours/Fille/index.php" class="btn2"><p class='prof'>Les cours</p></a>
        <a href="../../Test/Fille/index.php" class="btn2"><p class='prof'>Les contrôles</p></a>
        <a href="../../Reward/Fille/index.php" class="btn2"><p class='prof'>récompense</p></a>
        <a href="../../Contact/Fille/index.php" class="btn2"><p class='prof'>Contactez nous</p></a>
      <div class='marg'></div>
      <a href="../../../Connexion/index.php" class="btn"><p class='prof'>Se Déconnecter</p></a></center>
  </aside>


<div class="content">
<header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Bienvenue <?php echo $prenom . ' ' . $nom; ?></div>
                <div class="masthead-heading">C'est un plaisir de vous revoir.</div>
                <a class="button" href="../../A propos de nous/Fille/index.php"><i class="vid">À propos de nous</i></a>
            </div>
</header>
<section>
  <div class="text-center">
    <h2 class="section-heading text-uppercase">Vos points actuel</h2>
    <img class="reward" src="../../../images/reward-em.png">
    <h2 class="section-heading text-uppercase"><?php echo $Points; ?></h2>
  </div>
  <h1 class='color'>Nos cours</h1>
    <center><img class ='head-icon' src="../../../images/cours-icon.png"></center>
    <div class="container1">
        <a href="../../../video cours/Fille/maths.html"><div class="box">
          <img src="../../../images/Math.gif">
        </div></a>
        <a href="../../../video cours/Fille/grammaire.html"><div class="box">
        <img src="../../../images/gramm.gif">
        </div></a>
        <a href="../../../video cours/Fille/culture.html"><div class="box">
        <img src="../../../images/Addition (9).gif">
      </div></a>
      <a class="button5" href="../../Cours/Fille/index.php"><i class="vid">Voir plus..</i></a>
      <h1 class='color'>--------</h1>
    <h1 class='color'>Les test</h1>
    <center><img class ='head-icon' src="../../../images/test.png"></center>
    <div class="container1">
    <a href='../../../LesTest/Math/Addition/html.php'><div class="box">
          <img src="../../../images/addition.gif">
        </div></a>
        <a href='../../../LesTest/conjg/presentb.php'><div class="box">
          <img src="../../../images/conjugaison1.gif">
        </div></a>
        <a href='../../../LesTest/gramg/test2gramb.php'><div class="box">
          <img src="../../../images/pluriel.gif">
        </div></a>
      </div>
      <a class="button11" href="../../Test/Fille/index.php"><i class="vid">Voir plus..</i></a>
  </section>
  <div class="footer">
    <footer class="footer">
        <div class="waves">
          <div class="wave" id="wave1"></div>
          <div class="wave" id="wave2"></div>
          <div class="wave" id="wave3"></div>
          <div class="wave" id="wave4"></div>
        </div>
        <ul class="menu">
          <li class="menu__item"><a class="menu__link" href="index.php">Acceuil</a></li>
          <li class="menu__item"><a class="menu__link" href="../../A propos de nous/Fille/index.php">À propos de nous</a></li>
          <li class="menu__item"><a class="menu__link" href="../../Team/index.html">Notre Team</a></li>
          <li class="menu__item"><a class="menu__link" href="../../Contact/Fille/index.php">Contactez nous</a></li>

        </ul>
        <p>&copy;2023 Projet PHP | Created by ❤️</p>
      </footer>
  </div>


</body>
</html>

</body>
</html>
