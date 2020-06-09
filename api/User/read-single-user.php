<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');

include_once '../../config/Database.php';
include_once '../../models/User/User.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$user= new User($db);

$user_id = $_GET['uid'];
$user->user_id = $user_id;

$user->read_single_user();
?>
