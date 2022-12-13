<?php

$dbhost = "localhost";
$dbname = "dbfilms";
$dbuser = "root";
$dbpwd = "";

try{
$db = new PDO("mysql:host=".$dbhost.";dbname=".$dbname.";charset=utf8",$dbuser,$dbpwd);

}
catch(Exception $e){
    die("Erreur :".$e->getMessage());
}

?>