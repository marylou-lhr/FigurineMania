<?php
//Définition d'un login et d'un mot de passe valide
$loginValide = "admin";
$mdpValide = "admin";

if (isset($_POST['login']) && isset($_POST['mdp'])) { //Si les champs sont remplis
    if ($loginValide == $_POST['login'] && $mdpValide == $_POST['mdp']) { //Si le login et le mot de passe sont valides
        session_start(); //La session démarre
        $_SESSION['login'] = $_POST['login']; //login entré -> login de session
        $_SESSION['mdp'] = $_POST['mdp']; //mot de passe entré -> mot de passe de session
        header('Location: index.php'); //Redirection vers la page d'accueil
    }
    else{
        echo "Erreur de permission";
        echo '<meta http-equiv="refresh" content="0;URL=login.php">'; //Actualise la page
    }
}
else{
    echo "Veuillez remplir les champs.";
};
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FigurineMania - Connexion</title>
</head>
<body>
    <h1>Connexion à FigurineMania</h1>
    <a href="#">
        <img src="Images/logo.png">
    </a>
    <form action="login.php" method="POST">
    Login : <input type="text" name="login" required>
    <br><br>
    Mot de passe : <input type="password" name="mdp" required>
    <br><br>
    <input type="submit" value="Connexion">
    </form>
</body>
</html>