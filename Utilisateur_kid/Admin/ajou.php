<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Ajouter un étudiant</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
  </head>
  <body>
    <div class="container">
      <h1>Ajouter un étudiant</h1>
      <form method="POST" action="enregistrer_etudiant.php">
        <div class="form-group">
          <label for="Prenom">Prénom :</label>
          <input type="text" class="form-control" id="Prenom" name="Prenom" required>
        </div>
        <div class="form-group">
          <label for="Nom">Nom :</label>
          <input type="text" class="form-control" id="Nom" name="Nom" required>
        </div>
        <div class="form-group">
        <label for="Sexe">Sexe :</label>
          <select class="form-control" id="Sexe" name="Sexe" required>
            <option value="Garçon">Garçon</option>
            <option value="Fille">Fille</option>
          </select>
        </div>
        <div class="form-group">
          <label for="Email">Email :</label>
          <input type="email" class="form-control" id="Email" name="Email" required>
        </div>
        <div class="form-group">
          <label for="Password">Mot de passe :</label>
          <input type="password" class="form-control" id="Password" name="Password" required>
        </div>
        <div class="form-group">
          <label for="Type">type :</label>
          <select class="form-control" id="type" name="Type" required>
            <option value="Utilisateur">Utilisateur</option>
            <option value="Admin">Admin</option>
          </select>
        </div>
        <div class="form-group">
          <label for="Points">Points :</label>
          <input type="number" class="form-control" id="Points" name="Points" required>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </form>
    </div>
  </body>
</html>
