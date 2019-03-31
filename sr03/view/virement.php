<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Virement</title>
    <link rel="stylesheet" type="text/css" media="all" href="public/css/mystyle.css"/>
</head>
<body>
<header>
    <h1>Virement</h1>
</header>
<main>
    <article>
        <header>
            <h2>
                Bienvenue <?php echo $_SESSION["connected_user"]["prenom"]; ?> <?php echo $_SESSION["connected_user"]["nom"]; ?></h2>
        </header>
        <div>Solde: <?php echo $_SESSION["connected_user"]["solde_compte"]; ?></div>
        <h2>Virement</h2>
        <div class="form">
            <form method="GET">
                <input type="hidden" name="action" value="effectuerVirement">
                <div>
                    Compte débité:
                    <input type="number" name="compteDebite" placeholder="<?php echo $_GET['compteDebite'];?>">
                </div>
                <div>
                    Montant :
                    <input type="number" name="montant" >
                </div>
                <button>virement</button>
            </form>
            <form method="GET" >
                <input type="hidden" name="action" value="home">
                <button>acceuil</button>
            </form>
        </div>

    </article>
</main>
</body>
</html>
