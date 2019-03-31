<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" media="all" href="/public/css/mystyle.css"/>
</head>
<body>
<header>
    <h1>Accueil</h1>
</header>
<main>
    <article>
        <header>
            <h2>
                Bienvenue <?php echo $_SESSION["connected_user"]["prenom"]; ?> <?php echo $_SESSION["connected_user"]["nom"]; ?></h2>
        </header>
        <div class="form">
            <div>Nom : <?php echo $_SESSION["connected_user"]["nom"]; ?> </div>
            <div>Prenom : <?php echo $_SESSION["connected_user"]["prenom"]; ?> </div>
            <div>Id user : <?php echo $_SESSION["connected_user"]["id_user"]; ?> </div>
            <div>Numero Compte : <?php echo $_SESSION["connected_user"]["numero_compte"]; ?> </div>
            <div>Profil User : <?php echo $_SESSION["connected_user"]["profil_user"]; ?> </div>
            <div>Solde compte : <?php echo $_SESSION["connected_user"]["solde_compte"]; ?> </div>
        </div>
        <div class="form">
            <form method="GET">
                <input type="hidden" name="action" value="messagerie">
                <button>Messagerie</button>
            </form>
            <form method="GET">
                <input type="hidden" name="action" value="virement">
                <button>Virement</button>
            </form>
            <?php if ($_SESSION["connected_user"]["profil_user"] == "CONSEILLER") : ?>
                <form method="GET">
                    <input type="hidden" name="action" value="clients">
                    <button>Clients</button>
                </form>
            <?php endif; ?>
            <form method="GET">
                <input type="hidden" name="action" value="disconnect">
                <button>Déconnexion</button>
            </form>
        </div>
    </article>
</main>
</body>
</html>
