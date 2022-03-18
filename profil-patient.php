<?php

require "functions.php";
$db = connexionBase();
$id = $_GET['id'];

$req_patients = ('SELECT * FROM patients
WHERE id=' . $id);
$res_patients = $db->query($req_patients);
$patient = $res_patients->fetch(PDO::FETCH_OBJ);
$res_patients->closeCursor();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile patient:</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <form>

                    <legend>Profile patient:</legend>

                    <div class="form-group">
                        <label for="id"> Id:</label>
                        <input type="number" name="id" id="id" class="form-control" value="<?php echo $patient->id; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nom"> Nom:</label>
                        <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $patient->lastname; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prénom:</label>
                        <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $patient->firstname; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="date">Date de naissance:</label>
                        <input type="date" name="date" id="date" class="form-control" value="<?php echo $patient->birthdate; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="tel">Téléphone:</label>
                        <input type="tel" name="tel" id="tel" class="form-control" value="<?php echo $patient->phone; ?>" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="nomprenom@example.com" value="<?php echo $patient->mail; ?>" readonly>
                    </div>

                    <a class="btn btn-warning" role="submit" href="update-patient.php?id=<?php echo intval($_GET['id']) ?>">Modifier</a>
                    <a href="liste-patients.php" class="btn btn-success" role="button">Retour vers liste</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>