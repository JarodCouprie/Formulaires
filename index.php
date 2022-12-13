<?php require_once "connect.php";

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
        <input type="text" name="titreFilm" class="saisie" id="titreFilm">
        <br><br>
        <label for="">Description du film</label><br>
        <textarea name="descriptionFilm" id="description" cols="30" rows="10" class="saisie"></textarea>
        <br><br>
        <label for="">Date de sortie</label><br>
        <input type="int" name="dateDeSortie" class="saisie">
        <br><br>
        <select name="age" class="saisie">
            <option value="0">--- Sélection l'âge minimum ---</option>
            <?php
                $recordset = $db -> query("SELECT * FROM age_categorie");
                foreach($recordset as $row){?>
                    <option value="<?=htmlspecialchars($row['age_id']);?>">
                        <?=htmlspecialchars($row['age_minimum']);?>
                    </option>
            <?php }?>
        </select>
        <br><br>
        <select name="realisateur">
            <option value="0">--- Sélection le réalisateur ---</option>
            <?php
                $recordset = $db -> query("SELECT * FROM realisateur");
                foreach($recordset as $row){?>
                    <option value="<?=htmlspecialchars($row['realisateur_id']);?>">
                        <?=htmlspecialchars($row['realisateur_nom']);?>
                        <?=htmlspecialchars($row['realisateur_prenom']);?>
                    </option>
            <?php }?>
        </select>
        <br><br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>