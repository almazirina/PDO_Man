<?php
require "functions.php";

$dateHour1 = strtr($_REQUEST['datetime'], '/', '-');
$dateHour = date('Y-m-d H:i:s', strtotime($dateHour1));
$idPatients = $_POST['idpat'];

try {

    $db = connexionBase();
    // Construction de la requête INSERT
    $requete = $db->prepare("INSERT INTO appointments (dateHour, idPatients) VALUES (?,?)");

    //Exécution de la requête :
    $result = $requete->execute([$dateHour, $idPatients]);
    
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