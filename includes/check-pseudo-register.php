<?php
include("db_connect.php");

if(isset($_POST['pseudo']) && $_POST['pseudo'] != '') {

    $response = array();

    $username = $_POST['pseudo'];

    $query  = "SELECT pseudo FROM users WHERE pseudo='".$username."'";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            'pseudo' => $username
        )
    );

    $count = $statement->rowCount();

    if($count > 0) {
        $response['status'] = true;
        /*$response['msg'] = 'Pseudo existe déjà.';*/
    }
    else if(strlen($username) < 3 || strlen($username) > 15) {
        $response['status'] = false;
        $response['msg'] = 'Un pseudo doit être de 3 à 20 caractères';
    }

    else if (!preg_match("/^[a-zA-Z1-9]+$/", $username)) {
        $response['status'] = false;
        $response['msg'] = 'Les caractères alphanumériques seulement.';
    }
    else {
        $response['status'] = true;
        $response['msg'] = '';
    }

    echo json_encode($response);
}