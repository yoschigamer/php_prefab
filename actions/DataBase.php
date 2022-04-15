<?php
session_start();
try {
    $bdd = new PDO('mysql:host=localhost;dbname=NOM_DE_LA_BDD;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
