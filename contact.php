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
        <br>
        <div class="container">
          <h1>Contact</h1>
          <br>
        <form method="POST">
          <div class="row mb-4">
            <label for="inputNom" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="inputNom">
            </div>
          </div>
          <div class="row mb-4">
            <label for="inputPrenom" class="col-sm-2 col-form-label">Prénom</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="inputPrenom">
            </div>
          </div>
            <div class="row mb-4">
              <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="inputEmail">
              </div>
            </div>
            <div class="row mb-4">
              <label for="inputMessage" class="col-sm-2 col-form-label">Message</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="inputMessage">
              </div>
            </div>
            <button type="submit" name="btn-confirm" class="btn btn-danger">Confirmer</button>
          </form>
          <?php
            if (isset($_POST["btn-confirm"])){
                //Récup des informations
                $nom = $_POST['inputNom'];
                $prenom = $_POST['inputPrenom'];
                $email = $_POST['inputEmail'];
                $message = $_POST['inputMessage'];
                echo "Message envoyé !";
            }
        ?>
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