<?php
require "functions.php";

$id=$_GET['id'];

$db = connexionBase();

// Construction de la requête DELETE
// requete supprime tout les Rdv d'un patients

$requete = $db->prepare("DELETE FROM appointments WHERE idPatients=:id");
$requete->bindValue(':id', $id, PDO::PARAM_INT);
$requete->execute();
$requete->closeCursor();

// Redirection vers liste.php
header("Location: liste-rendezvous.php");
exit;

?>