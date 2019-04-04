<?php
    require('model/Constant.php');
    
    //find all messages
    function findAllMessages() {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
    
        $listeMessages = array();
    
        if ($mysqli->connect_error) {
            echo 'Erreur connection BDD (' . $mysqli->connect_errno . ') '. $mysqli->connect_error;
        } else {
            if (!$result = $mysqli->query("select id_msg,id_user_to,id_user_from,sujet_msg,corps_msg from messages")) {
                echo 'Erreur requête BDD (' . $mysqli->connect_errno . ') '. $mysqli->connect_error;
            } else {
                while ($unMessage = $result->fetch_assoc()) {
                $listeMessages[$unMessage['id_msg']] = $unMessage;
                }
                $result->free();
            }
            $mysqli->close();
        }
    
        return $listeMessages;
    }

    //send message
    function insertMessage(){
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
        if ($mysqli->connect_error) {
            echo 'Erreur connection BDD (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
            $utilisateur = false;
        } else {
            $query = "INSERT INTO `messages` (`id_user_to`, `id_user_from`, `sujet_msg`, `corps_msg`) VALUES ('". $_POST["user_to"]."', '".$_POST["user_from"]."', '". $_POST["sujet_msg"] ."', '". $_POST["corps_msg"] ."');";
            if (!$result = $mysqli->query($query)) {
                echo 'Erreur requête BDD (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
                $utilisateur = false;
            } else {
                echo "<script>alert('send successfully!')</script>";
                $url = "index.php?action=messagerie"; 
                echo "<script language='javascript' type='text/javascript'>"; 
                echo "window.location.href='$url'"; 
                echo "</script>"; 
                $result->free();
            }
            $mysqli->close();
        }
    }
?>