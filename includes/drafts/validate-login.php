<?php
/**
 * Created by PhpStorm.
 * User: TheHauLE
 * Date: 02/05/2018
 * Time: 1:53 PM
 */
require_once("db_connect.php");
require_once("functions.php");

if (isset($_POST['submit-form']) && $_POST['submit-form'] == 'login-submitted' ) {

    $pseudo = $_POST['pseudo-login'];
    $_SESSION['pseudo'] = $pseudo;

    /**/
    $query = "SELECT user_id FROM users WHERE `pseudo` = ?";

    $statement = $connect->prepare($query);
    $statement->execute(array($pseudo));
    $result = $statement->fetchAll();

    $login_id = '';
    $user_id = '';

    if ($result) {
        $user_id = $result[0]['user_id'];
    }

    $ip_address = get_client_ip_address();
    $last_activity = date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa')));

    //Check if user_id exists already in DB -> update last_activity field (datetime)
    $last_activity_check_query = "SELECT * FROM login_details WHERE user_id = ?";
    $statement = $connect->prepare($last_activity_check_query);
    $statement->execute(array($user_id));
    $result = $statement->fetchAll();

    if ( count($result) > 0 ) {

        $login_id = $result[0]['login_details_id'];
        $last_activity = date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa')));

        $update_query = "UPDATE login_details SET last_activity = ? WHERE user_id = ?";
        $statement = $connect->prepare($update_query);
        $statement->execute(array($last_activity, $user_id));
    } else {
        //If not existing, create one
        $insert_query = "INSERT INTO login_details(user_id,last_activity,ip_address) VALUES (?,?,?)";
        $statement = $connect->prepare($insert_query);
        $statement->execute(array($user_id,$last_activity,$ip_address));

        $login_id = $connect->lastInsertId();
    }

    if(!empty($login_id) && !empty($user_id)) {
        $_SESSION["login_id"] = $login_id;
        $_SESSION["user_id"] = $user_id;
        header("location: /");
    }
}