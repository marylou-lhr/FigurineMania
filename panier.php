<?php
  session_start(); //Reprise de la session
    
  if (!isset($_SESSION['login']) && !isset($_SESSION['mdp'])) { //Si l'uilisateur n'est pas connecté
    header ('location: login.php'); //Redirection vers la page de connexion
  }
  $prixTotal = 0; //Prix total de base
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
    <main class="flex-grow-1">
      <div class="container">
        <br>
        <h1>Panier</h1>
        <br>
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <?php
              //Connexion à la base de données en pdo
              $pdo = new PDO('mysql:host=lakartxela.iutbayonne.univ-pau.fr;dbname=mlohier001_bd', 'mlohier001_bd', 'mlohier001_bd');
              $ids = array_filter(array_keys($_SESSION['panier']), 'is_numeric'); //Liste des identifiants des figurines envoyées dans le panier
              if (empty($ids)){ //Si la liste est vide
                print("Votre panier est vide");
              }
              else{
                $ListeIds = "(" . implode(',', $ids) . ")";

                $sql = "SELECT * FROM Figurine WHERE id IN $ListeIds";
                $pdoStatement = $pdo->prepare($sql);
                $pdoStatement->execute();
                $figurines = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
                  
                echo '<div class="row g-0">';

                foreach($figurines as $figurine):
                  $prixTotal += $figurine['prix'] * $_SESSION['panier'][$figurine['id']]; //Calcul du prix total
                  ?>
                  <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="Images/<?=$figurine['urlImage']?>" class="img-fluid rounded" alt="Photo de la figurine">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title"><?=$figurine['nom']?></h5>
                          <p class="card-text"><small class="text-body-secondary"><?=$figurine['prix']?> € <br> Quantité : <?=$_SESSION['panier'][$figurine['id']]?></p>
                          <a href="panier.php?del=<?=$figurine['id']?>" class="btn btn-danger btn-sm">Retirer du panier</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; } ?>
              </div>
            </div>
          </div>
          <h5> Total du panier : <?=$prixTotal ?> €</h5>
          <br>
          <a href="paiement.php" class="btn btn-danger btn-lg">Payer</a>
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