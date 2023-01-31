<?php require_once "connect.php";
    $id = 0;
    if (isset($_GET["id"]) && $_GET["id"]>0){
        $id = $_GET["id"];
    }
    $titre = "";
    $description = "";
    $date_de_sortie = "";
    $age_id = 0;
    $realisateur_id = 0;
    if ($id>0){
        $stmt = $db -> prepare ("SELECT * FROM film WHERE film_id = :id");
        $stmt -> execute ([":id"=>$id]);
        if ($row = $stmt -> fetch()){
            $titre = $row["film_titre"];
            $description = $row["film_description"];
            $date_de_sortie = $row["film_date"];
            $age_id = $row["film_age_id"];
            $realisateur_id = $row["film_realisateur_id"];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <form method="post" action="traitement.php">
        <label for="">Titre du film</label><br>
        <input type="text" name="titreFilm" class="saisie" value="<?=htmlspecialchars($titre);?>">
        <br><br>
        <label for="">Description du film</label><br>
        <textarea name="descriptionFilm" id="description" cols="30" rows="10" class="saisie" value="<?=htmlspecialchars($description);?>"></textarea>
        <br><br>
        <label for="">Date de sortie</label><br>
        <input type="int" name="dateDeSortie" class="saisie" id="date-de-sortie" value="<?=htmlspecialchars($date_de_sortie);?>">
        <br><br>
        <select name="age" class="saisie">
            <option value="0">--- Sélection l'âge minimum ---</option>
            <?php
                $recordset = $db -> query("SELECT * FROM age_categorie");
                foreach($recordset as $row){?>
                    <option value="<?=htmlspecialchars($row['age_id']);?>" <?=($row["age_id"]== $age_id)?"selected":"";?> >
                        <?=htmlspecialchars($row['age_minimum']);?>
                    </option>
            <?php }?>
        </select>
        <br><br>
        <select name="realisateur" class="saisie">
            <option value="0">--- Sélection le réalisateur ---</option>
            <?php
                $recordset = $db -> query("SELECT * FROM realisateur");
                foreach($recordset as $row){?>
                    <option value="<?=htmlspecialchars($row['realisateur_id']);?>" <?=($row["realisateur_id"]== $realisateur_id)?"selected":"";?> >
                        <?=htmlspecialchars($row['realisateur_nom']);?>
                        <?=htmlspecialchars($row['realisateur_prenom']);?>
                    </option>
            <?php }?>
        </select>
        <br><br>
        <input type="hidden" name="id" value="<?=$id;?>">
        <input type="submit" value="Envoyer" class="saisie" id="submit-button">
    </form>
</body>
</html>