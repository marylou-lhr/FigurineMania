<?php
session_start(); //Reprise de la session
session_unset(); //On dissocie l'utilisateur à la session
session_destroy(); //Session détruite
header ('location: login.php'); //Redirection vers la page de connexion
?>