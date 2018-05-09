<?php
/**
 * Created by PhpStorm.
 * User: TheHauLE
 * Date: 06/05/2018
 * Time: 5:02 PM
 */
require_once("db_connect.php");
require_once("functions.php");

if (isset($_GET['submit-form']) && $_GET['submit-form'] == 'create-chatroom' ) {

    $chatroom_title = $_GET['chatroom-title'];
    $created = date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa')));

    //Create chatroom
    $query = "INSERT INTO chatrooms(chatroom_title,created) VALUES(?,?)";
    $statement = $connect->prepare($query);
    $statement->execute(array($chatroom_title, $created));

    //Redirect to chat page
    header('location: /tchat.php');
}
