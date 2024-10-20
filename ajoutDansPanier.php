<?php
    if (!isset($_SESSION['login']) && !isset($_SESSION['mdp'])) {
        header ('location: login.php');
    }
    //Connexion à la base de données en pdo
    $pdo = new PDO('mysql:host=lakartxela.iutbayonne.univ-pau.fr;dbname=mlohier001_bd', 'mlohier001_bd', 'mlohier001_bd');

    if (!isset($_SESSION['panier'])){
        $_SESSION['panier'] = array();
    }
    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }
    if (isset($_SESSION['panier'][$id])){
        $_SESSION['panier'][$id]++;
    }
    else{
        $_SESSION['panier'][$id]=1;
    }
    header("Location:figurines.php");
?>