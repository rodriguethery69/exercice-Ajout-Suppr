<?php

try {
    // On a définit le charset utf8 directement dans la classe PDO au lieu d'utiliser $conn->exec("SET NAMES utf8");
    $dbco = new PDO("mysql:host=localhost;dbname=liste_jeux;charset=utf8", "root", "",);
    echo "Connecting to database successfully";

    // setAttribute c'est une méthode qui appartient à l'objet $conn qui est lui même une instance de la classe PDO
    // On définit l'attribut par défaut du mode Fetch
    // https://www.php.net/manual/fr/pdo.setattribute.php
    // set donne cet attribut
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbco->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // On va traquer l'erreur, class Error https://www.php.net/manual/fr/class.error.php
} catch (PDOException $e) {
    // Passe moi l'erreur
    echo "echec de connexion";
    // Toujours la première erreur qui apparait
    // var_dump($e->getMessage());
}

require_once __DIR__ . ('/jeux.fn.php'); 
$jeu = findJeuxByID($dbco, $_GET['id']);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title></title>
</head>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h1 class="card-title"><?= $jeu['nom']; ?></h1>
    <h2 class="card-subtitle mb-2 text-body-secondary"><?= $jeu['possesseur'] ?></h2>
    <h2 class="card-subtitle mb-2 text-body-secondary"><?= $jeu['console']; ?></h2>
    <h2 class="card-subtitle mb-2 text-body-secondary"><?= $jeu['prix']; ?></h2>
    <h2 class="card-subtitle mb-2 text-body-secondary"><?= $jeu['nbre_joueurs_max']; ?></h2>

    <p class="card-text"><?= $jeu['commentaires']; ?></p>
    <div class="p-3 text-primary-emphasis bg-success-subtle border border-primary-subtle rounded-3 text-center">
        <a href="form.php">MODIFIE TON JEU</a>
    </div>
    <div class="p-3 text-primary-emphasis bg-danger-subtle border border-primary-subtle rounded-3 text-center">
    <a href="supprim.php">SUPPRIME TON JEU</a>
    </div>
  </div>
</div>




