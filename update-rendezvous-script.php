<?php

// pas réussie, ne modifie pas l'heure de RDV, n'a pas trouvé pourquoi

require "functions.php";

$idrdv = $_POST['idrdv'];
$dateHour1 = strtr($_REQUEST['dateheure'], '/', '-');
$dateHour = date('Y-m-d H:i:s', strtotime($dateHour1));
$idPatients = $_POST['idpat'];

try {
    $db = connexionBase();

    // Construction de la requête Update
    $requete = $db->prepare("UPDATE appointments SET dateHour=:dateheure WHERE id=:idrdv");

    $requete->bindValue(':idrdv', $id, PDO::PARAM_INT);
    $requete->bindValue(':dateheure', $dateHour, PDO::PARAM_INT);
    $requete->bindValue(':id', $idPatients, PDO::PARAM_INT);

    $requete->execute();
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

// Redirection
header("Location: liste-rendezvous.php");
exit;
?>