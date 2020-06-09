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

$user->first_name = $_POST['first_name'];
$user->middle_name = $_POST['middle_name'];
$user->last_name = $_POST['last_name'];
$user->email = $_POST['email'];
$user->username = $_POST['username'];
$user->gender = $_POST['gender'];
$user->student_no = $_POST['student_no'];
$user->password = sha1($_POST['password']);

$user->register_user();
