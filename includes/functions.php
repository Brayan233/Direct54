<?php
/**
 * Created by PhpStorm.
 * User: TheHauLE
 * Date: 02/05/2018
 * Time: 6:21 PM
 */
require_once("db_connect.php");

function get_client_ip_address() {
    $ip = getenv('HTTP_CLIENT_IP')?:
    getenv('HTTP_X_FORWARDED_FOR')?:
    getenv('HTTP_X_FORWARDED')?:
    getenv('HTTP_FORWARDED_FOR')?:
    getenv('HTTP_FORWARDED')?:
    getenv('REMOTE_ADDR');
    return $ip;
}

function get_pseudo_in_users($pseudo) {

    global $connect;
    $query  = "SELECT * FROM users WHERE pseudo = ?";
    $statement = $connect->prepare($query);
    $statement->execute(array($pseudo));
    $result = $statement->fetchAll();

    return $result;
}

function get_pseudo_in_login_details($user_id) {
    global $connect;

    $query  = "SELECT * FROM login_details WHERE user_id= ?";
    $statement = $connect->prepare($query);
    $statement->execute(array($user_id));
    $result = $statement->fetchAll();
    return $result;
}

function create_user($pseudo,$sexe) {

    global $connect;

    $query  = "INSERT INTO users(pseudo, sexe) VALUES(?, ?)";
    $statement = $connect->prepare($query);
    $statement->execute(array($pseudo, $sexe));

    //Return user_id inserted
    return $connect->lastInsertId();
}