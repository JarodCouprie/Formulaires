<?php require_once "connect.php";
    $nPage = 1;
    if (isset($_GET["nPage"]) && $_GET["nPage"]>0){
        $nPage = $_GET["nPage"];
    }
    $parPage = 10;
    $sql = "SELECT COUNT(*) AS nb_film FROM film;";
    $query = $db -> prepare($sql);
    $query -> execute();
    $result = $query-> fetch();
    $nbFilm = (int)$result["nb_film"];
    $pages = ceil ($nbFilm/$parPage);
?>

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
            Ajouter un nouveau film
        </a>
    </button>
    <ol id="film-list">
        <?php
        $offset = ($nPage-1)*$parPage;
        $sql2 = "SELECT * FROM film LIMIT $parPage OFFSET $offset;";
        $recordset = $db -> query($sql2);
        foreach($recordset as $row){?>
            <li class="film">
                <span><?=htmlspecialchars($row["film_titre"]);?></span>
                <div>
                    <a href="./formulaire.php?id=<?=$row["film_id"];?>">
                    <button>
                        Modifier
                    </button>
                    </a>
                    <a href="./delete.php?id=<?=htmlspecialchars($row["film_id"]);?>">
                        <button>
                            Supprimer
                        </button>
                    </a>
                </div>
            </li>
        <?php } ?>
    </ol>
    <div id="pagination">
        <ul>
            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
            <li class="disabled">
                <a href="">Précédente</a>
            </li>
            <?php
            for ($i = 1; $i <= $pages; $i++){
                echo "<li><a href=./index.php?nPage=$i>$i </a></li>";
            }
            ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="disabled">
                <a href="">Suivante</a>
            </li>
        </ul>
    </div>
</body>
</html>