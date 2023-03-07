<?php require_once "../connect.php";

// $titre = $_POST["titreFilm"];
// $description = $_POST["descriptionFilm"];
// $date = $_POST["dateDeSortie"];
// $age = $_POST["age"];
// $realisateur = $_POST["realisateur"];
$id = 0;
$values = [];
$sql2 = "";

if (isset ($_POST["film_id"]) && $_POST["film_id"]>0){
    $id = $_POST["film_id"];
}
if ($id>0){
    $sql = "UPDATE film SET ";
    foreach($_POST as $field=>$value){
        if ($field != "film_id"){
            $sql.= $field."= :".$field.",";
            $values[":".$field] = $value;
        }
    }
    $sql = rtrim($sql,",");
    $sql.= " WHERE film_id=:film_id";
    $values[":film_id"] = $_POST["film_id"];
    echo $sql;
}else{
    $sql = "INSERT INTO film(";
    foreach($_POST as $field=>$value )
    {
        if ($field != "film_id"){
            $sql.=$field.",";
            $sql2.=":".$field.",";
            $values[":".$field] = $value;
        }
    }
    $sql = rtrim($sql,",");
    $sql2 = rtrim($sql2,",");
    $sql.=") VALUES (".$sql2.");";
}
// echo $sql;
// var_dump($values);
$stmt = $db -> prepare($sql);
$stmt -> execute($values);

// $id = 0;
// if (isset ($_POST["film_id"]) && $_POST["film_id"]>0){
//     $id = $_POST["film_id"];
// }
// if ($id>0){
//     $sql = "UPDATE film SET film_titre = :titre, film_description = :description, filmd_date = :date, film_age_id = :age, film_realisateur_id = :realisateur WHERE film_id = :id";
//     $stmt -> bindParam(":id", $id, PDO::PARAM_INT);// $stmt pour statement

//Requêtes préparées pour contrer les injections SQL

// }
// else{
//     $sql = "INSERT INTO film(film_titre,film_description,film_date,film_age_id,film_realisateur_id) VALUES (:titre,:description,:date,:age,:realisateur)";
// }
// $stmt = $db -> prepare($sql);
// $stmt -> bindParam(":titre", $titre, PDO::PARAM_STR);
// $stmt -> bindParam(":description", $description, PDO::PARAM_STR);
// $stmt -> bindParam(":date", $date, PDO::PARAM_INT);
// $stmt -> bindParam(":age", $age, PDO::PARAM_INT);
// $stmt -> bindParam(":realisateur", $realisateur, PDO::PARAM_INT);
// $stmt -> execute();

header("Location: index.php");

?>