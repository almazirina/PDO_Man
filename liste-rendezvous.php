<?php

require "functions.php";
$db = connexionBase();
$requete = $db->prepare("SELECT * FROM appointments
join patients
on appointments.idPatients = patients.id
ORDER BY appointments.id ASC");
$requete->execute();
$rdv = $requete->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des rendez-vous</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row-8 text-center">
            <div class="col">

                <div class="row-6 text-center">
                    <div class="col">
                        <p class="text-center">Prendre RDV en ligne</p>
                        <a class="btn btn-success" role="button" href="ajout-rendezvous.php">Tapez ici</a>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr class="table-secondary">
                                        <th>Id</th>
                                        <th>Nom, Prénom client</th>
                                        <th>Date et l'heure RDV</th>
                                        <th>Voir les details</th>
                                        <th>Annuler le RDV</th>
                                    </tr>
                                </thead>
                                <?php
                                while (isset($rdv->id)) {
                                    echo "<tr>";

                                    // là on affiche id de patients, mais pas rdv, il a fallu changer la requete Select +haut?
                                    echo "<td>" . $rdv->id . "</td>";
                                    echo "<td>" . $rdv->lastname.' '.$rdv->firstname . "</td>";
                                    echo "<td>" . $rdv->dateHour . "</td>";

                                    // là on transfère id de patients, mais pas de rdv, il a fallu changer la requete Select +haut?
                                    echo '<td><a class="btn btn-warning ml-3 mb-3" role="button" href="rendezvous.php?id=' . $rdv->id . '"><b>+</b></a></td>';

                                     /* en idéale il faut aussi mettre script javascript qui demande "etes vous sur vouloir supprimer?" */
                                    echo '<td><a class="btn btn-warning ml-3 mb-3" id="sup" role="button" href="delete-rendezvous.php?id=' . $rdv->id . '"><b>Supprimer RDV</b></a></td>';
                                    echo "</tr>";
                                    $rdv = $requete->fetch(PDO::FETCH_OBJ);
                                }
                                ?>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
