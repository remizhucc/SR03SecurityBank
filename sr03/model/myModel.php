<?php
define('DB_HOST','127.0.0.1');
define('DB_USER','root');
define('DB_PASSWD','jdh19960114');
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

function findUserByCompte($compte)
{
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);

    if ($mysqli->connect_error) {
        echo 'Erreur connection BDD (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
        $utilisateur = false;
    } else {
        if (!$result = $mysqli->query("select nom,prenom,login,id_user,numero_compte,profil_user,solde_compte from users where numero_compte='$compte' ")) {
            echo 'Erreur requête BDD (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
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

function findAllUsers()
{
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);

    $listeUsers = array();

    if ($mysqli->connect_error) {
        echo 'Erreur connection BDD (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
    } else {
        if (!$result = $mysqli->query("select nom,prenom,login,id_user,numero_compte,profil_user,solde_compte from users")) {
            echo 'Erreur requête BDD (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
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


function effectuerVirementSQL($compte, $compteDebite, $montant)
{
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
    if ($mysqli->connect_error) {
        echo 'Erreur connection BDD (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
        $sign = false;
    } else {
        $query = "UPDATE users SET solde_compte = solde_compte - $montant where numero_compte='$compte'";
        if (!$result = $mysqli->query($query)) {
            echo 'Erreur requête BDD (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
            $sign = false;
        } else {
            $query = "UPDATE users SET solde_compte = solde_compte + $montant where numero_compte='$compteDebite'";
            if (!$result = $mysqli->query($query)) {
                echo 'Erreur requête BDD (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
                $sign = false;
            } else {
                $sign = true;
            }
        }
        $mysqli->close();
    }
    return $sign;
}

?>
