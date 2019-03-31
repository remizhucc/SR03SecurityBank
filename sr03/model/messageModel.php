<?php
    if(isset($_POST["Sujet"])){
        echo "<p>test</p>";
        insertMessage();
    }
    
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
        echo "<script>location.href('index.html')</script>";
    }
?>