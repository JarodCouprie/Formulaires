<?php // fichier à inclure à toutes les pages dont on veut qu'il y ait une connection
session_start();
if (!isset($_SESSION["connected"]) || $_SESSION["connected"]!="ok"){
    header("Location: login.php");
}
?>