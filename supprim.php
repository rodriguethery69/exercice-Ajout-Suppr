<?php
try {
    // Connexion à la base de données
    $dbco = new PDO("mysql:host=localhost;dbname=liste_jeux;charset=utf8", "root", "");
    echo "Connecting to database successfully";

    // Configuration de PDO pour afficher les erreurs
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbco->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Echec de connexion : " . $e->getMessage();
}

// Vérifier si les données du formulaire ont été soumises
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si la clé 'id' est définie dans le formulaire
    if (isset($_POST['nom'])) {
        // Capturer l'ID du jeu à supprimer
        $nom_joueur = $_POST['nom'];

        // Requête SQL de suppression avec une requête préparée
        $delete_query = "DELETE FROM jeux_video WHERE nom = ?";
        
        // Préparer la requête
        $stmt = $dbco->prepare($delete_query);
        
        // Exécuter la requête avec l'ID du jeu à supprimer
        $stmt->execute([$nom_joueur]);

        echo "Le jeu a été supprimé avec succès.";
    } else {
        echo "L'ID du jeu à supprimer n'est pas spécifié.";

        
    }
    header('Location: liste_jeux.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Supprimer un jeu</title>
</head>
<body>
    <h2>Supprimer un jeu</h2>
    <form class="row g-3" method="POST">
        <div class="col-md-4">
            <label for="validationDefault07" class="form-label">Nom du jeu à supprimer</label>
            <input type="text" class="form-control" id="validationDefault07" name="nom" required>
        </div>
        <div class="col-12">
            <button class="btn btn-danger" type="submit">Supprimer le jeu</button>
        </div>
    </form>
</body>
</html>


