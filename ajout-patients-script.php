<?php

require "functions.php";

$lastname = $_POST['nom'];
$firstname = $_POST['prenom'];
$birthdate = $_POST['date'];
$phone = $_POST['tel'];
$mail = $_POST['email'];

$lastname = htmlspecialchars($lastname);
$firstname = htmlspecialchars($firstname);
$birthdate = htmlspecialchars($birthdate);
$phone = htmlspecialchars($phone);
$mail = htmlspecialchars($mail);

$lastname = urldecode($lastname);
$firstname = urldecode($firstname);
$birthdate = urldecode($birthdate);
$phone = urldecode($phone);
$mail = urldecode($mail);

$lastname = trim($lastname);
$firstname = trim($firstname);
$birthdate = trim($birthdate);
$phone = trim($phone);
$mail = trim($mail);

try {

    $db = connexionBase();
    // Construction de la requête INSERT
    $requete = $db->prepare("INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUES (?,?,?,?,?)");

    //Exécution de la requête :
    $result = $requete->execute([$lastname, $firstname, $birthdate, $phone, $mail]);
    
    // Libération de la connexion au serveur de BDD
    $requete->closeCursor();
}

// Gestion des erreurs
catch (Exception $e) {
    echo "La connexion à la base de données a échoué ! <br>";
    echo "Merci de bien vérifier vos paramètres de connexion ...<br>";
    echo "Erreur : " . $e->getMessage() . "<br>";
    echo "N° : " . $e->getCode();
    die("Fin du script");
}

// Redirection vers la page index.php
header("Location: index.php");
exit;

?>