<?php
  session_start();
  if (!isset($_SESSION['login']) && !isset($_SESSION['mdp'])) {
    header ('location: login.php');
  };
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
          <div class="row">
          <?php
            foreach ($figurines as $figurine) {
          ?>
          <div class="col-md-6 mb-4 col-12">
            <div class="card">
              <a href="Images/<?= $figurine['urlImage'] ?>">
              <img src="Images/<?= $figurine['urlImage'] ?>" class="card-img-top img-thumbnail" alt="Photo de la figurine">
              </a>
              <div class="card-body">
                <h5 class="card-title"><?= $figurine['nom'] ?></h5>
                <p class="card-text"><?= $figurine['nomPerso'] ?> <br> <?= $figurine['license'] ?></p>
                <p class="card-text"><small class="text-body-secondary"><?= $figurine['prix'] ?> €</small></p>
                <a href="ajoutDansPanier.php?id=<?=$figurine['id']?>" class="btn btn-danger btn-sm">Mettre dans le panier</a>
              </div>
            </div>
            </div>
          <?php } ?>
          </div>
        </div>
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
