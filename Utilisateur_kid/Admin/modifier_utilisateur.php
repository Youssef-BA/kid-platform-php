<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Modifier un étudiant</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
  </head>
  <body>
    <?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kids_sub";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Vérification si l'ID de l'utilisateur est présent dans l'URL
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];

        // Vérification si le formulaire de modification a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $prenom = $_POST['Prenom'];
            $nom = $_POST['Nom'];
            $sexe = $_POST['Sexe'];
            $email = $_POST['Email'];
            $type = $_POST['Type'];
            $password = $_POST['Password'];

            // Mise à jour de l'utilisateur dans la base de données
            $sql = "UPDATE registration SET Prenom='$prenom', Nom='$nom', Sexe='$sexe', Email='$email', Password='$password' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                header("Location: index.php"); // Redirection vers index.php après enregistrement
                exit();
            } else {
                echo "Erreur lors de la mise à jour de l'utilisateur : " . $conn->error;
            }
        }

        // Récupération des informations de l'utilisateur à partir de la base de données
        $sql = "SELECT * FROM registration WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Affichage du formulaire de modification avec les informations existantes
            ?>
            <h2>Modifier l'utilisateur</h2>
            <form method="POST" action="">
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
            <?php
        } else {
            echo "Utilisateur non trouvé.";
        }

    } else {
        echo "ID de l'utilisateur non spécifié.";
    }

    // Fermer la connexion à la base de données
    $conn->close();
    ?>
  </body>
</html>
