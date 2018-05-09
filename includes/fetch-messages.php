<?php
/**
 * Created by PhpStorm.
 * User: TheHauLE
 * Date: 02/05/2018
 * Time: 7:36 PM
 */
include('db_connect.php');

if(isset($_POST["action"])) {
    if($_POST["action"] == "fetch-messages") {

        $last_activity = date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa')));
        $login_id = $_SESSION["login_id"];
        $chatroom_id = $_POST['chatroom_id'];

        //Display online users
        $query = "SELECT * FROM messages
        INNER JOIN users ON messages.user_id = users.user_id
        WHERE chatroom_id = ?
        ORDER BY created ASC LIMIT 120";

        $statement = $connect->prepare($query);
        $statement->execute(array($chatroom_id));
        $result = $statement->fetchAll();

        $output = '<div id="chat-messages-list">';
        foreach ($result as $message) {
            $sexe = $message['sexe'];

            $sexe == '1' ? $sexe = 'homme' : $sexe = 'femme';

            $output .=
                '<div class="message-item ' . $sexe . '">
                    <div><b class="chat-pseudo">' . $message['pseudo']. '</b> : '. $message['message'] . '</div>'.
                '</div>';
        }
        $output .= '</div>';

        echo $output;

    }
}


