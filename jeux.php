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

<section class="py-5">
    <div class="col-4 mt-3 mx-auto">
        <div class="card">

            <div class="card-body">
                <div class="text-center">
                    <h3>
                        <?= $jeu['nom']; ?>
                    </h3>
                    <h3>
                        <?= $jeu['possesseur'] ?>
                    </h3>
                    <h3>
                        <?= $jeu['console']; ?>
                    </h3>   
                    <h3>
                        <?= $jeu['prix']; ?>
                    </h3>
                    <h3>
                        <?= $jeu['nbre_joueurs_max']; ?>
                    </h3>
                    <h3>
                        <?= $jeu['commentaires']; ?>
                    </h3>
                    
                
                </div>
            </div>
        </div>
    </div>
</section>

