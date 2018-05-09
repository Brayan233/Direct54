<?php
/**
 * Created by PhpStorm.
 * User: TheHauLE
 * Date: 03/05/2018
 * Time: 11:23 AM
 */
class Login_Details {
    private $login_details_id;
    private $user_id;
    private $last_activity;
    private $ip_address;

    /*function __construct($user_id) {
        $query  = "SELECT * FROM login_details WHERE user_id='?'";
        $statement = $connect->prepare($query);
        $statement->execute(array($user_id));
        $result = $statement->fetchAll();
        $login_details = $result[0];

        $this->login_details_id = $login_details['login_details_id'];
        $this->user_id = $login_details['user_id'];
        $this->last_activity = $login_details['last_activity'];
        $this->ip_address = $login_details['ip_address'];
    }*/

    function get_login_details_id() {
        return $this->login_details_id;
    }

    function get_user_id() {
        return $this->user_id;
    }

    function get_last_activity() {
        return $this->last_activity;
    }

    function get_ip_address() {
        return $this->ip_address;
    }

    function create_login_details($user_id, $last_activity, $ip_address) {
        global $connect;
        $query  = "INSERT INTO login_details(user_id, last_activity, ip_address) VALUES(?, ?, ?)";
        $statement = $connect->prepare($query);
        $statement->execute(array($user_id, $last_activity, $ip_address));

        //Return login_id inserted
        return $connect->lastInsertId();
    }

    function set_last_activity($last_activity, $user_id) {
        global $connect;
        $query  = "UPDATE login_details SET last_activity = ? WHERE user_id = ?";
        $statement = $connect->prepare($query);
        $statement->execute(array($last_activity, $user_id));
    }

    function set_ip_address($ip_address, $user_id) {
        global $connect;
        $query  = "UPDATE login_details SET ip_address = ? WHERE user_id = ?";
        $statement = $connect->prepare($query);
        $statement->execute(array($ip_address, $user_id));
    }
}
