<?php
  require ('model/myModel.php');
  require ('model/messageModel.php');

  function isLoggedOn() {
      if(!isset($_SESSION["connected_user"]) || $_SESSION["connected_user"] == "") {
          // utilisateur non connecté
          require('view/login.php');
          return false;
      }
      return true;
  }

  function badaction() {
    require('view/erraction.php');
  }

  function authenticate($login, $mdp) {
      if ($login == "" || $mdp == "") {
          // manque login ou mot de passe
          $errmsg = "nullvalue";
          require('view/login.php');
      } else {
          $utilisateur = findUserByLoginPwd($login, $mdp);
          if ($utilisateur == false) {
            // echec authentification
            require('view/errauthent.php');
          } else {
            $_SESSION["connected_user"] = $utilisateur;
            require('view/accueil.php');
          }
      }
  }

  function home() {
      if (isLoggedOn()) {
        require('view/accueil.php');
      }
  }

  function clients() {
      if (isLoggedOn()) {
          $listeUsers = findAllUsers();
          require('view/ficheClient.php');
      }
  }

  function messages() {
      if (isLoggedOn()) {
        $listeMessages = findAllMessages();
        $listeUsers = findAllUsers();
          require('view/messagerie.php');
      }
  }

  function virements() {
      if (isLoggedOn()) {
          require('view/virement.php');
      }
  }

  function disconnect() {
    unset($_SESSION["connected_user"]);
    require('view/login.php');
  }

?>
