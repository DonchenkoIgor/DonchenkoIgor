<?php
require_once('db.php');

$con = getConnection();

$messages = getAllMessages($con);

header('Content-Type: application/json');
echo json_encode(['data' =>$messages]);
?>
