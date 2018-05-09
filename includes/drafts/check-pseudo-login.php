<?php
include_once("db_connect.php");

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

    if ($count > 0) {
        //Login
        $response['exists'] = true;
        $response['msg'] = '';
    }
    else {
        $response['exists'] = false;
        $response['msg'] = 'Ce pseudo n\'existe pas. Merci de <a href="/enregistrer.php"> créer un pseudo</a>.';
    }

    echo json_encode($response);
}