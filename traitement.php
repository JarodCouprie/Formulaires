<?php require_once "connect.php";

$titre = $_POST["titreFilm"];
$description = $_POST["descriptionFilm"];
$date = $_POST["dateDeSortie"];
$age = $_POST["age"];
$realisateur = $_POST["realisateur"];

$id = 0;
if (isset ($_POST["id"]) && $_POST["id"]>0){
    $id = $_POST["id"];
}
if ($id>0){
    $sql = "UPDATE film SET film_titre = :titre, film_description = :description, filmd_date = :date, film_age_id = :age, film_realisateur_id = :realisateur WHERE film_id = :id";
    $stmt -> bindParam(":id", $id, PDO::PARAM_INT);// $stmt pour statement

// Requêtes préparées pour contrer les injections SQL

// $row = $stmt -> fetch();
// $recordset = $stmt -> fetchAll() => uliser un ForEach
}
else{
    $sql = "INSERT INTO film(film_titre,film_description,film_date,film_age_id,film_realisateur_id) VALUES (:titre,:description,:date,:age,:realisateur)";
}
$stmt = $db -> prepare($sql);
$stmt -> bindParam(":titre", $titre, PDO::PARAM_STR);
$stmt -> bindParam(":description", $description, PDO::PARAM_STR);
$stmt -> bindParam(":date", $date, PDO::PARAM_INT);
$stmt -> bindParam(":age", $age, PDO::PARAM_INT);
$stmt -> bindParam(":realisateur", $realisateur, PDO::PARAM_INT);
$stmt -> execute();

foreach( $_POST as $key=>$value )
{
if ($key != "id"){
echo $key." = ".$value."<br>";
}
}

?>