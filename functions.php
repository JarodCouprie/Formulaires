<?php

function renommage($fichierSource, $titreFilm){
    $resultat = $titreFilm;
    $resultat = str_replace(" ","-",$resultat);
    $resultat = str_replace("é","e",$resultat);
    $ext = substr($fichierSource, strrpos($fichierSource,"."));
    return $resultat.$ext;
}


?>