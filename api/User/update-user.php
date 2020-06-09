<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

include_once '../../config/Database.php';
include_once '../../models/User/User.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$user = new User($db);

$user->user_id = $_POST['user_id'];
$user->username = $_POST['username'];
$user->email = $_POST['email'];
$user->contact_no = $_POST['contact_no'];
$user->block = $_POST['block'];
$user->track = $_POST['track'];
$user->strand = $_POST['strand'];

$user->update_profile();
