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
                <a class="nav-link active" href="contact.html">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="figurines.html">Figurines</a>
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
          <h1>Figurines</h1>
          <br>
          <?php
            foreach ($figurines as $figurine) {
          ?>
          <div class="card">
            <img src="Images/<?= $figurine['urlImage'] ?>" class="card-img-top" alt="Photo de la figurine">
            <div class="card-body">
              <h5 class="card-title"><?= $figurine['nom'] ?></h5>
              <p class="card-text"><?= $figurine['nomPerso'] ?> <br> <?= $figurine['license'] ?></p>
              <p class="card-text"><small class="text-body-secondary"><?= $figurine['prix'] ?></small></p>
              <a href="#" class="btn btn-danger btn-sm">Mettre dans le panier</a>
            </div>
            <?php } ?>
          </div>
        </div>
      </main>
      <footer class="footer mt-auto py-3 bg-light">
        <div class="text-center p-1">
          Fait par Marylou Lohier
        </div>
      </footer>
</body>
</html>
