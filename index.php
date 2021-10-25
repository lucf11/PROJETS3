<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login - UM</title>
</head>
<body>
    <div class="fond">
        <div id="header">
            <div id="conteneur">
                <img src="img/logo_v2.png" alt="univ">
                <h1>Université de Montpellier</h1>
            </div>
        </div>
        <div class="container">
            <div class="titre">
                <h1>Connectez-vous</h1>
            </div>
            <div class="block">
                <form action="login.php" method="post">
                    <label>Identifiant</label>
                    <input class="champ" type="text" name="id" required>
                    <label>Mot de passe</label>
                    <input class="champ" type="password" name="mdp" required>
                    <input name="submit" type="submit" value="Connexion" id="submit_button">
                </form>
            </div>
        </div>
        <footer>
            <div class="services">
                <div class="service">
                    <h3>Politique de Confidentialité</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget efficitur magna. Maecenas blandit tincidunt eros a vulputate. 
                     Nunc dapibus massa in efficitur tempus.</p>
                </div>
                <div class="service">
                    <h3>Paiement sécurisé</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget efficitur magna. Maecenas blandit tincidunt eros a vulputate. 
                         Nunc dapibus massa in efficitur tempus.</p>
                </div>
                <div class="service">
                    <h3>Mentions Légales</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget efficitur magna. Maecenas blandit tincidunt eros a vulputate. 
                       Nunc dapibus massa in efficitur tempus.</p>
                </div>
            </div>
            <p id="contact">Contact : 06 50 53 85 66 | &copy; 2021, Université de Montpellier.</p>
        </footer>
    </div> 
 </body>
</html>