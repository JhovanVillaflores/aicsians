<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

include_once '../../config/Database.php';
include_once '../../models/User/User.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$user = new User($db);

$user->first_name = $_GET['first_name'];
$user->middle_name = $_GET['middle_name'];
$user->last_name = $_GET['last_name'];
$user->email = $_GET['email'];
$user->username = $_GET['username'];
$user->gender = $_GET['gender'];
$user->student_no = $_GET['student_no'];
$user->password = sha1($_GET['password']);

$user->register_user();
?>
