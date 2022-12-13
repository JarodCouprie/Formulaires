<?php

require_once "connect.php";

$titre = $_POST["titreFilm"];
$description = $_POST["descriptionFilm"];
$date = $_POST["dateDeSortie"];
$age = $_POST["age"];
$realisateur = $_POST["realisateur"];

//$db->query("INSERT INTO film(film_titre,film_description,film_date) VALUES ('".$titre."','".$description."',".$date.")");

// Requêtes préparées pour contrer les injections SQL

$stmt = $db->prepare("INSERT INTO film(film_titre,film_description,film_date,film_age_id,film_realisateur_id) VALUES (:titre,:description,:date,:age,:realisateur)"); // $stmt pour statement

//$stmt -> execute([":titre" => $titre, ":description" => $description, ":date" => $date]);

$stmt -> bindParam(":titre", $titre, PDO::PARAM_STR);
$stmt -> bindParam(":description", $description, PDO::PARAM_STR);
$stmt -> bindParam(":date", $date, PDO::PARAM_INT);
$stmt -> bindParam(":age", $age, PDO::PARAM_INT);
$stmt -> bindParam(":realisateur", $realisateur, PDO::PARAM_INT);

$stmt -> execute();


?>