<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
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
    <center><img src="../../../images/garcon.png" class="nom_util" alt="Photo de l'utilisateur">
      <h3 class="name"><?php echo $prenom . ' ' . $nom; ?></h3>
      <a href="../../Profil/Garcon/index.php" class="btn"><p class='prof'>Profile</p></a>
      <div class='marg'></div>
      <?php if ($Type === 'Admin'): ?>
          <a href="../../Admin/index.php" class="btn2"><p class='prof'>Admin</p></a>
        <?php endif; ?>
        <a href="../../acceuil/Garcon/index.php" class="btn2"><p class='prof'>Accueil</p></a>
        <a href="../../A propos de nous/Garcon/index.php" class="btn2"><p class='prof'>À propos de nous</p></a>
        <a href="../../Cours/Garcon/index.php" class="btn2"><p class='prof'>Les cours</p></a>
        <a href="index.php" class="btn2"><p class='prof'>Les contrôles</p></a>
        <a href="../../Reward/Garcon/index.php" class="btn2"><p class='prof'>récompense</p></a>
        <a href="../../Contact/Garcon/index.php" class="btn2"><p class='prof'>Contactez nous</p></a>
      <div class='marg'></div>
      <a href="../../../Connexion/index.php" class="btn"><p class='prof'>Se Déconnecter</p></a></center>
  </aside>

<section>
    <h1 class='color'>Les test</h1>
    <div class="text-center">
    <h2 class="section-heading text-uppercase">Vos points actuel</h2>
    <img class="reward" src="../../../images/reward-em.png">
    <h2 class="section-heading text-uppercase"><?php echo $Points; ?></h2>
  </div>
    <h1 class='color'>--------</h1>
    <h4 class='titre'>Math</h4>
    <div class="container1">
        <a href='../../../LesTest/Math/Addition/html.php'><div class="box">
          <img src="../../../images/addition.gif">
        </div></a>
        <a href='../../../LesTest/Math/Soustraction/html.php'><div class="box">
          <img src="../../../images/sous.gif">
        </div></a>
        <a href='../../../LesTest/Math/Multiplication/index.php'><div class="box">
          <img src="../../../images/mult.gif">
        </div></a>
      </div>
      <h1 class='color'>--------</h1>
      <h4 class='titre'>Francais : </h4>
      <h3 class='titre'>Grammaire</h3>
      <div class="container1">
      <a href='../../../LesTest/gramb/test2gramg.php'><div class="box">
          <img src="../../../images/pluriel.gif">
        </div></a>
        <a href='../../../LesTest/gramb/test1gramg.php'><div class="box">
          <img src="../../../images/article.gif">
        </div></a>
        <a href='../../../LesTest/gramb/test3gramg.php'><div class="box">
          <img src="../../../images/Mascfim.gif">
        </div></a>
      </div>
      <h3 class='titre'>Conjugaison</h3>
      <div class="container1">
      <a href='../../../LesTest/conjb/presentg.php'><div class="box">
          <img src="../../../images/conjugaison1.gif">
        </div></a>
        <a href='../../../LesTest/conjb/passecompg.php'><div class="box">
          <img src="../../../images/conjugaison2.gif">
        </div></a>
        <a href='../../../LesTest/conjb/imparfaitg.php'><div class="box">
          <img src="../../../images/conjugaison3.gif">
        </div></a>
      </div>
      <div class="container1">
      <a href='../../../LesTest/conjb/futurg.php'><div class="box">
          <img src="../../../images/conjugaison4.gif">
        </div></a>
        <a href='../../../LesTest/conjb/passesimpleg.php'><div class="box">
          <img src="../../../images/conjugaison5.gif">
        </div></a>
      </div>
      <h1 class='color'>--------</h1>
      <h4 class='titre'>Jeux</h4>
      <div class="container1">
      <a href='../../../LesTest/testb/test1.php'><div class="box">
          <img src="../../../images/aud.gif">
        </div></a>
        <a href='../../../LesTest/testb/test2.php'><div class="box">
          <img src="../../../images/img.gif">
        </div></a>
        <a href='../../../LesTest/testb/test3.php'><div class="box">
          <img src="../../../images/color.gif">
        </div></a>
      </div>
      <div class="container1">
      <a href='../../../LesTest/testb/test4.php'><div class="box">
          <img src="../../../images/temps.gif">
        </div></a>
      </div>
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
          <li class="menu__item"><a class="menu__link" href="../../acceuil/Garcon/index.php">Acceuil</a></li>
          <li class="menu__item"><a class="menu__link" href="../../A propos de nous/Garcon/index.php">À propos de nous</a></li>
        
          <li class="menu__item"><a class="menu__link" href="../../Team/index.html">Notre Team</a></li>
          <li class="menu__item"><a class="menu__link" href="../../Contact/Garcon/index.php">Contactez nous</a></li>

        </ul>
        <p>&copy;2023 Projet PHP | Created by ❤️</p>
      </footer>
  </div>


</body>
</html>

</body>
</html>
