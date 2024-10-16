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
        <br>
        <div class="container">
          <h1>Accueil</h1>
          <br>
          <h3>Description</h3>
          <br>
          <div>
            <p class="row">FigurineMania est un site web de figurines de personnages d'animes comme Jujutsu Kaisen ou des personnages autres comme Hatsune Miku.</p>
            <div class="col-md-4">
              <img src="Images/image3.png" width="100" height="100">
            </div>
          </div>
          <br>
          <br>
          <button class="rounded" type="button" onclick="window.location.href = 'figurines.php'">Voir les figurines</button>
        </div>
        <br>
      </main>
      <footer class="footer mt-auto py-3 bg-light">
        <div class="text-center p-1">
          Fait par Marylou Lohier
        </div>
      </footer>
</body>
</html>