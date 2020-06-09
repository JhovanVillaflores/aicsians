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

$cid = $_GET['cid'];

$msg->cid =$cid;

$msg->read_single_conversation();
?>
