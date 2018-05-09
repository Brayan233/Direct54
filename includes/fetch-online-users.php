<?php
/**
 * Created by PhpStorm.
 * User: TheHauLE
 * Date: 02/05/2018
 * Time: 7:36 PM
 */
include('db_connect.php');

if(isset($_POST["action"])) {
    if($_POST["action"] == "fetch-online-users") {

        $last_activity = date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa')));
        $login_id = $_SESSION["login_id"];

        //Display online users
        $query = "SELECT * FROM users
                INNER JOIN login_details ON users.user_id = login_details.user_id
                WHERE last_activity > DATE_SUB(NOW(), INTERVAL 5 SECOND)
                ORDER BY last_activity DESC";

        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();

        $output = '<ul id="online-users-list">';
        foreach ($result as $user) {
            if ($user['sexe'] == '1') {
                $output .= '<li class="online-user-item homme">' . $user['pseudo'] . '</li>';
            } else {
                $output .= '<li class="online-user-item femme">' . $user['pseudo'] . '</li>';
            }

        }
        $output .= '</ul>';
        echo $output;

    }
}
