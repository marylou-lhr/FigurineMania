<?php
  session_start(); //Reprise de la session
    
  if (!isset($_SESSION['login']) && !isset($_SESSION['mdp'])) { //Si l'uilisateur n'est pas connecté
    header ('location: login.php'); //Redirection vers la page de connexion
  }

  if (isset($_POST['btn-confirm']) && isset($_POST['inputId']) && isset($_POST['inputNom']) && isset($_POST['inputNomPerso']) && isset($_POST['inputLicense']) && isset($_POST['inputImage']) && isset($_POST['inputPrix'])){
    //Connexion à la base de données en pdo
    $pdo = new PDO('mysql:host=lakartxela.iutbayonne.univ-pau.fr;dbname=mlohier001_bd', 'mlohier001_bd', 'mlohier001_bd');

    $id = $_POST['inputId'];
    $nom = $_POST['inputNom'];
    $nomPerso = $_POST['inputNomPerso'];
    $license = $_POST['inputLicense'];
    $image = $_POST['inputImage'];
    $prix = $_POST['inputPrix'];

    $sql = "INSERT INTO Figurine VALUES($id,'$nom','$nomPerso','$license','$image',$prix)"; //Insertion de la figurine choisie
    $pdoStatement = $pdo->prepare($sql);
    if ($pdoStatement->execute()){
      print("Figurine insérée avec succès !");
    }
    else{
      print("Erreur d'insertion.");
    }
  }
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FigurineMania</title>
    <link rel="stylesheet" href = "node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="Images/logo.png" width="100" height="100" class="d-inline-block align-text-top">
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="contact.php">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="figurines.php">Figurines</a>
              </li>
            </ul>
          </div>
          <a class="navbar-brand ms-auto" href="panier.php">
            <img src="Images/panier.png" width="50" height="50" class="d-inline-block align-text-top">
          </a>
        </div>
    </nav>
    <main>
        <br>
        <div class="container">
            <form method="POST">
              <div class="row mb-2">
                <label for="inputId" class="col-sm-2 col-form-label">Identifiant</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="inputId">
                </div>
              </div>
              <div class="row mb-2">
                <label for="inputNom" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="inputNom">
                </div>
              </div>
              <div class="row mb-2">
                <label for="inputNomPerso" class="col-sm-2 col-form-label">Nom du personnage</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="inputNomPerso" placeholder="Prénom Nom">
                </div>
              </div>
              <div class="row mb-2">
                <label for="inputLicense" class="col-sm-2 col-form-label">Univers</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="inputLicense">
                </div>
              </div>
              <div class="row mb-2">
                <label for="inputImage" class="col-sm-2 col-form-label">Lien de l'image</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="inputImage" placeholder="Nom de l'image dans le dossier Images + extension">
                </div>
              </div>
              <div class="row mb-2">
                <label for="inputPrix" class="col-sm-2 col-form-label">Prix</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="inputPrix" placeholder="00.00">
                </div>
              </div>
              <br>
              <button type="submit" name="btn-confirm" class="btn btn-danger">Ajouter</button>
            </form>
    </main>
    <footer class="footer mt-auto py-3 bg-light text-center">
        <button class="rounded btn btn-danger" type="button" onclick="window.location.href = 'logout.php'">Se déconnecter</button>
        <div class="p-1">
        Fait par Marylou Lohier <br>
        <a href="https://github.com/marylou-lhr/FigurineMania">
            <img src="Images/github.svg" width="25" height="25">
        </a>
        </div>
    </footer>
</body>
</html>