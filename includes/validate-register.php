<?php
/**
 * Created by PhpStorm.
 * User: TheHauLE
 * Date: 02/05/2018
 * Time: 12:01 AM
 */
require_once("db_connect.php");
require_once("functions.php");
require_once("login_details.php");
require_once("user.php");

$login_details = new Login_Details();

/*var_dump($_GET);*/

if (isset($_GET['submit-form']) && $_GET['submit-form'] == 'register-submitted' ) {

    $pseudo = $_GET['pseudo-register'];
    $sexe = $_GET['sexe'];

    //Initiate new user object
    $user = new User($pseudo);

    /*$user_results = get_pseudo_in_users($pseudo);*/
    /*var_dump($user_results);*/
    $user_id = create_user($pseudo, $sexe);

    /*$user_id = '';
    if (count($user_results) == 0 ) {
        $user_id = create_user($pseudo, $sexe);
    } else {
        $user_id = $user_results[0]['user_id'];
        $user->set_sexe($sexe);
    }*/

    $ip_address = get_client_ip_address();
    $last_activity = date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa')));

    //Check if user_id exists already in DB -> update last_activity field (datetime)
    $result = get_pseudo_in_login_details($user_id);

    $login_id = '';
    if ( count($result) > 0 ) {
        $login_id = $result[0]['login_details_id'];
        $last_activity = date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa')));

        $login_details->set_last_activity($last_activity,$user_id);

    } else {
        //If not existing, create one
        $login_id = $login_details->create_login_details($user_id,$last_activity,$ip_address);
    }

    if(!empty($login_id) && !empty($user_id)) {
        $_SESSION["login_id"] = $login_id;
        $_SESSION["user_id"] = $user_id;
        $_SESSION["pseudo"] = $pseudo;
        $_SESSION["sexe"] = $sexe;
        header("location: /tchat.php");
    }
}

