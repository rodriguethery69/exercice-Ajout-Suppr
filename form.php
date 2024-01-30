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
  // Vérifier si les clés du tableau $_POST sont définies
  // Capturer les données du formulaire
  $nom = $_POST['nom'];
  $possesseur = $_POST['possesseur'];
  $console = $_POST['console'];
  $prix = $_POST['prix'];
  $nbre_joueurs_max = $_POST['nbre_joueurs_max'];
  $commentaires = $_POST['commentaires'];

  // Requête SQL d'insertion avec une requête préparée
  $insert_query = "INSERT INTO jeux_video (nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES ('$nom', '$possesseur', '$console', $prix, $nbre_joueurs_max, '$commentaires')";

  // Préparer la requête
  $stmt = $dbco->query($insert_query);
}

?>

<!DOCTYPE html>
<html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>
    <title>Document</title>
  </head>

  <body>
      <form class="row g-3" method="POST">
          <div class="col-md-4">
            <label for="validationDefault01" class="form-label">nom</label>
            <input type="text" class="form-control" id="validationDefault01" name="nom" value="" required>
          </div>
          <div class="col-md-4">
            <label for="validationDefault02" class="form-label">possesseur</label>
            <input type="text" class="form-control" id="validationDefault02" name="possesseur" value="" required>
          </div>
          <div class="col-md-4">
            <label for="validationDefaultUsername" class="form-label">console</label>
            <input type="text" class="form-control" id="validationDefault03" name="console" value="" required>
          </div>
          <div class="col-md-2">
            <label for="validationDefault03" class="form-label">prix</label>
            <input type="text" class="form-control" id="validationDefault04" name="prix" value="" required>
          </div>
          <div class="col-md-3">
            <label for="validationDefault04" class="form-label">nbre_joueurs_max</label>
            <input type="text" class="form-control" id="validationDefault05" name="nbre_joueurs_max" value="" required>
          </div>
          <div class="col-md-3">
            <label for="validationDefault05" class="form-label">commentaires</label>
            <input type="text" class="form-control" id="validationDefault06" name="commentaires" value="" required>
          </div>
          </div>
          <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
          </div>
        </form>
  </body>
</html>

<?php
