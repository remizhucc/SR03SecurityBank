<?php
define('DB_HOST','127.0.0.1:8889');
define('DB_USER','root');
define('DB_PASSWD','root');
define('DB_NAME','sr03');

function findUserByLoginPwd($login, $pwd) {
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);

  if ($mysqli->connect_error) {
      echo 'Erreur connection BDD (' . $mysqli->connect_errno . ') '. $mysqli->connect_error;
      $utilisateur = false;
  } else {
      if (!$result = $mysqli->query("select nom,prenom,login,id_user,numero_compte,profil_user,solde_compte from users where login='$login' and mot_de_passe='$pwd'")) {
          echo 'Erreur requête BDD (' . $mysqli->connect_errno . ') '. $mysqli->connect_error;
          $utilisateur = false;
      } else {
          if ($result->num_rows === 0) {
            $utilisateur = false;
          } else {
            $utilisateur = $result->fetch_assoc();
          }
          $result->free();
      }
      $mysqli->close();
  }

  return $utilisateur;
}


function findAllUsers() {
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);

  $listeUsers = array();

  if ($mysqli->connect_error) {
      echo 'Erreur connection BDD (' . $mysqli->connect_errno . ') '. $mysqli->connect_error;
  } else {
      if (!$result = $mysqli->query("select nom,prenom,login,id_user,numero_compte,profil_user,solde_compte from users")) {
          echo 'Erreur requête BDD (' . $mysqli->connect_errno . ') '. $mysqli->connect_error;
      } else {
          while ($unUser = $result->fetch_assoc()) {
            $listeUsers[$unUser['login']] = $unUser;
          }
          $result->free();
      }
      $mysqli->close();
  }

  return $listeUsers;
}


?>
