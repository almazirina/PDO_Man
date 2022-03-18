<?php

require "functions.php";
$db = connexionBase();
$id = $_GET['id'];

$req_rdv = ('SELECT * FROM appointments
WHERE idPatients=' . $id);
$res_rdv = $db->query($req_rdv);
$rdv = $res_rdv->fetch(PDO::FETCH_OBJ);
$res_rdv->closeCursor();
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

                    <legend>Details RDV:</legend>

                    <div class="form-group">
                        <label for="idrdv"> Id RDV:</label>
                        <input type="number" name="idrdv" id="idrdv" class="form-control" value="<?php echo $rdv->id; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="dateheure"> Date et l'heure:</label>
                        <input type="datetime" name="dateheure" id="dateheure" class="form-control" value="<?php echo $rdv->dateHour; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="idpat">Id patient:</label>
                        <input type="number" name="idpat" id="idpat" class="form-control" value="<?php echo $rdv->idPatients; ?>" readonly>
                    </div>

                    <a class="btn btn-warning" role="submit" href="update-redezvous.php?id=<?php echo intval($_GET['id']) ?>">Modifier</a>
                    <a href="liste-rendezvous.php" class="btn btn-success" role="button">Retour vers liste RDV</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>