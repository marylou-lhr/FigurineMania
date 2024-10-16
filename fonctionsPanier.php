<?php
function creerPanier(){
        if (!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
            $_SESSION['panier']['id'] = array();
            $_SESSION['panier']['nom'] = array();
            $_SESSION['panier']['nomPerso'] = array();
            $_SESSION['panier']['license'] = array();
            $_SESSION['panier']['urlImage'] = array();
            $_SESSION['panier']['prix'] = array();

            print("Panier vide");
        }
    }

    function ajoutFigure($select){
        creerPanier();
        array_push($_SESSION['panier']['id'],$select['id']);
        array_push($_SESSION['panier']['nom'],$select['nom']);
        array_push($_SESSION['panier']['nomPerso'],$select['nomPerso']);
        array_push($_SESSION['panier']['license'],$select['license']);
        array_push($_SESSION['panier']['urlImage'],$select['urlImage']);
        array_push($_SESSION['panier']['prix'],$select['prix']);
    }

    function supprFigure($nomFigure){
        $supprOk = false;
        $tmp = array('id'=>array(),'nom'=>array(),'nomPerso'=>array(),'license'=>array(),'urlImage'=>array(),'prix'=>array());
        $nb_figures = count($_SESSION['panier']['id_article']);
        for ($i=0; $i < $nb_figures; $i++) { 
            /* On transfère tout sauf l'article à supprimer */
            if($_SESSION['panier']['id'][$i] != $nomFigure)
            {
                array_push($panier_tmp['id'],$_SESSION['panier']['id'][$i]);
                array_push($panier_tmp['nom'],$_SESSION['panier']['nom'][$i]);
                array_push($panier_tmp['nomPerso'],$_SESSION['panier']['nomPerso'][$i]);
                array_push($panier_tmp['license'],$_SESSION['panier']['license'][$i]);
                array_push($panier_tmp['urlImage'],$_SESSION['panier']['urlImage'][$i]);
                array_push($panier_tmp['prix'],$_SESSION['panier']['prix'][$i]);
            }
        }
        $_SESSION['panier'] = $tmp;
        unset($tmp);
        $supprOk = true;
        return $supprOk;
    }

?>