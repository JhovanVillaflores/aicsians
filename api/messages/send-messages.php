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

//$data = json_decode(file_get_contents("php://input"));
//print_r($_POST);
$msg->sender_user_id = $_POST['uid'];
$msg->receiver_user_id = $_POST['fid'];
$msg->message_content = $_POST['message_content'];
$msg->conversation_id = $_POST['cid'];
$msg->send_message();
