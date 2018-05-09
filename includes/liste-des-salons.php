
<b>Liste des salons : </b><br><br>

<?php
require_once("db_connect.php");
$query = "SELECT * FROM chatrooms WHERE id != '4'"; //Exclude chatroom Accueil
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

$current_chatroom = $_GET['salon_id'];

/*echo '<pre>';
var_dump($result);
echo '</pre>';*/
if ($current_chatroom == '4' || !$current_chatroom) {
    echo '<a href="/tchat.php?salon_id=4" class="chatroom-list-item active">Accueil</a><br />';
} else {
    echo '<a href="/tchat.php?salon_id=4" class="chatroom-list-item">Accueil</a><br />';
}


foreach ($result as $chatroom) :
    if ($chatroom['id'] == $current_chatroom) :
?>
    <a href="/tchat.php?salon_id=<?php echo $chatroom['id']; ?>" class="chatroom-list-item active"><?php echo $chatroom['chatroom_title']; ?></a> <br />
<?php
    else :
?>
    <a href="/tchat.php?salon_id=<?php echo $chatroom['id']; ?>" class="chatroom-list-item"><?php echo $chatroom['chatroom_title']; ?></a><br />
<?php
    endif;
endforeach;


