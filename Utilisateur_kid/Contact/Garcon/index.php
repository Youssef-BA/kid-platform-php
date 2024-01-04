<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>
    <title>Contactez nous</title>
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
        <a href="index.php" class="btn2"><p class='prof'>Les cours</p></a>
        <a href="../../Test/Garcon/index.php" class="btn2"><p class='prof'>Les contrôles</p></a>
        <a href="../../Reward/Garcon/index.php" class="btn2"><p class='prof'>récompense</p></a>
        <a href="" class="btn2"><p class='prof'>Contactez nous</p></a>
      <div class='marg'></div>
      <a href="../../../Connexion/index.php" class="btn"><p class='prof'>Se Déconnecter</p></a></center>
  </aside>
    <div class="cadre">
      <div class="position3">
        <h2 class="modification">Contactez Nous</h2>
      </div>
      <div>
        <form action="https://formspree.io/f/xjvdbjng" method="POST">
          <div class="Contact">
            <div>
              <input
                class="control1"
                type="text"
                id="name"
                name="name"
                placeholder="Name"
                required
              />
            </div>
            <div class="marge2"></div>
            <div class="message1">
              <input
                class="control1"
                name="Email"
                type="email"
                placeholder="E-mail"
                required
              />
            </div>
          </div>
          <div class="message2">
            <textarea
              class="ctrl"
              name="Message"
              placeholder="Message"
              required
            ></textarea>
          </div>
          <div classe="message">
            <button class="Button" type="submit">Send</button>
          </div>
        </form>
      </div>
    </div>
    <div class="marge"></div>
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
          <li class="menu__item"><a class="menu__link" href="index.php">Contactez nous</a></li>

        </ul>
        <p>&copy;2023 Projet PHP | Created by ❤️</p>
      </footer>
  </div>
  </body>
</html>
