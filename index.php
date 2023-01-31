<?php require_once "connect.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Films</title>
</head>
<body>
    <button>Nouveau film</button>
    <ol id="film-list">
        <?php $recordset = $db -> query("SELECT * FROM film");
        foreach($recordset as $row){?>
            <li class="film">
                <span><?=htmlspecialchars("Id du film : ".$row["film_id"]." - ".$row["film_titre"]);?></span>
                <div>
                    <button>Modifier</button>
                    <button>Supprimer</button>
                </div>
            </li>
        <?php } ?>
    </ol>
</body>
</html>