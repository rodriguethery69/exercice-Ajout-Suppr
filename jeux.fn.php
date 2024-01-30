<?php
function findJeuxByID($dbco, $currentId) {
    $sql = "SELECT * FROM `jeux_video` WHERE jeux_video.ID =$currentId";

    // Exécute la requête sur la base de données
        $requete = $dbco->query($sql);
    
        // Récupère la première image associée au film
        $jeux = $requete->fetch();
    
       
        return $jeux;
    }
