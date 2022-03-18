<?php

include("functions.php");
$db = connexionBase();


// Récupération des informations du patients
$req_patients = ('SELECT * FROM patients');
$req_patients = $db->query($req_patients);
// Renvoi de l'enregistrement sous forme d'un objet
$patients = $req_patients->fetchAll(PDO::FETCH_OBJ);
$req_patients->closeCursor();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendez-vous</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="ajout-rendezvous-script.php", method="post">
                    <legend>Prendre un rendez-vous:</legend>

                    <div class="form-group">
                        <label for="datetime">Date et l'heure</label>
                        <input type="datetime" name="datetime" id="datetime" class="form-control" placeholder="jj/mm/aaaa hh:mm" required>
                    </div>

                    <div class="form-group">
                        <label for="idpat">Id patient</label>
                        <select type="text" name="idpat" id="idpat" class="form-control" value="<?php echo $patients->id; ?>" required>
                        <?php foreach ($patients as $pat) { ?>
                            <option value="<?php echo $pat->id; ?>"><?php echo $pat->lastname.' '.$pat->firstname; ?></option><?php } ?>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-success">Enregister</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>