<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="admin.css" />
    <link rel="stylesheet" href="admin.css" />
    <style>
      body {
        padding-top: 50px; 
      }
    </style>
  </head>
  <body style="font-family: Optima">
    <div class="container">
      <div class="table">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-md-6 text-center">
                <h2>Liste des utilisateurs</h2>
              </div>
              <div class="col-md-6 text-right">
                <a href="ajou.php" class="btn btn-success">
                  <i class="fa fa-plus-circle"></i>
                  Ajouter un utilisateur
                </a>
              </div>
            </div>
          </div>
          <br />
          <table class="table table-striped table-hover text-center">
            <thead class="thead-dark">
              <tr>
                <th><i class="fa fa-user"></i> ID</th>
                <th><i class="fa fa-user"></i> Prénom</th>
                <th><i class="fa fa-user"></i> Nom</th>
                <th><i class="fa fa-user"></i> Sexe</th>
                <th><i class="fa fa-envelope"></i> Email</th>
                <th><i class="fa fa-lock"></i> Mot de passe</th>
                <th><i class="fa fa-user"></i> Type</th>
                <th><i class="fa fa-star"></i> Points</th>
                <th>Modifier</th>
                <th>Supprimer</th>
              </tr>
            </thead>
            <tbody>
              <?php
                // Connexion à la base de données
                $conn = new mysqli('localhost', 'root', '', 'kids_sub');

                // Vérifier la connexion
                if ($conn->connect_error) {
                    die("Erreur de connexion à la base de données : " . $conn->connect_error);
                }

                // Requête SQL pour récupérer les données des étudiants
                $sql = "SELECT * FROM registration";
                $result = $conn->query($sql);

                // Vérifier s'il y a des résultats
                if ($result->num_rows > 0) {
                    // Parcourir les résultats et afficher les données dans le tableau
                    while ($etudiant = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $etudiant['id'] . "</td>";
                        echo "<td>" . $etudiant['Prenom'] . "</td>";
                        echo "<td>" . $etudiant['Nom'] . "</td>";
                        echo "<td>" . $etudiant['Sexe'] . "</td>";
                        echo "<td>" . $etudiant['Email'] . "</td>";
                        echo "<td>" . $etudiant['Password'] . "</td>";
                        echo "<td>" . $etudiant['Type'] . "</td>";
                        echo "<td>" . $etudiant['Points'] . "</td>";
                        echo "<td>
                              <a href='modifier_utilisateur.php?id=" . $etudiant['id'] . "' title='Modifier'>
                                <img src='../../images/modif.png' alt='Modifier' style='width: 20px; height: 20px;'>
                              </a>
                            </td>";
                        echo "<td>
                              <a href='supprimer_utilisateur.php?id=" . $etudiant['id'] . "' title='Supprimer'>
                                <img src='../../images/remove.png' alt='Supprimer' style='width: 20px; height: 20px;'>
                              </a>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>Aucun étudiant trouvé</td></tr>";
                }
                // Fermer la connexion à la base de données
                $conn->close();
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>

