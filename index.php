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
    <button>
        <a href="./formulaire.php">
            Nouveau film
        </a>
    </button>
    <ol id="film-list">
        <?php $recordset = $db -> query("SELECT * FROM film");
        foreach($recordset as $row){?>
            <li class="film">
                <span><?=htmlspecialchars($row["film_titre"]);?></span>
                <div>
                    <a href="./formulaire.php?id=<?=$row["film_id"];?>">
                    <button>
                        Modifier
                    </button>
                    </a>
                    <a href="./delete.php?id=<?=$row["film_id"];?>">
                        <button>
                            Supprimer
                        </button>
                    </a>
                </div>
            </li>
        <?php } ?>
    </ol>
</body>
</html>