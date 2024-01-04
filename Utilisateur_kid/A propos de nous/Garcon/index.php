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
        <a href="index.php" class="btn2"><p class='prof'>À propos de nous</p></a>
        <a href="../../Cours/Garcon/index.php" class="btn2"><p class='prof'>Les cours</p></a>
        <a href="../../Test/Garcon/index.php" class="btn2"><p class='prof'>Les contrôles</p></a>
        <a href="../../Reward/Garcon/index.php" class="btn2"><p class='prof'>récompense</p></a>
        <a href="../../Contact/Garcon/index.php" class="btn2"><p class='prof'>Contactez nous</p></a>
      <div class='marg'></div>
      <a href="../../../Connexion/index.php" class="btn"><p class='prof'>Se Déconnecter</p></a></center>
  </aside>

  <div class='border'>
  <div class="row">
    <div class="image">
      <img src="../../images/about-img.svg" alt="">
    </div>
    <div class="content">
      <div class="title">
        <h3>Pourquoi nous ?</h3>
      </div>
      <p>nous sommes passionnés par l'apprentissage des enfants et nous croyons fermement que l'éducation peut être à la fois amusante et gratifiante. Notre plateforme en ligne a été spécialement conçue pour aider les enfants à passer des cours et des tests tout en s'amusant.</p>
      <p>Nous comprenons que chaque enfant est unique et que chaque enfant a une façon d'apprendre qui lui est propre. C'est pourquoi nous avons créé un environnement interactif et ludique, où les enfants peuvent explorer différents sujets, relever des défis et gagner des points afin de débloquer des récompenses.</p>
      <a href="../../Cours/Garcon/index.php" class="btn">Nos cours</a>
    </div>
  </div>
</div>

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
          <li class="menu__item"><a class="menu__link" href="index.php">À propos de nous</a></li>
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
