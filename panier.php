<?php
    session_start();
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
            <a class="navbar-brand" href="#">
                <img src="Images/logo.png" width="100" height="100" class="d-inline-block align-text-top">
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.html">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="contact.php">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="figurines.php">Figurines</a>
              </li>
            </ul>
          </div>
          <a class="navbar-brand ms-auto" href="panier.html">
            <img src="Images/panier.png" width="50" height="50" class="d-inline-block align-text-top">
          </a>
        </div>
      </nav>
      <main>
        <?php
            //Connexion à la base de données en pdo
            $pdo = new PDO('mysql:host=lakartxela.iutbayonne.univ-pau.fr;dbname=mlohier001_bd', 'mlohier001_bd', 'mlohier001_bd');

            $sql = "SELECT * FROM Figurine";
            $pdoStatement = $pdo->prepare($sql);
            $pdoStatement->execute();
            $figurines = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="container">
          <br>
          <h1>Panier</h1>
          <br>
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="Images/image1.png" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Nom de la figurine</h5>
                  <p class="card-text">Nom du personnage <br> Nom de l'univers</p>
                  <p class="card-text"><small class="text-body-secondary">Prix</small></p>
                  <a href="#" class="btn btn-danger btn-sm">Retirer du panier</a>
                </div>
              </div>
            </div>
          </div>
          <p> Nombre d'articles : <?php $nb_articles = count($_SESSION['panier']['id_article']); ?></p>
          <p> Total du panier : <?php $nb_articles = sum($_SESSION['panier']['prix']); ?></p>
          <a href="paiement.html" class="btn btn-danger btn-lg">Payer</a>
        </div>
      </main>
      <footer class="footer mt-auto py-3 bg-light">
        <div class="text-center p-1">
          Fait par Marylou Lohier
        </div>
      </footer>
</body>
</html>