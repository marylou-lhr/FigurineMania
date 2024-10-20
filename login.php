<html lang="en">
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

<?php
$loginValide = "admin";
$mdpValide = "admin";

if (isset($_POST['login']) && isset($_POST['mdp'])) {
    if ($loginValide == $_POST['login'] && $mdpValide == $_POST['mdp']) {
        session_start();
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['mdp'] = $_POST['mdp'];
        header('Location: index.php');
    }
    else{
        echo "Erreur de permission";
        echo '<meta http-equiv="refresh" content="0;URL=login.php">';
    }
}
else{
    echo "Veuillez remplir les champs.";
};
?>