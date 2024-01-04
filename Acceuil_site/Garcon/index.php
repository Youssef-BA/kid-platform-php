<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v8 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="../z_backend/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="../z_backend/css/style-G.css">
	</head>

	<body>
		<div class="wrapper">
			<!-- BACKGROUND IMAGE -->
			<div class="image-holder">
				<img src="../z_backend/images/garcon_back.jpg" alt="">
				
			</div>
			<div class="form-inner">
				<form name="form" action="registration.php" onsubmit="return estValide()" method="POST">
					<!-- LE MOT : S'INSCRIRE + ICONE -->
					<div class="form-header">
						<h3>S'inscrire</h3>
						<img src="../z_backend/images/sign-up.png" alt="" class="sign-up-icon">
					</div>
					<!-- PRENOM -->
					<div class="form-group">
						<label>Prénom :</label>
						<input name='Prenom' type="text" class="form-control" data-validation="length alphanumeric" data-validation-length="3-12">
					</div>
					<!-- NOM -->
					<div class="form-group">
						<label>Nom :</label>
						<input name='Nom' type="text" class="form-control" data-validation="length alphanumeric" data-validation-length="3-12">
					</div>
					<!-- EMAIL -->
					<div class="form-group">
						<label >E-mail :</label>
						<input name='Email' type="email" class="form-control">
					</div>
					<!-- MOT DE PASSE -->
					<div class="form-group" >
						<label for="">Mot de passe :</label>
						<input name='password' type="password" class="form-control" data-validation="length" data-validation-length="min8">
					</div>
					<!-- BOUTTON S'INSCRIRE-->
					<button>créer mon compte</button>
					<!-- DEJA AVOIR UN COMPTE -->
					<div class="socials">
						<p>Déjà membre ? <a href="../../Connexion/index.php">Se Connecter</a></p>
					</div>
				</form>
			</div>
			
		</div>
		<script src="../z_backend/js/jquery-3.3.1.min.js"></script>
		<script src="../z_backend/js/jquery.form-validator.min.js"h></script>
		<script src="../z_backend/js/main.js"></script>
	</body><!-- Ce modèle a été créé par Colorlib (https://colorlib.com) -->
</html>
