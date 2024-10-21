<?php
    //Page sans UI qui permet d'ajouter une figurine au panier
    session_start(); //Reprise de la session
    
    if (!isset($_SESSION['login']) && !isset($_SESSION['mdp'])) { //Si l'uilisateur n'est pas connecté
        header ('location: login.php'); //Redirection vers la page de connexion
    }
    //Connexion à la base de données en pdo
    $pdo = new PDO('mysql:host=lakartxela.iutbayonne.univ-pau.fr;dbname=mlohier001_bd', 'mlohier001_bd', 'mlohier001_bd');

    if (!isset($_SESSION['panier'])){ //Si le panier n'a pas été créé
        $_SESSION['panier'] = array(); //Création du panier en tant que tableau
    }
    if (isset($_GET['id'])){ //Si un identifiant de figurine a été reçu
        $id = $_GET['id'];
    }
    if (isset($_SESSION['panier'][$id])){ //Si la figurine y est déjà
        $_SESSION['panier'][$id]++; //On ajoute la figurine dans le panier
    }
    else{
        $_SESSION['panier'][$id]=1;
    }
    header("Location:figurines.php"); //Pour que l'utilisateur continue son shopping
?>