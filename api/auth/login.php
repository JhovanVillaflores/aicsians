<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');


include_once '../../config/Database.php';
include_once '../../models/Auth/Auth.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$auth = new Auth($db);

//$data = json_decode(file_get_contents("php://input"));

$auth->username = $_POST['username'];
$auth->password = sha1($_POST['password']);

$auth->login_auth();

?>
