<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profil</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="script.js"></script>
</head>
<?php include('verification.php')?>
<body>
<header>
    <button id="menu-button" onclick="toggleMenu()">&#9776;</button>
  </header>
<aside id="sidebar">
    <center><img src="../../../images/garcon.png" class="nom_util" alt="Photo de l'utilisateur">
      <h3 class="name"><?php echo $Prenom . ' ' . $Nom; ?></h3>
      <a href="../../Profil/Garcon/index.php" class="btn1"><p class='prof'>Profile</p></a>
      <div class='marg'></div>
	  <?php if ($Type === 'Admin'): ?>
          <a href="../../Admin/index.php" class="btn2"><p class='prof'>Admin</p></a>
        <?php endif; ?>
        <a href="../../acceuil/Garcon/index.php" class="btn2"><p class='prof'>Accueil</p></a>
        <a href="../../A propos de nous/Garcon/index.php" class="btn2"><p class='prof'>À propos de nous</p></a>
        <a href="../../Cours/Garcon/index.php" class="btn2"><p class='prof'>Les cours</p></a>
        <a href="../../Test/Garcon/index.php" class="btn2"><p class='prof'>Les contrôles</p></a>
		<a href="../../Reward/Garcon/index.php" class="btn2"><p class='prof'>récompense</p></a>
        <a href="../../Contact/Garcon/index.php" class="btn2"><p class='prof'>Contactez nous</p></a>
      <div class='marg'></div>
      <a href="../../../Connexion/index.php" class="btn1"><p class='prof'>Se Déconnecter</p></a></center>
  </aside>

	<section class="py-5 my-5">
		<div class="container">
			<h1 class="mb-5">Profil</h1>
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="p-4">
						<div class="img-circle text-center mb-3">
							<img src="../../../images/garcon.png" alt="Image" class="shadow">
						</div>
						<h4 class="text-center"><?php echo $Prenom . ' ' . $Nom; ?></h4>
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i> 
							Compte
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i> 
							Mot de pass
						</a>
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
				<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
					<h3 class="mb-4">Profil</h3>
					<form method="POST" action="modif.php">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Prenom</label>
								<input type="text" class="form-control" name="Prenom" value="<?php echo $Prenom ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Nom</label>
								<input type="text" class="form-control" name="Nom" value="<?php echo $Nom ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Email</label>
								<input type="text" class="form-control" name="Email" value="<?php echo $Email ?>">
							</div>
						</div>
					</div>
						<div>
							<button class="btn btn-primary" type="submit">Update</button>
						</div>
					</form>
				</div>
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<h3 class="mb-4">Mot de pass</h3>
						<form method="POST" action="modif_mdp.php">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Mot de passe ancien</label>
									<input type="password" class="form-control" name="Last">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nouveau mot de passe</label>
									<input type="password" class="form-control" name="new1">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Confirmer le mot de passe</label>
									<input type="password" class="form-control" name="new2">
								</div>
							</div>
						</div>
						<div>
							<button class="btn btn-primary" type="submit">Update</button>
						</div>
						</form>
					</div>
				</div>
			</div>
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

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>