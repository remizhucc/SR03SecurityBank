<?php
    session_start();

    require('controller/myController.php');

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'authenticate') {
            authenticate($_GET['login'],$_GET['mdp']);
        } else if ($_GET['action'] == 'home') {
            home();
        } else if ($_GET['action'] == 'messagerie') {
            messages();
        } else if ($_GET['action'] == 'virement') {
            virements();
        } else if ($_GET['action'] == 'clients') {
            if($_SESSION["connected_user"]["profil_user"]=="CONSEILLER"){
                clients();
            }else{
                home();
            }
        } else if ($_GET['action'] == 'disconnect') {
            disconnect();
        }else if ($_GET['action'] == 'effectuerVirement') {
            effectuerVirement($_GET['compteDebite'],$_GET['montant']);
        }else {
            badaction();
        }
    } else if (isset($_POST["action"])){
        if ($_POST['action'] == 'messagerie') {
            insertMessage();
        }
}  else {
        // aucune action => accueil
        home();
    }

?>
