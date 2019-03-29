<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Accueil</title>
  <link rel="stylesheet" type="text/css" media="all"  href="/sr03/public/css/mystyle.css" />
</head>
<body>
  <header>
    <h1>Accueil</h1>
  </header>
  <main>
    <article>
      <header>
        <h2>Bienvenue <?php echo $_SESSION["connected_user"]["prenom"];?> <?php echo $_SESSION["connected_user"]["nom"];?></h2>
      </header>
      <div class="form">
        <form method="GET" >
          <input type="hidden" name="action" value="messagerie">
          <button>Messagerie</button>
        </form>
        <form method="GET" >
          <input type="hidden" name="action" value="virement">
          <button>Virement</button>
        </form>
        <form method="GET" >
          <input type="hidden" name="action" value="clients">
          <button>Clients</button>
        </form>
        <form method="GET" >
          <input type="hidden" name="action" value="disconnect">
          <button>Déconnexion</button>
        </form>
      </div>
    </article>
  </main>
</body>
</html>
