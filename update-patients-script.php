<?php

require "functions.php";

$id = $_POST['id'];
$lastname = $_POST['nom'];
$firstname = $_POST['prenom'];
$birthdate = $_POST['date'];
$phone = $_POST['tel'];
$mail = $_POST['email'];


try {
    $db = connexionBase();

    // Construction de la requête Update
    $requete = $db->prepare("UPDATE patients SET lastname=:nom, firstname=:prenom, birthdate=:date, phone=:tel, mail=:email
    WHERE id=:id");

    $requete->bindValue(':id', $id, PDO::PARAM_INT);
    $requete->bindValue(':nom', $lastname, PDO::PARAM_STR);
    $requete->bindValue(':prenom', $firstname, PDO::PARAM_STR);
    $requete->bindValue(':date', $birthdate, PDO::PARAM_STR);
    $requete->bindValue(':tel', $phone, PDO::PARAM_STR);
    $requete->bindValue(':email', $mail, PDO::PARAM_STR);

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
header("Location: profil-patient.php?id=" . $id);
exit;
?>