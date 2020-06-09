<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

include_once '../../config/Database.php';
include_once '../../models/Messages/Messages.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();
$msg = new Messages($db);

$msg->sender_user_id = $_POST['user_id'];
$msg->receiver_user_id = $_POST['fid'];
$msg->message_content = $_POST['message_content'];
$msg->create_new_message();
?>
