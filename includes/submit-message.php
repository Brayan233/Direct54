<?php
/**
 * Created by PhpStorm.
 * User: TheHauLE
 * Date: 02/05/2018
 * Time: 7:36 PM
 */
include('db_connect.php');

if(isset($_POST["action"])) {
    if($_POST["action"] == "submit-message") {

        echo '<pre>';
        var_dump($_POST);
        echo '</pre>';

        $message = $_POST['message'];
        $user_id = $_SESSION['user_id'];
        $chatroom_id = $_POST['chatroom_id'];
        $created = date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa')));

        //Insert message
        $query = "INSERT INTO messages(message, user_id, created, chatroom_id) VALUES(?, ?, ?, ?)";
        $statement = $connect->prepare($query);
        $statement->execute(array($message, $user_id, $created, $chatroom_id));
    }
}

