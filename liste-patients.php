<?php
require "functions.php";

$db = connexionBase(); // Appel de la fonction de connexion

$requete = $db->prepare("SELECT * FROM patients ORDER BY lastname ASC");
$requete->execute();

$patient = $requete->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des patients</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col">
                <p class="text-justify">Besoin de créer un nouveau profile?</p>
                <a class="btn btn-success" role="button" href="ajout-patients.php">Ajouter patient</a>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="table-secondary">
                                <th class='d-none d-md-table-cell'>Id</th>
                                <th>Nom</th>
                                <th class='d-none d-md-table-cell'>Prénom</th>
                                <th class='d-none d-md-table-cell'>Date de naissance</th>
                                <th>Téléphone</th>
                                <th>E-mail</th>
                                <th>Voir profile</th>
                                <th>Supprimer profile</th>
                            </tr>
                        </thead>
                        <?php
                        while (isset($patient->id)) {
                            echo "<tr>";
                            echo "<td class='d-none d-md-table-cell'>" . $patient->id . "</td>";
                            echo "<td>" . $patient->lastname . "</td>";
                            echo "<td class='d-none d-md-table-cell'>" . $patient->firstname . "</td>";
                            echo "<td class='d-none d-md-table-cell'>" . $patient->birthdate . "</td>";
                            echo "<td>" . $patient->phone . "</td>";
                            echo "<td>" . $patient->mail . "</td>";
                            echo '<td><a class="btn btn-warning ml-3 mb-3" role="button" href="profil-patient.php?id=' . $patient->id . '" title=' . $patient->lastname . '><b>+</b></a></td>';
                            /* en idéale il faut aussi mettre script javascript qui demande "etes vous sur vouloir supprimer?" */
                            echo '<td><a class="btn btn-warning ml-3 mb-3" role="button" href="?id=' . $patient->id . '" title=' . $patient->lastname . '><b>+</b></a></td>';
                            echo "</tr>";
                            $patient = $requete->fetch(PDO::FETCH_OBJ);
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
$requete->closeCursor();
?>