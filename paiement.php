<?php
  session_start(); //Reprise de la session

  date_default_timezone_set('Europe/Paris'); //Sert à préciser la timezone en France
  $date = date_default_timezone_get(); //Récupération de la date actuelle
  $anneeActuelle = date('Y'); //Récupération de l'année actuelle
  $moisActuel = date('F'); //Récupération du mois actuel en format "Janvier"
  if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['numCard']) && isset($_POST['codeSecret'])
      && isset($_POST['month']) && isset($_POST['year']) && isset($_POST['adressePaiement'])  && isset($_POST['adresseLivraison'])  && isset($_POST['ville'])  && isset($_POST['zip'])) {
    if (strlen($_POST['numCard']) == 16 && strlen($_POST['codeSecret']) == 3 && strlen($_POST['zip']) == 5){
      if ($_POST['year'] > $anneeActuelle || $_POST['year'] == $anneeActuelle && $_POST['month'] >= $moisActuel)
      {
        header("Location: paiementOk.php"); //Si tous les champs ont été remplis et que tout a bien été rempli, on redirige vers une page de confirmation
      }
      else{
        echo "Paiement échoué : Carte expirée";
      }
    }
    else{
      echo "Informations invalides.";
    }
  }
  else{
    echo "Veuillez remplir les champs.";
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
          <a class="navbar-brand ms-auto" href="panier.html">
            <img src="Images/panier.png" width="50" height="50" class="d-inline-block align-text-top">
          </a>
        </div>
      </nav>
      <main>
        <div class="container">
          <br>
          <h1>Paiement</h1>
          <br>
          <form class="row g-3" method="POST">
            <div class="col-md-6">
              <label for="inputNom2" class="form-label">Nom</label>
              <input type="text" class="form-control" id="inputNom2" name="nom" placeholder="ex : Smith" required>
            </div>
            <div class="col-md-6">
              <label for="inputPrenom2" class="form-label">Prénom</label>
              <input type="text" class="form-control" id="inputPrenom2" name="prenom" placeholder="ex : John" required>
            </div>
            <div class="col-12">
              <label for="inputEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="inputEmail" name="email" placeholder="ex : johnsmith@gmail.com" required>
            </div>
            <div class="col-4">
              <label for="inputCard" class="form-label">Numéro de carte</label>
              <input type="number" class="form-control" id="inputCard" name="numCard" placeholder="ex : 1234 5678 9123" required>
            </div>
            <div class="col-4">
              <label for="inputSecretCode" class="form-label">Code secret</label>
              <input type="number" class="form-control" id="inputSecretCode" name="codeSecret" placeholder="ex : 123" required>
            </div>
            <div class="col-4">
              <br>
              <label for="month">Mois :</label>
              <select id="month" name="month">
                <option value="01">Janvier</option>
                <option value="02">Février</option>
                <option value="03">Mars</option>
                <option value="04">Avril</option>
                <option value="05">Mai</option>
                <option value="06">Juin</option>
                <option value="07">Juillet</option>
                <option value="08">Août</option>
                <option value="09">Septembre</option>
                <option value="10">Octobre</option>
                <option value="11">Novembre</option>
                <option value="12">Décembre</option>
              </select>
              <br>
              <label for="year">Année :</label>
              <select id="year" name="year">
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>
              </select>
            </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label">Adresse de paiement</label>
              <input type="text" class="form-control" id="inputAddress" name="adressePaiement" placeholder="ex : 1 avenue de Bayonne" required>
            </div>
            <div class="col-12">
              <label for="inputAddress2" class="form-label">Adresse de livraison</label>
              <input type="text" class="form-control" id="inputAddress2" name="adresseLivraison" placeholder="ex : 2 avenue de Bayonne" required>
            </div>
            <div class="col-md-6">
              <label for="inputCity" class="form-label">Ville</label>
              <input type="text" class="form-control" id="inputCity" name="ville" placeholder="ex : Anglet" required>
            </div>
            <div class="col-md-6">
              <label for="inputZip" class="form-label">Code postal</label>
              <input type="number" class="form-control" id="inputZip" name="zip" placeholder="ex : 64600" required>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-danger">Confirmer</button>
            </div>
          </form>
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