<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');

include_once '../../config/Database.php';
include_once '../../models/Messages/Messages.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$msg= new Messages($db);

$user_id = $_GET['uid'];
$msg->sender_user_id = $user_id;

$result = $msg->read_messages_list();
?>
