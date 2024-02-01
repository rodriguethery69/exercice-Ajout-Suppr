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

// Le WHERE est une configuration d'un SELECT
$sql = "SELECT * FROM jeux_video";

// $dbco est l’objet qui représente la connexion à la base de données et query() est une méthode de cet objet. Cette méthode exécute la requête SQL contenue dans la variable $sql
$result = $dbco-> query($sql);

// La méthode fetchAll va lire ligne par ligne et le stocker dans un tableau $jeux l'objet $result
// Si on a pas la méthode FETCH_ASSOC de défini par défaut
// $jeux = $result->fetchAll(PDO::FETCH_ASSOC); // Tableau de jeux []
$jeux = $result->fetchAll();

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

    <div class="p-3 text-primary-emphasis bg-success-subtle border border-primary-subtle rounded-3 text-center">
        <a href="form.php">AJOUTE TON JEU</a>
    </div>
    <div class="p-3 text-primary-emphasis bg-warning-subtle border border-primary-subtle rounded-3 text-center">
    <a href="supprim.php">SUPPRIME TON JEU</a>
    </div>
<form action="">
    <input type="text" name="" id="">
</form>

<?php foreach ($jeux as $jeu): ?>
   <div class="p-3 bg-primary-subtle border border-primary-subtle rounded-3 text-center">
        <a href="jeux.php?id=<?= $jeu['ID'] ?>"><?= $jeu['nom'] ?></a>
        <a href="">Modifier</a>
    </div>
<?php endforeach; ?>