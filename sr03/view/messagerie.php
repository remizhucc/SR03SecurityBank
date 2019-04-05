<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Messages</title>
  <link rel="stylesheet" type="text/css" media="all"  href="public/css/mystyle.css" />
</head>
<body>
  <header>
    <h1>Messages</h1>
  </header>
  <main>
    <article>
      <header>
        <h2>Bienvenue <?php echo $_SESSION["connected_user"]["prenom"];?> <?php echo $_SESSION["connected_user"]["nom"];?></h2>
      </header>
      <div class="liste">
          <table>
            <?php
            foreach ($listeMessages as $cle => $unMessage) {
                if($unMessage['id_user_to'] == $_SESSION["connected_user"]["id_user"] || $unMessage['id_user_from'] == $_SESSION["connected_user"]["id_user"] ){
                  echo '<tr>';
                  echo '<td>'.$unMessage['id_user_to'].'</td>';
                  echo '<td>'.$unMessage['id_user_from'].'</td>';
                  echo '<td>'.$unMessage['sujet_msg'].'</td>';
                  echo '<td>'.$unMessage['corps_msg'].'</td>';
                  echo '</tr>';
                }
            }
             ?>
          </table>
      </div>

      <div class="form">
        <form method="POST" action="index.php" >
          <p>Sujet: <input type="text" name="sujet_msg" /></p>
          <p>Send to: <select name="user_to">
          <?php
            foreach ($listeUsers as $cle => $unUser) {
              echo '<option value="'.$unUser['id_user'].'">'.$unUser['nom'].' '.$unUser['prenom'].'</option>';
            }
             ?>
          </select></p>
          <p>Corps: <textarea name="corps_msg" rows="10" cols="30"></textarea></p>
          <input type="hidden" name="user_from" value="<?php echo $_SESSION["connected_user"]["id_user"];?>">
          <input type="hidden" name="action" value="messagerie">
          <button>Envoyer</button>
        </form>
      </div>

      <div class="form">
        <form method="GET" >
          <input type="hidden" name="action" value="home">
          <button>Accueil</button>
        </form>
      </div>
    </article>
  </main>
</body>
</html>
