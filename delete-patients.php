<?php
require "functions.php";

$id=$_GET['id'];

$db = connexionBase();

// n'a pas reussie
$requete = $db->prepare("");

$requete->bindValue(':id', $id, PDO::PARAM_INT);
$requete->execute();
$requete->closeCursor();

// Redirection vers liste.php
header("Location: liste-patients.php");
exit;

?>