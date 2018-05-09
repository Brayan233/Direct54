<?php
/**
 * Created by PhpStorm.
 * User: TheHauLE
 * Date: 02/05/2018
 * Time: 4:15 PM
 */
include('db_connect.php');

if(isset($_POST["action"])) {
    if($_POST["action"] == "update_time") {

        global $connect;

        $last_activity = date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa')));
        $login_id = $_SESSION["login_id"];

        $query = "UPDATE login_details SET last_activity = ? WHERE login_details_id = ?";
        $statement = $connect->prepare($query);
        $statement->execute(
            array($last_activity, $login_id)
        );

    }
}