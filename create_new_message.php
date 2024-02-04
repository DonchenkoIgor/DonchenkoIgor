<?php
require_once('db.php');

$con = getConnection();

$messages = getAllMessages($con);

if (!empty($_POST['name']) && !empty($_POST['message'])) {
    addNewMessage($con, htmlspecialchars($_POST['name']), htmlspecialchars($_POST['message']));
}
?>