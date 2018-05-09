<?php
/**
 * Created by PhpStorm.
 * User: TheHauLE
 * Date: 03/05/2018
 * Time: 11:23 AM
 */
require_once("db_connect.php");

class User {
    private $user_id;
    private $pseudo;
    private $sexe;

    function __construct($pseudo) {
        global $connect;
        $query  = "SELECT * FROM users WHERE pseudo= ?";
        $statement = $connect->prepare($query);
        $statement->execute(array($pseudo));
        $result = $statement->fetchAll();
        $user = $result[0];

        $this->user_id = $user['user_id'];
        $this->pseudo = $user['pseudo'];
        $this->sexe = $user['sexe'];
    }

    function get_user_id() {
        return $this->user_id;
    }

    function get_pseudo() {
        return $this->pseudo;
    }

    function get_sexe() {
        return $this->sexe;
    }

    function set_pseudo($pseudo, $user_id) {
        global $connect;
        $query  = "UPDATE users SET pseudo = ? WHERE user_id = ?";
        $statement = $connect->prepare($query);
        $statement->execute(array($pseudo, $user_id));
    }

    function set_sexe($sexe) {
        global $connect;
        $query  = "UPDATE users SET sexe = ? WHERE user_id = ?";
        $statement = $connect->prepare($query);
        $statement->execute(array($sexe, $this->user_id));
    }
}
