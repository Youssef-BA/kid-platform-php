<?php 
    include("connection.php");
    include("login.php")
    ?>
    
<html>
    <head>
        <title>Connexion</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.login.css">
    </head>
    <body>
        
        <div id="form">
            <h1>Se connecter</h1>
        
            <form name="form" action="login.php" onsubmit="return estValide()" method="POST">
            <div class="txt_field">
                <input type="email" id="user" name="Email">
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="password" id="pass" name="password">
                <span></span>
                <label>Mot de passe</label>
            </div>
                <input type="submit" id="btn" value="Se connecter" name="submit"/>
                <div class="signup_link">
                Pas encore membre ? <a href="../Acceuil_site/ACCEUIL/index.php">Inscription</a>
        </div>
            </form>
        </div>
        <script>
            function estValide(){
                var Email = document.form.Email.value;
                var pass = document.form.password.value;
                if(Email.length=="" && pass.length==""){
                    alert("Le champ Email et mot de passe sont vides !");
                    return false;
                }
                else if(Email.length==""){
                    alert("Le champ Email est vide !");
                    return false;
                }
                else if(pass.length==""){
                    alert("Le champ Mot de passe est vide !");
                    return false;
                }
                
            }
        </script>
    </body>
</html>
