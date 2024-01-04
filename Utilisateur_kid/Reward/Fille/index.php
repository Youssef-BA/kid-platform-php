<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Liste de récompenses</title>
    <link
      rel="stylesheet"
      href="stylee.css"/>
    <link
      rel="stylesheet"
      href="assets/css/product-lists/product-list.css"
    />
    <link
      rel="stylesheet"
      href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"
    />
    <script src="script.js"></script>
  </head>
  <body>
  <?php include('verif.php') ?>
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

  <ul class="product-list-basic">
    <li>
      <a <?php if ($Points >= 3000) echo "href='../../formulaire/Monopoly Classique/Fille/index.php'"; ?> class="product-photo">
        <img src="assets/images/products/monopoly.jpg" height="130" alt="monopoly" />
      </a>

      <h2><a <?php if ($Points >= 3000) echo "href='../../formulaire/Monopoly Classique/Fille/index.php'"; ?>>Monopoly Classique</a></h2>

      <p class="product-description"></p>

      <a <?php if ($Points >= 3000) echo "href='../../formulaire/Monopoly Classique/Fille/index.php'"; ?>><button>Réclamer</button></a>
      <p class="product-price">3000 pts</p>
    </li>

    <li>
      <a <?php if ($Points >= 2500) echo "href='../../formulaire/Voiture Télécommandé - Mercedes/Fille/index.php'"; ?> class="product-photo">
        <img src="assets/images/products/voiture-télécommandé-mercedes.jpg" height="130" alt="mercedes" />
      </a>

      <h2><a <?php if ($Points >= 2500) echo "../../formulaire/Voiture Télécommandé - Mercedes/Fille/index.php'"; ?>>Voiture Télécommandé - Mercedes</a></h2>
      <p class="product-description"></p>

      <a <?php if ($Points >= 2500) echo "href='../../formulaire/Voiture Télécommandé - Mercedes/Fille/index.php'"; ?>><button>Réclamer</button></a>
      <p class="product-price">2500 pts</p>
    </li>

    <li>
      <a <?php if ($Points >= 2000) echo "href='../../formulaire/Lego Minnie/Fille/index.php'"; ?> class="product-photo">
        <img src="assets/images/products/lego-minnie.jpg" height="130" alt="lego-minnie" />
      </a>

      <h2><a <?php if ($Points >= 2000) echo "href='../../formulaire/Lego Minnie/Fille/index.php'"; ?>>Lego Minnie</a></h2>
      <p class="product-description"></p>

      <a <?php if ($Points >= 2000) echo "href='../../formulaire/Lego Minnie/Fille/index.php'"; ?>><button>Réclamer</button></a>
      <p class="product-price">2000 pts</p>
    </li>

    <li>
      <a <?php if ($Points >= 1500) echo "href='../../formulaire/Nerf Ultra Dorado/Fille/index.php'"; ?> class="product-photo">
        <img src="assets/images/products/nerf-ultra-dorado.jpg" height="130" alt="nerf-ultra-dorado" />
      </a>

      <h2><a <?php if ($Points >= 1500) echo "href='../../formulaire/Nerf Ultra Dorado/Fille/index.php'"; ?>>Nerf Ultra Dorado</a></h2>
      <p class="product-description"></p>

      <a <?php if ($Points >= 1500) echo "href='../../formulaire/Nerf Ultra Dorado/Fille/index.php'"; ?>><button>Réclamer</button></a>
      <p class="product-price">1500 pts</p>
    </li>

    <li>
      <a <?php if ($Points >= 1250) echo "href='../../formulaire/Puissance 4 - Jeu de société/Fille/index.php'"; ?> class="product-photo">
        <img src="assets/images/products/puissance4.jpg" height="130" alt="puissance4" />
      </a>

      <h2><a <?php if ($Points >= 1250) echo "href='../../formulaire/Puissance 4 - Jeu de société/Fille/index.php'"; ?>>Puissance 4 - Jeu de société</a></h2>
      <p class="product-description"></p>

      <a <?php if ($Points >= 1250) echo "href='../../formulaire/Puissance 4 - Jeu de société/Fille/index.php'"; ?>><button>Réclamer</button></a>
      <p class="product-price">1250 pts</p>
    </li>

    <li>
      <a <?php if ($Points >= 1000) echo "href='../../formulaire/Baby My Little Love/Fille/index.php'"; ?> class="product-photo">
        <img src="assets/images/products/poupée.jpg" height="130" alt="poupée" />
      </a>

      <h2><a <?php if ($Points >= 1000) echo "href='../../formulaire/Baby My Little Love/Fille/index.php'"; ?>>Baby My Little Love</a></h2>
      <p class="product-description"></p>

      <a <?php if ($Points >= 1000) echo "href='../../formulaire/Baby My Little Love/Fille/index.php'"; ?>><button>Réclamer</button></a>
      <p class="product-price">1000 pts</p>
    </li>

    <li>
      <a <?php if ($Points >= 800) echo "href='../../formulaire/Puzzle de Dinosaures - 1000 pièces/Fille/index.php'"; ?> class="product-photo">
        <img src="assets/images/products/puzzle dinosaure.png" height="130" alt="puzzle-dinosaure" />
      </a>

      <h2><a <?php if ($Points >= 800) echo "href='../../formulaire/Puzzle de Dinosaures - 1000 pièces/Fille/index.php'"; ?>>Puzzle de Dinosaures - 1000 pièces</a></h2>
      <p class="product-description"></p>

      <a <?php if ($Points >= 800) echo "href='../../formulaire/Puzzle de Dinosaures - 1000 pièces/Fille/index.php'"; ?>><button>Réclamer</button></a>
      <p class="product-price">800 pts</p>
    </li>

    <li>
      <a <?php if ($Points >= 750) echo "href='../../formulaire/My Little Poney/Fille/index.php'"; ?> class="product-photo">
        <img src="assets/images/products/my-little-poney.jpg" height="130" alt="my-little-poney" />
      </a>

      <h2><a <?php if ($Points >= 750) echo "href='../../formulaire/My Little Poney/Fille/index.php'"; ?>>My Little Poney</a></h2>
      <p class="product-description"></p>

      <a <?php if ($Points >= 750) echo "href='../../formulaire/My Little Poney/Fille/index.php'"; ?>><button>Réclamer</button></a>
      <p class="product-price">750 pts</p>
    </li>

    <li>
      <a <?php if ($Points >= 700) echo "href='../../formulaire/Uno - Jeu de cartes Classique/Fille/index.php'"; ?> class="product-photo">
        <img src="assets/images/products/uno.jpg" height="130" alt="uno" />
      </a>

      <h2><a <?php if ($Points >= 700) echo "href='../../formulaire/Uno - Jeu de cartes Classique/Fille/index.php'"; ?>>Uno - Jeu de cartes Classique</a></h2>
      <p class="product-description"></p>

      <a <?php if ($Points >= 700) echo "href='../../formulaire/Uno - Jeu de cartes Classique/Fille/index.php'"; ?>><button>Réclamer</button></a>
      <p class="product-price">700 pts</p>
    </li>
  </ul>
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

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>
